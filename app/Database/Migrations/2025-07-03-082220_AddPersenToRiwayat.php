<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPersenToRiwayat extends Migration
{
    public function up()
{
    $this->forge->addColumn('riwayat', [
        'persentase' => [
            'type' => 'FLOAT',
            'constraint' => '5,2',
            'null' => true,
            'after' => 'skor'
        ]
    ]);
}

public function down()
{
    $this->forge->dropColumn('riwayat', 'persentase');
}

}
