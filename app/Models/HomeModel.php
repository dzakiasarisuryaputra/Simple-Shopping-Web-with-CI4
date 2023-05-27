<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = "home";
    protected $primaryKey = "id_brg";
    protected $returnType = "array";
    protected $allowedFields = ['id_brg', 'nama_brg', 'deskripsi', 'gambar', 'harga'];
}
