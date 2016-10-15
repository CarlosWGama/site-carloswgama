<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;

class DashboardController extends AdminController {
    //

    public function index() {
        return $this->view('admin.dashboard.index');
    }
}
