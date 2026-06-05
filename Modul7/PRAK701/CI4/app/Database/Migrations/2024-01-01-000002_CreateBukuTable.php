<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'tahun_terbit' => [
                'type'       => 'YEAR',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('buku');
    }

    public function down(): void
    {
        $this->forge->dropTable('buku');
    }
}