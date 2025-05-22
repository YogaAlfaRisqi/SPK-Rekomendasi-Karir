<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class User extends BaseController {
    public function view(){
        $data = [
            'title' => "User",
            'subtitle' => "Manage Your User",
            'activePage' => 'user',
        ];
        return view('Dashboard/pages/user',$data);
    }
}