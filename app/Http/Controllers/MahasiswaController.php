<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
        $mahasiswa = [
            'nim' => '251011701011',
            'nama' => ' arifki nurkholis',
            'prodi' => 'Sistem Informasi',
            'email' => 'ikiiajaaa509@gmail.com',
            'kampus' => 'Universitas Pamulang',
            'status' => 'Aktif',
        ];

        return view('page.profile', compact('mahasiswa'));
    }
}
