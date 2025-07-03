<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCreatedAtToRiwayat extends Migration
{
    public function up()
    {
        $this->forge->addColumn('riwayat', [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'skor', // opsional, untuk posisi kolom
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('riwayat', 'created_at');
    }
}
