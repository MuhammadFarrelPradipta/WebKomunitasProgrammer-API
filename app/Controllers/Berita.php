<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ModelBerita;

class Berita extends BaseController
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
    public function show($id = null)
    {
        $data = $this->model->where('Id_berita', $id)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound('Data tidak ditemukan untuk id = ' . $id);
        }
    }
    public function create()
    {
        $data = $this->request->getPost();
        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        $response = [
            'status' => 201,
            'error' => null,
            'message' => [
                'success' => 'Arigout Gozaimasu'
            ]
        ];
        return $this->respond($response);
    }
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['Id_berita'] = $id;

        $isExist = $this->model->where('Id_berita', $id)->findAll();
        if (!$isExist) {
            return $this->failNotFound('Data tidak ditemukan untuk id = ' . $id);
        }

        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "Data Berita dengan id $id berhasil di update"
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $this->model->where('Id_berita', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => "Data berita telah dihapus"
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
