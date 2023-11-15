<?php

namespace App\Models;

use CodeIgniter\Model;

class BimbinganModel extends Model
{
    protected $table = 'bimbingan';
    protected $primaryKey = 'bimbingan_id';

    protected $useTimestamps = true;
    protected $allowedFields = [
    'bb_skripsi_id',
    'bb_waktu',
    'bb_subjek',
    'bb_isi',
    'bb_data_dukung',
    'bb_pesan',
    'is_verifikasi',
    'is_view',
    'is_deleted',
];

    public function getAll($nim = null)
    {   
        $builder = $this->db->table('bimbingan');
        $builder->select('bimbingan.*,skripsi.*');
        $builder->join('skripsi', 'bimbingan.bb_skripsi_id = skripsi.skripsi_id');
        if($nim) {
            $builder->where('nim_mahasiswa', $nim);
        }
        $query = $builder->get();
        return $query->getResultArray(); 
    }

    public function getJudulDiterima($nim = null)
    {   
        $builder = $this->db->table('skripsi');
        $builder->select('skripsi.*, 
        fip_dosen_pembimbing.nidn as d_pembimbing_nidn, fip_dosen_pembimbing.peg_gel_dep as d_pembimbing_peg_gel_dep, fip_dosen_pembimbing.peg_nama as d_pembimbing_peg_nama, fip_dosen_pembimbing.peg_gel_bel as d_pembimbing_peg_gel_bel,
        fip_dosen_pa.nidn as d_pa_nidn, fip_dosen_pa.peg_gel_dep as d_pa_peg_gel_dep, fip_dosen_pa.peg_nama as d_pa_peg_nama, fip_dosen_pa.peg_gel_bel as d_pa_peg_gel_bel');
        $builder->join('fip_dosen as fip_dosen_pembimbing', 'fip_dosen_pembimbing.nidn = skripsi.dosen_pembimbing');
        $builder->join('fip_dosen as fip_dosen_pa', 'fip_dosen_pa.nidn = skripsi.dosen_pa');
        if($nim) {
            $builder->where('nim_mahasiswa', $nim);
        }
        $builder->where('status_pengajuan_skripsi', '4');
        $query = $builder->get();
        return $query->getResultArray(); 
    }
    public function cekSkripsiDiterima()
    {
        $nim  = session()->get('nim');
        $builder = $this->db->table('skripsi');
        $builder->where('nim_mahasiswa', $nim);
        $builder->where('status_pengajuan_skripsi', 3);
        $query = $builder->get();
        return $query->getNumRows();
    }
}