<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBuku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tahun_terbit' => [
                'type'       => 'INT',
                'constraint' => 4,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('buku');
    }

    public function down()
    {
        $this->forge->dropTable('buku');
    }
}
