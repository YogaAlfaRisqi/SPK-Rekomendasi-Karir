<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKriteriaToMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addColumn('mahasiswa', [
            'kriteria_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'after'      => 'user_id',
            ],
            'nilai' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
                'after'      => 'kriteria_id',
            ],
        ]);

        // Tambahkan foreign key jika tabel kriteria sudah ada
        $this->db->query('ALTER TABLE mahasiswa ADD CONSTRAINT fk_kriteria FOREIGN KEY (kriteria_id) REFERENCES criteria(id) ON DELETE CASCADE');
    }

    public function down()
    {
        //
        $this->forge->dropForeignKey('mahasiswa', 'fk_kriteria');
        $this->forge->dropColumn('mahasiswa', ['kriteria_id', 'nilai']);
    }
}
