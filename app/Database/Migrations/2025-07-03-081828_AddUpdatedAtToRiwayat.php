<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdatedAtToRiwayat extends Migration
{
    public function up()
    {
        $this->forge->addColumn('riwayat', [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'created_at',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('riwayat', 'updated_at');
    }
}
