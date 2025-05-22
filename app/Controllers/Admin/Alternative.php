<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Alternative extends BaseController {
    public function view(){
        $data = [
            'title' => "Alternative",
            'subtitle' => "Manage Your Alternaive",
            'activePage' => 'alternative',
        ];
        return view('Dashboard/pages/alternative',$data);
    }
}