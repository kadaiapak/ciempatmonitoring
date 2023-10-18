<?php

namespace App\Models;

use CodeIgniter\Model;

class SkripsiModel extends Model
{
    protected $table = 'skripsi';
    protected $primaryKey = 'skripsi_id';

    protected $useTimestamps = true;
    protected $allowedFields = ['nama_mahasiswa',
    'nim_mahasiswa',
    'periode_pengajuan',
    'tahun_pengajuan',
    'judul_skripsi',
    'slug_judul',
    'deskripsi_skripsi',
    'konsentrasi_bidang',
    'nama_pembimbing',
    'nama_dosen_pa',
    'data_dukung',
    'status_pengajuan_skripsi'];
}