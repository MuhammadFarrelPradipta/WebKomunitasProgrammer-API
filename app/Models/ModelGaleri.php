<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGaleri extends Model
{
    protected $table = "galeri";
    protected $primaryKey = "Id_foto";
    protected $allowedFields = ['Nama_foto', 'Deskripsi_foto', 'Foto'];
    protected $validationRules = [
        'Nama_foto' => 'required',
        'Deskripsi_foto' => 'required',
        'Foto' => 'required'
    ];
    protected $validationMessages = [
        'Nama_foto' => [
            'required' => 'Silahkan masukan nama dari foto tersebut'
        ],
        'Deskripsi_foto' => [
            'required' => 'Silahkan masukan deskripsi foto tersebut'
        ],
        'Foto' => [
            'required' => 'Silahkan masukan foto'
        ]

    ];
}
