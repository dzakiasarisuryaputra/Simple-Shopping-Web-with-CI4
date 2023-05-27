<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Home extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_brg'    => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_brg' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'deskripsi' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'gambar' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id_brg');
        $this->forge->createTable('home');
    }

    public function down()
    {
        $this->forge->dropTable('home');
    }
}
