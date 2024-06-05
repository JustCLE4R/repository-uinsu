<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ApiIntegration;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(LoginRequest $request){
        $apiIntegration = new ApiIntegration();

        $authData = $apiIntegration->getStudentAuth($request['nim'], $request['password']);
        $alumniData = $apiIntegration->getAlumniData($request['nim']);

        // cek ketersediaan API
        if(isset($authData['modelError']) || isset($alumniData['modelError'])){
            return redirect('/login')->with('error', 'API Server Error');
        }

        // cek ketersediaan data dan masukan ke database
        if(User::firstWhere('nim', $request['nim']) == null && !isset($authData['error'])){
            $authData = $authData['OtentikasiUser'][0];
            $alumniData = $alumniData['DataAlumni'][0];

            // dd($authData, $alumniData);
    
            $mhsData = [
                'nim' => $authData['user'],
                'password' => $authData['password'],
                'nama' => $authData['nama_lengkap'],
                'jenis_kelamin' => $alumniData['jenis_kelamin'],
                'foto' => $alumniData['mhsFoto'],
                'email' => $alumniData['email'],
                'telepon' => $alumniData['handphone'],
                'program_studi' => $alumniData['PRODI'],
                'fakultas' => $alumniData['FAKULTAS'],
                'strata' => $alumniData['STRATA'],
                'tahun_masuk' => $alumniData['mhs_angkatan'],
            ];
    
            User::create($mhsData);
        } 
        
        // percobaan login (dengan nim) jika semuanya normal
        if(Auth::attempt(['nim' => $request['nim'], 'password' => md5($request['password'])])){
            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard');
        }
    
        return redirect('/login')->with('error', 'NIM atau password yang anda masukkan salah');
    }
}
