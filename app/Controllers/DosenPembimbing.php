<?php

namespace App\Controllers;

use App\Models\SkripsiModel;
use App\Models\DosenModel;


class DosenPembimbing extends BaseController
{
    protected $skripsiModel;
    protected $dosenModel;
    public function __construct()
    {
        $this->skripsiModel = new SkripsiModel();
        $this->dosenModel = new DosenModel();
    }

    public function index()
    {
        $semuaDosen = $this->dosenModel->getAll();
        $data = [
            'judul' => 'Dosen Pembimbing',
            'semua_dosen' => $semuaDosen
        ];
        return view('dosen_pembimbing/v_dosen_pembimbing', $data);
    }

    public function tambah_skripsi()
    {
        $data = [
            'judul' => 'Ajukan Skripsi',
            'nim' => session()->get('nim'),
            'nama' => session()->get('nama_asli'),
            'dosen' => $this->dosenModel->getAll(),
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

            return redirect()->to('/skripsi')->with('sukses','Data berhasil disimpan!');
    }

    public function edit_skripsi($id = null)
    {
        if($id != null) {
            $single_skripsi = $this->skripsiModel->find($id);
            if (!$single_skripsi) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            } else {
                $data = [
                    'judul' => 'Edit Skripsi',
                    'single_skripsi' => $single_skripsi
                ];
                return view('skripsi/v_edit_skripsi', $data);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
       
    }

    public function update_skripsi()
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
