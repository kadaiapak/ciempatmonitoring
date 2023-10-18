<?php

namespace App\Controllers;

use App\Models\SkripsiModel;


class Skripsi extends BaseController
{
    protected $skripsiModel;
    public function __construct()
    {
        $this->skripsiModel = new SkripsiModel();
    }

    public function index()
    {
        $semuaSkripsi = $this->skripsiModel->findAll();
        $data = [
            'judul' => 'Skripsi',
            'semua_skripsi' => $semuaSkripsi
        ];
        return view('skripsi/v_skripsi', $data);
    }

    public function tambah_skripsi()
    {
        $data = [
            'judul' => 'Ajukan Skripsi'
        ];
        return view('skripsi/v_tambah_skripsi', $data);
    }

    public function simpan_skripsi()
    {
        $this->skripsiModel->save([
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'nim_mahasiswa' => $this->request->getVar('nim_mahasiswa'),
            'periode_pengajuan' => $this->request->getVar('periode_pengajuan'),
            'tahun_pengajuan' => $this->request->getVar('tahun_pengajuan'),
            'judul_skripsi' => $this->request->getVar('judul_skripsi'),
            'deskripsi_skripsi' => $this->request->getVar('deskripsi_skripsi'),
            'konsentrasi_bidang' => $this->request->getVar('konsentrasi_bidang'),
            'nama_pembimbing' => $this->request->getVar('nama_pembimbing'),
            'nama_dosen_pa' => $this->request->getVar('nama_dosen_pa'),
            'status_pengajuan_skripsi' => 1,
        ]);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to('/skripsi')->with('sukses','Data berhasil disimpan!');
        }
    }

    public function edit_skripsi($id)
    {
        $data = [
            'judul' => 'Edit Skripsi',
            'single_skripsi' => $this->skripsiModel->find($id)
        ];
        return view('skripsi/v_edit_skripsi', $data);
    }

    public function simpan_edit_skripsi()
    {
        $this->skripsiModel->save([
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'nim_mahasiswa' => $this->request->getVar('nim_mahasiswa'),
            'periode_pengajuan' => $this->request->getVar('periode_pengajuan'),
            'tahun_pengajuan' => $this->request->getVar('tahun_pengajuan'),
            'judul_skripsi' => $this->request->getVar('judul_skripsi'),
            'deskripsi_skripsi' => $this->request->getVar('deskripsi_skripsi'),
            'konsentrasi_bidang' => $this->request->getVar('konsentrasi_bidang'),
            'nama_pembimbing' => $this->request->getVar('nama_pembimbing'),
            'nama_dosen_pa' => $this->request->getVar('nama_dosen_pa'),
            'status_pengajuan_skripsi' => 1,
        ]);

        return redirect()->to('/skripsi');

    }
}
