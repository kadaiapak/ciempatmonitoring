<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $useTimestamps = true;
    protected $allowedFields = ['nama_asli',
    'nim',
    'username',
    'password',
    'user_foto',
    'user_uuid',
    'level',
    'terakhir_login'];

    public function login($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }
}