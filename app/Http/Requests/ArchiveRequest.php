<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ArchiveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "type" => "required|max:255",
            "title" => "required|max:255",
            "abstract" => "required|max:255",
            "editor" => "required|max:255",
            "fakultas" => "required|max:255",
            "program_studi" => "required|max:255",
            "penerbit" => "required|max:255",
            "tempat_terbit" => "required|max:255",
            "isbn_issn" => "required|max:255",
            "official_url" => "required|max:255",
            "date" => "required|date|date_format:Y-m-d",
            "volume" => "required|numeric|max:255",
            "number" => "required|numeric|max:255",
            "page" => "required|numeric|max:255",
            "identification_number" => "required|max:255",
            "journal_name" => "required|max:255",
            "subject_id" => "required|max:255",
            "nomor_klasifikasi" => "required|max:255",
            "file" => "required|mimes:pdf",
            "visibility" => ["required", "in:public,private"],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'mimes' => ':attribute harus berupa PDF',
            'date' => ':attribute harus berupa tanggal',
            'date_format' => ':attribute harus berupa format :format',
            'numeric' => ':attribute harus berupa angka',
        ];
    }

    public function attributes(): array
    {
        return [
            'type' => 'Jenis',
            'title' => 'Judul',
            'abstract' => 'Abstrak',
            'editor' => 'Editor',
            'penerbit' => 'Penerbit',
            'fakultas' => 'Fakultas',
            'program_studi' => 'Program Studi',
            'tempat_terbit' => 'Tempat Terbit',
            'isbn_issn' => 'ISBN/ISSN',
            'official_url' => 'URL Resmi Jurnal',
            'date' => 'Tanggal',
            'volume' => 'Volume',
            'number' => 'Nomor',
            'page' => 'Halaman',
            'identification_number' => 'Nomor Identifikasi',
            'journal_name' => 'Nama Jurnal',
            'subject_id' => 'Subjek',
            'nomor_klasifikasi' => 'Nomor Klasifikasi',
            'file' => 'File',
            'visibility' => 'Visibilitas',
        ];
    }

    protected function prepareForValidation()
    {
        if(Auth::user()->role != 'admin'){
            $this->merge([
                'fakultas' => auth()->user()->fakultas,
                'program_studi' => auth()->user()->program_studi
            ]);
        }
    }
}
