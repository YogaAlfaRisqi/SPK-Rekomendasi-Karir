<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'password', 'role', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // CI4 akan otomatis isi created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
