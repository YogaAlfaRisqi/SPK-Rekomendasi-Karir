<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKodeToKriteria extends Migration
{
    public function up()
    {
        $this->forge->addColumn('criteria', [
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'after'      => 'id' // letakkan setelah kolom `id`
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('criteria', 'kode');
    }
}
