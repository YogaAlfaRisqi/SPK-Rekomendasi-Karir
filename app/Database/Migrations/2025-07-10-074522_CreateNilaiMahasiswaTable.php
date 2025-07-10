<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNilaiMahasiswaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'auto_increment' => true],
            'nama_mahasiswa'  => ['type' => 'VARCHAR', 'constraint' => 100],

            'C01'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C02'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C03'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C04'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C05'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C06'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C07'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C08'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C09'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'C010' => ['type' => 'VARCHAR', 'constraint' => 10],
            'C011' => ['type' => 'VARCHAR', 'constraint' => 10],
            'C012' => ['type' => 'VARCHAR', 'constraint' => 10],

            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // primary key
        $this->forge->createTable('nilai_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('nilai_mahasiswa');
    }
}
