<?php

namespace App\Controllers;

use App\Models\SkripsiModel;
use App\Models\DosenModel;
use App\Models\BimbinganModel;
use App\Models\HistoriModel;


class Skripsi extends BaseController
{
    protected $skripsiModel;
    protected $bimbinganModel;
    protected $dosenModel;
    protected $historiModel;

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
        $semuaSkripsi = $this->skripsiModel->getAll($nim);
        $semuaBimbingan = $this->bimbinganModel->getAll($nim);
        $cekBisaTambahSkripsi = $this->skripsiModel->cekBisaTambahSkripsi();
        $cekBisaBimbingan = $this->skripsiModel->cekBisaBimbingan();
        $judulDiterima = $this->skripsiModel->getJudulDiterima($nim);

        // cek idSkripsi untuk melaukan bimbingan
        $idBimbingan = $this->skripsiModel->getIdSkripsiUntukBimbingan($nim);
        if($idBimbingan != null) {
            $idBimbinganTest = $idBimbingan->skripsi_id; 
        }else {
            $idBimbinganTest = false;
        }
        // akhir dari cek idSkripsi

        $data = [
            'judul' => 'Skripsi',
            'semua_skripsi' => $semuaSkripsi,
            'semua_bimbingan' => $semuaBimbingan,
            'judul_diterima' => $judulDiterima,
            'cekBisaTambahSkripsi' => $cekBisaTambahSkripsi,
            'cekBisaBimbingan' => $cekBisaBimbingan,
            'idBimbingan' => $idBimbinganTest,
        ];
        return view('skripsi/v_skripsi', $data);
    }

    public function ajukan_judul()
    {
        $data = [
            'judul' => 'Ajukan Skripsi',
            'nim' => session()->get('nim'),
            'nama' => session()->get('nama_asli'),
            'dosen' => $this->dosenModel->getAll(),
        ];
        return view('skripsi/v_ajukan_judul', $data);
    }

    public function simpan_judul()
    {
        if(!$this->validate([
            'periode_pengajuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih periode pengajuan'
                ]
            ],
            'tahun_pengajuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tahun pengajuan tidak boleh kosong'
                ]
            ],
            'judul_skripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'judul skripsi tidak boleh kosong'
                ]
            ],
            'deskripsi_skripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'deskripsisi tidak boleh kosong'
                ]
            ],
            'konsentrasi_bidang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'konsentrasi bidang tidak boleh kosong'
                ]
            ],
            'nama_dosen_pa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih Dosen PA'
                ]
            ],
            'nama_pembimbing' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih Dosen pembimbing'
                ]
            ],
            'data_dukung' => [
                'rules' => 'uploaded[data_dukung]|max_size[data_dukung,1024]|ext_in[data_dukung,pdf]',
                'errors' => [
                    'uploaded' => 'masukkan data dukung',
                    'max_size' => 'ukuran file terlalu besar',
                    'ext_in' => 'file yang anda pilih bukan pdf'
                ]
            ]
        ])){
            return redirect()->to(base_url('skripsi/ajukan-judul'))->withInput();
        }
        $data_dukung = $this->request->getFile('data_dukung');
        echo "Nama file: ".$data_dukung->getName();
        $data_dukung->move('./upload/data_dukung');
        $nama_data_dukung = $data_dukung->getName();
        $data = array(
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'nim_mahasiswa' => $this->request->getVar('nim_mahasiswa'),
            'periode_pengajuan' => $this->request->getVar('periode_pengajuan'),
            'tahun_pengajuan' => $this->request->getVar('tahun_pengajuan'),
            'judul_skripsi' => $this->request->getVar('judul_skripsi'),
            'deskripsi_skripsi' => $this->request->getVar('deskripsi_skripsi'),
            'konsentrasi_bidang' => $this->request->getVar('konsentrasi_bidang'),
            'dosen_pembimbing' => $this->request->getVar('nama_pembimbing'),
            'dosen_pa' => $this->request->getVar('nama_dosen_pa'),
            'data_dukung' => $nama_data_dukung,
            'status_pengajuan_skripsi' => 1,
        );
        $this->skripsiModel->simpanSkripsi($data);
        $skripsi_id = $this->skripsiModel->getInsertID();
        $this->historiModel->save([
            'histori_skripsi_id' => $skripsi_id,
            'histori_nim' => $this->request->getVar('nim_mahasiswa'),
            'histori_status' => 1,
            'histori_keterangan' => 'pengajuan judul'
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
                    'single_skripsi' => $single_skripsi,
                    'dosen' => $this->dosenModel->getAll(),
                ];
                return view('skripsi/v_edit_skripsi', $data);
            }   
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_skripsi($id=null)
    {
        if(!$this->validate([
            'periode_pengajuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih periode pengajuan'
                ]
            ],
            'tahun_pengajuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tahun pengajuan tidak boleh kosong'
                ]
            ],
            'judul_skripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'judul skripsi tidak boleh kosong'
                ]
            ],
            'deskripsi_skripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'deskripsisi tidak boleh kosong'
                ]
            ],
            'konsentrasi_bidang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'konsentrasi bidang tidak boleh kosong'
                ]
            ],
            'dosen_pembimbing' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih Dosen pembimbing'
                ]
            ],
            'dosen_pa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih Dosen PA'
                ]
            ],
            'data_dukung' => [
                'rules' => 'uploaded[data_dukung]|max_size[data_dukung,1024]|ext_in[data_dukung,pdf]',
                'errors' => [
                    'uploaded' => 'masukkan data dukung',
                    'max_size' => 'ukuran file terlalu besar',
                    'ext_in' => 'file yang anda pilih bukan pdf'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        }
        $data_dukung = $this->request->getFile('data_dukung');
        echo "Nama file: ".$data_dukung->getName();
        $data_dukung->move('./upload/data_dukung');
        $nama_data_dukung = $data_dukung->getName();
        $data = [
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
        ];
        $this->skripsiModel->update($id, $data);
        return redirect()->to('/skripsi')->with('sukses','Data berhasil diubah!');
    }

    public function upload_skripsi()
    {
        $data = [
            'judul' => 'Upload Skripsi',
            'nim' => session()->get('nim'),
            'nama' => session()->get('nama_asli')
        ];
        return view('skripsi/v_upload_skripsi', $data);
    }

    public function semua_skripsi()
    {
        $semuaSkripsi = $this->skripsiModel->getAll();
        $data = [
            'judul' => 'Skripsi',
            'semua_skripsi' => $semuaSkripsi
        ];
        return view('skripsi/v_semua_skripsi_oleh_kadep', $data);
    }

    public function proses_skripsi_oleh_kadep($id=null)
    {
        if($id != null) {
            $single_skripsi = $this->skripsiModel->find($id);
            if (!$single_skripsi) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            } else {
                $data = [
                    'judul' => 'Edit Skripsi',
                    'single_skripsi' => $single_skripsi,
                    'dosen' => $this->dosenModel->getAll(),
                ];
                return view('skripsi/v_proses_skripsi_oleh_kadep', $data);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_skripsi_oleh_kadep($id=null)
    {
        $data = [
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'nim_mahasiswa' => $this->request->getVar('nim_mahasiswa'),
            'periode_pengajuan' => $this->request->getVar('periode_pengajuan'),
            'tahun_pengajuan' => $this->request->getVar('tahun_pengajuan'),
            'judul_skripsi' => $this->request->getVar('judul_skripsi'),
            'deskripsi_skripsi' => $this->request->getVar('deskripsi_skripsi'),
            'konsentrasi_bidang' => $this->request->getVar('konsentrasi_bidang'),
            'dosen_pembimbing' => $this->request->getVar('dosen_pembimbing'),
            'dosen_pa' => $this->request->getVar('dosen_pa'),
            'penguji_satu' => $this->request->getVar('penguji_satu'),
            'penguji_dua' => $this->request->getVar('penguji_dua'),
            'status_pengajuan_skripsi' => 3,
        ];
        $this->skripsiModel->update($id, $data);
        return redirect()->to('/skripsi/semua_skripsi')->with('sukses','Data berhasil diubah!');
    }
}
