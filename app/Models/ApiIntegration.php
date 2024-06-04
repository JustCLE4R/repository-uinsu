<?php

namespace App\Models;

use Throwable;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiIntegration extends Model
{
    use HasFactory;

    public function getStudentAuth($username, $password)
    {
        try {
            $response = Http::withHeaders([
                'UINSU-KEY' => env('UINSU_KEY'),
            ])->post('https://ws.uinsu.ac.id/portal/OtentikasiUser', [
                'username' => $username,
                'password' => $password,
            ]);

            return $response->json();
        } catch (Throwable $e) {
            return ['modelError' => $e->getMessage()];
        }
    }

    public function getStudentData($nim)
    {
        try {
            $response = Http::withHeaders([
                'UINSU-KEY' => env('UINSU_KEY'),
            ])->post('https://ws.uinsu.ac.id/portal/DataMahasiswa', [
                'nim_mhs' => $nim
            ]);

            return $response->json();
        } catch (Throwable $e) {
            return ['modelError' => $e->getMessage()];
        }
    }

    public function getAlumniData($nim)
    {
        try {
            $response = Http::withHeaders([
                'UINSU-KEY' => env('UINSU_KEY'),
            ])->post('https://ws.uinsu.ac.id/portal/DataAlumni', [
                'nim_mhs' => $nim
            ]);

            return $response->json();
        } catch (Throwable $e) {
            return ['modelError' => $e->getMessage()];
        }
    }
}
