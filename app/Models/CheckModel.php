<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckModel extends Model
{
    protected $table      = 'checkout';
    protected $primaryKey = 'id_ck';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['uname_p', 'nama_p', 'nohp', 'alamat', 'brg_ck', 'qty', 'hbrg_ck', 'kurir', 'bayar_ck'];
    protected $returnType = 'array';

    public function getCk($key)
    {
        $sql = "SELECT * FROM checkout WHERE uname_p='$key'";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        return $data;
    }
}
