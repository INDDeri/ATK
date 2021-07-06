<?php

namespace App\Controllers;

use App\Models\PemesananATKModel;

class PemesananATK extends BaseController
{
    protected $PemesananATKModel, $builder;

    public function __construct()
    {
        $this->PemesananATKModel = new PemesananATKModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_pemesanan') ? $this->request->getVar('page_pemesanan') : 1;

        $data = [
            'title' => 'Pemesanan Alat Tulis',
            'tbl_pemesanan' => $this->PemesananATKModel->paginate(6, 'tbl_pemesanan'),
            'pager' => $this->PemesananATKModel->pager,
            'currentPage' => $currentPage
        ];

        return view('pemesananatk/index', $data);
    }

    public function detail($id_pemesanan = 0)
    {
        $data = [
            'title' => 'Detail PemesananATK'
        ];

        $this->builder->select('id_det_pemesanan, tbl_det_pemesanan.id_pemesanan as pemesananid, id_atk, jumlah, harga');
        $this->builder->join('tbl_pemesanan', 'tbl_det_pemesanan.id_pemesanan = tbl_pemesanan.id');
        $this->builder->where('tbl_det_pemesanan.id_pemesanan', $id_pemesanan);
        $query = $this->builder->get();

        $data['tbl_det_pemesanan'] = $query->getRow();

        return view('pemesananatk/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Pemesanan ATK',
            'validation' => \Config\Services::validation()
        ];

        return view('pemesananatk/create', $data);
    }

    public function save()
    {
        $this->PemesananATKModel->save([
            'id_user' => $this->request->getVar('id_user'),
            'tgl_pemesanan'        => $this->request->getVar('tgl_pemesanan'),
            'no_erp'        => $this->request->getVar('no_erp'),
            'status'        => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Berhasil ditambahkan');

        return redirect()->to('/pemesananatk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Update Pemesanan ATK',
            'validation' => \Config\Services::validation(),
            'tbl_pemesanan' => $this->PemesananATKModel->getPemesananATK($id)
        ];

        return view('pemesananatk/edit', $data);
    }

    public function update($id)
    {
        $this->PemesananATKModel->save([
            'id'             => $id,
            'id_user' => $this->request->getVar('id_user'),
            'tgl_pemesanan'        => $this->request->getVar('tgl_pemesanan'),
            'no_erp'        => $this->request->getVar('no_erp'),
            'status'        => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Berhasil diupdate');

        return redirect()->to('/pemesananatk');
    }

    public function delete($id)
    {
        $this->PemesananATKModel->delete($id);
        session()->setFlashdata('pesan', 'Berhasil dihapus');
        return redirect()->to('/pemesananatk');
    }

    // ========================DETAIL PEMESANAN=======================================
    public function indexDetPemesanan()
    {
        $currentPage = $this->request->getVar('page_det_pemesanan') ? $this->request->getVar('page_det_pemesanan') : 1;

        $data = [
            'title' => 'Laporan Detail Pemesanan',
            'tbl_det_pemesanan' => $this->DetailPemesananModel->paginate(6, 'tbl_det_pemesanan'),
            'pager' => $this->DetailPemesananModel->pager,
            'currentPage' => $currentPage
        ];

        return view('detailpemesanan/index', $data);
    }

    public function createDetPemesanan()
    {
        $data = [
            'title' => 'Form Tambah Detail Pemesanan',
            'validation' => \Config\Services::validation()
        ];

        return view('detailpemesanan/create', $data);
    }

    public function saveDetPemesanan()
    {
        $this->DetailPemesananModel->save([
            'id_pemesanan' => $this->request->getVar('id_pemesanan'),
            'id_atk'        => $this->request->getVar('id_atk'),
            'jumlah'        => $this->request->getVar('jumlah'),
            'harga'        => $this->request->getVar('harga')
        ]);

        session()->setFlashdata('pesan', 'Berhasil ditambahkan');

        return redirect()->to('/detailpemesanan');
    }

    public function editDetPemesanan($id_det)
    {
        $data = [
            'title' => 'Form Edit Detail Pemesanan',
            'validation' => \Config\Services::validation(),
            'tbl_det_pemesanan' => $this->DetailPemesananModel->getDetailPermintaan($id_det)
        ];

        return view('detailpemesanan/edit', $data);
    }

    public function updateDetPemesanan($id_det)
    {
        $this->DetailPemesananModel->save([
            'id_det'             => $id_det,
            'id_pemesanan' => $this->request->getVar('id_pemesanan'),
            'id_atk'        => $this->request->getVar('id_atk'),
            'jumlah'        => $this->request->getVar('jumlah'),
            'harga'        => $this->request->getVar('harga')
        ]);

        session()->setFlashdata('pesan', 'Berhasil diupdate');

        return redirect()->to('/detailpemesanan');
    }

    public function deleteDetPemesanan($id_det)
    {
        $this->DetailPemesananModel->delete($id_det);
        session()->setFlashdata('pesan', 'Berhasil dihapus');
        return redirect()->to('/detailpemesanan');
    }
}
