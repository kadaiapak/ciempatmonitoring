<?php

namespace App\Models;

use CodeIgniter\Model;

class SkripsiModel extends Model
{
    protected $table = 'skripsi';
    protected $primaryKey = 'skripsi_id';

    protected $useTimestamps = true;
    protected $allowedFields = [
    'nama_mahasiswa',
    'nim_mahasiswa',
    'periode_pengajuan',
    'tahun_pengajuan',
    'judul_skripsi',
    'slug_judul',
    'deskripsi_skripsi',
    'konsentrasi_bidang',
    'dosen_pembimbing',
    'dosen_pa',
    'penguji_satu',
    'penguji_dua',
    'data_dukung',
    'status_pengajuan_skripsi',
    'catatan',
    'pesan'];

    public function getAll($nim = null)
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
        $builder->groupStart();
        $builder->where('status_pengajuan_skripsi', '1');
        $builder->orWhere('status_pengajuan_skripsi', '2');
        $builder->orWhere('status_pengajuan_skripsi', '3');
        $builder->groupEnd();
        $query = $builder->get();
        return $query->getResultArray(); 
    }

    // used by Skripsi -> simpan_judul();
    public function simpanSkripsi($data)
    {
        $builder = $this->db->table('skripsi');
        $builder->set('skripsi_uuid','UUID()', FALSE);
        $builder->insert($data);
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
        $builder->where('status_pengajuan_skripsi', '3');
        $query = $builder->get();
        return $query->getResultArray(); 
    }

    public function getIdSkripsiUntukBimbingan($nim = null)
    {
        $builder = $this->db->table('skripsi');
        $builder->select('skripsi.skripsi_id as skripsi_id');
        $builder->where('nim_mahasiswa', $nim);
        $builder->where('status_pengajuan_skripsi', '3');
        $query = $builder->get();
        return $query->getRow();
     
    }

    // used by Skripsi -> index();
    public function cekBisaTambahSkripsi()
    {
        $nim  = session()->get('nim');
        $builder = $this->db->table('skripsi');
        $builder->where('nim_mahasiswa', $nim);
        $builder->groupStart();
        $builder->where('status_pengajuan_skripsi', '1');
        $builder->orWhere('status_pengajuan_skripsi', '3');
        $builder->groupEnd();
        $query = $builder->get();
        return $query->getNumRows();
    }

    // used by Skripsi -> index();
    public function cekBisaBimbingan()
    {
        $nim  = session()->get('nim');
        $builder = $this->db->table('skripsi');
        $builder->where('nim_mahasiswa', $nim);
        $builder->where('status_pengajuan_skripsi', '3');
        $query = $builder->get();
        return $query->getNumRows();
    }
}