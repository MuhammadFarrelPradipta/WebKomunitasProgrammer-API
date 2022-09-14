<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelBerita;

class Galeri extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->model = new ModelBerita();
    }
    public function index()
    {
        $data = $this->model->orderBy('Judul_berita', 'asc')->findAll();
        return $this->respond($data, 200);
    }
}
