<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    protected $table = "berita";
    protected $primaryKey = "Id_berita";
    protected $allowedFields = ['Judul_berita', 'Foto_berita', 'Deskripsi_berita', 'Tanggal_berita'];
    protected $validationRules = [
        'Judul_berita' => 'required',
        'Foto_berita' => 'required',
        'Deskripsi_berita' => 'required',
        'Tanggal_berita' => 'required'
    ];
    protected $validationMessages = [
        'Judul_berita' => [
            'required' => 'Silahkan Masukan Judul berita'
        ],
        'Foto_berita' => [
            'required' => 'Silahkan Masukan Foto untuk berita ',
        ],
        'Deskripsi_berita' => [
            'required' => 'Silahkan Masukan Deskripsi dari berita'
        ],
        'Tanggal_berita' => [
            'required' => 'Silahkan Masukan Tanggal ketika berita diUploud'
        ]
    ];
}
