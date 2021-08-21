<?php

namespace App\Http\Controllers\admin\adminuser;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\AdminUser;
use Auth;
class NewUserController extends Controller
{
    public function __construct()
    {
    	// check authenticated admin
        $this->middleware('admin.auth');
    }

    public function index()
    {
    	return view('admin.adminuser.newuser');
    }

    public function store(Request $request)
    {
    	// Validation
    	$Messages = [
    		'newuserName.required' => 'New User full name is required',

    		'newuserEmail.required' => 'New User email is required',
    		'newuserEmail.unique' => 'Admin user with requested email already exist',

    		'newuserPass.required' => 'New User password is required',

    		'currentUserPass.required' => 'Current logged user password is required',
    	];

    	$validatedData = $request->validate([
    		'newuserName' => 'required|string',
	        'newuserEmail' => 'required|email|unique:admin_users,email',
	        'newuserPass' => 'required',
	        'currentUserPass' => 'required',
	    ],$Messages);
        // orders
        $currentUserRegisteredPass = AdminUser::select('password_hash')->where('user_id',Auth::guard('admin')->user()->user_id)->first()->password_hash;
        if (Hash::check(request('currentUserPass'), $currentUserRegisteredPass)) {
	        $adminUsersAdded  =   AdminUser::create([
			                        'name'            => request('newuserName'),
			                        'email'            => request('newuserEmail'),
			                        'password_hash'   => Hash::make(request('newuserPass')),
			                    ]);

	        if ($adminUsersAdded) {
	        	return redirect()->back()->with('success','Admin user successfully added');
	        }
	        else {
	        	return redirect()->back()->with('error','Something went Wrong! Not Saved');
	        }
	    }
	    else {
	        	return redirect()->back()->with('error','Current logged user password not matched with the records ! Not Saved');
	    }

    }
}
