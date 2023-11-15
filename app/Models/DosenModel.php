<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'fip_dosen';
    protected $primaryKey = 'nidn';

    protected $useTimestamps = true;
    protected $allowedFields = [
    'peg_nip',
    'peg_gel_dep',
    'peg_nama',
    'peg_gel_bel',
    'peg_status',
    'peg_bidan',
    'peg_pangkat',
    'peg_golongan',
    'peg_jabatan',
    'peg_tmp_lahir',
    'peg_tgl_lahir',
    'peg_sex',
    'peg_agama',
    'peg_prodi',
    'peg_pendidikan',
    'peg_tmt',
    'peg_no_sk',
    'peg_kota',
    'peg_pro',
    'peg_kawin',
    'peg_telp',
    'peg_hp',
    'peg_email',
    'peg_status_aktif',
    'peg_alamat',
];
    public function getAll()
    {

        $sql = 'SELECT *,  FROM fip_dosen ';
        $dosen = $this->db->query($sql);
        dd($dosen->getResult());

        return $this->db->table('fip_dosen')
        ->orderBy('peg_nama','ASC')->get()->getResult();

    }
}