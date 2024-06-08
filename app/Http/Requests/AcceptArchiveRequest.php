<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcceptArchiveRequest extends FormRequest
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
            "type" => "required",
            "title" => "required",
            "abstract" => "required",
            "editor" => "required",
            "penerbit" => "required",
            "tempat_terbit" => "required",
            "isbn_issn" => "required",
            "official_url" => "required",
            "date" => "required|date|date_format:Y-m-d",
            "volume" => "required|numeric",
            "number" => "required|numeric",
            "page" => "required|numeric",
            "identification_number" => "required",
            "journal_name" => "required",
            "subjek" => "required",
            "nomor_klasifikasi" => "required",
            "file" => "sometimes|mimes:pdf,jpg,jpeg,png",
        ];
    }


    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'mimes' => ':attribute harus berupa PDF, JPG, JPEG, PNG',
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
            'tempat_terbit' => 'Tempat Terbit',
            'isbn_issn' => 'ISBN/ISSN',
            'official_url' => 'URL Resmi Jurnal',
            'date' => 'Tanggal',
            'volume' => 'Volume',
            'number' => 'Nomor',
            'page' => 'Halaman',
            'identification_number' => 'Nomor Identifikasi',
            'journal_name' => 'Nama Jurnal',
            'subjek' => 'Subjek',
            'nomor_klasifikasi' => 'Nomor Klasifikasi',
            'file' => 'File',
        ];
    }
}
