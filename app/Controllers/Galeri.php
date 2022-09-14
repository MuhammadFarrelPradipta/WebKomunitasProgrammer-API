<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelGaleri;


class Galeri extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->model = new ModelGaleri();
    }
    public function index()
    {
        $data = $this->model->orderBy('Nama_foto', 'asc')->findAll();
        return $this->respond($data, 200);
    }
    public function show($id = null)
    {
        $data = $this->model->where('Id_foto', $id)->findAll;
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
        $data['Id_foto'] = $id;

        $isExist = $this->model->where('Id_foto', $id)->findAll();
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
                'success' => "Data Galeri dengan id $id berhasil di update"
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $this->model->where('Id_foto', $id)->findAll();
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
