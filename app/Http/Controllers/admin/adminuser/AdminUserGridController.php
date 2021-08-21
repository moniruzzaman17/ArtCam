<?php

namespace App\Http\Controllers\admin\adminuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminUser;

class AdminUserGridController extends Controller
{
    public function __construct()
    {
    	// check authenticated admin
        $this->middleware('admin.auth');
    }

    public function index()
    {
    	$adminusers = AdminUser::get();
        // dd($adminusers[0]->hasCustomRole->roleCustom->name);
    	return view('admin.adminuser.adminusergrid',['adminusers'=>$adminusers]);
    }
}
