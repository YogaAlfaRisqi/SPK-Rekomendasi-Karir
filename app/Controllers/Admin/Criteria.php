<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Criteria extends BaseController {
    public function view(){
        $data = [
            'title' => "Criteria",
            'subtitle' => "Manage Your Criteria",
            'activePage' => 'criteria',
        ];
        return view('Dashboard/pages/criteria',$data);
    }
}