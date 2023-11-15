<?php

namespace App\Controllers;

use App\Models\SkripsiModel;
use App\Models\DosenModel;
use App\Models\HistoriModel;
use App\Models\BimbinganModel;


class Bimbingan extends BaseController
{
    protected $skripsiModel;
    protected $dosenModel;
    protected $historiModel;
    protected $bimbinganModel;

    public function __construct()
    {
        helper('form');
        $this->skripsiModel = new SkripsiModel();
        $this->bimbinganModel = new BimbinganModel();
        $this->dosenModel = new DosenModel();
        $this->historiModel = new HistoriModel();
    }

    public function index()
    {
        $nim = session()->get('nim');
        $semuaBimbingan = $this->bimbinganModel->getAll($nim);
        $data = [
            'judul' => 'Skripsi',
            'semua_bimbingan' => $semuaBimbingan
        ];
        return view('skripsi/v_skripsi', $data);
    }

    public function tambah_bimbingan()
    {
        
        $data = [
            'judul' => 'Buat Bimbingan',
            'nim' => session()->get('nim'),
            'nama' => session()->get('nama_asli'),
            // 'dosen' => $this->dosenModel->getAll(),
        ];
        return view('bimbingan/v_tambah_bimbingan', $data);
    }

    public function simpan_bimbingan()
    {
        if(!$this->validate([
            'bb_waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih waktu bimbingan'
                ]
            ],
            'bb_subjek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tuliskan subjek bimbingan'
                ]
            ],
            'bb_isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tuliskan keterangan perbaikan'
                ]
            ],
            'bb_data_dukung' => [
                'rules' => 'max_size[bb_data_dukung,2048]|ext_in[bb_data_dukung,pdf]',
                'errors' => [
                    'max_size' => 'ukuran file terlalu besar',
                    'ext_in' => 'file yang anda pilih bukan pdf'
                ]
            ]
        ])){
            return redirect()->to(base_url('skripsi/tambah-bimbingan'))->withInput();
        }
        $nim = session()->get('nim');
        $data_dukung = $this->request->getFile('bb_data_dukung');
        echo "Nama file: ".$data_dukung->getName();
        $data_dukung->move('./upload/data_dukung');
        $nama_data_dukung = $data_dukung->getName();
        $this->bimbinganModel->save([
            'bb_nim' => $nim,
            'bb_waktu' => $this->request->getVar('bb_waktu'),
            'bb_subjek' => $this->request->getVar('bb_subjek'),
            'bb_isi' => $this->request->getVar('bb_isi'),
            'bb_data_dukung' => $nama_data_dukung,
            'is_verifikasi' => 0,
        ]);
        return redirect()->to('/skripsi')->with('sukses','Data berhasil disimpan!');
    }
}
