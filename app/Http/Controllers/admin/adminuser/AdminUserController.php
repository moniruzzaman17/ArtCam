<?php

namespace App\Http\Controllers\admin\adminuser;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\AdminUser;
use Auth;

class AdminUserController extends Controller
{
	public function __construct()
	{
    	// check authenticated admin
		$this->middleware('admin.auth');
	}

	public function index()
	{
		$user = AdminUser::where('user_id', request('user_id'))->first();
		$userCount = AdminUser::count();

		return view('admin.adminuser.adminuserdetails',compact('user','userCount'));
	}

	public function deleteUser()
	{
		$user=AdminUser::find(request('user_id'));
		if($user->delete()){
			return redirect()->route('admin.user.grid',array('session_id'=>session()->getId()))->with('success', 'User has been removed');
		}
	}

	public function updateUser(Request $request){

    	// Validation
		$Messages = [
			'userName.required' => 'User full name is required',

			'userEmail.required' => 'User email is required',
			'userEmail.unique' => 'Admin user with requested email already exist',

			'currentUserPass.required' => 'Current logged user password is required',
		];

		$validatedData = $request->validate([
			'userName' => 'required|string',
			'userEmail' => 'required|email|unique:admin_users,email,'.request('user_id').',user_id',
			'userPass' => 'nullable',
			'currentUserPass' => 'required',
		],$Messages);
        // orders
		$currentUserRegisteredPass = AdminUser::select('password_hash')->where('user_id',Auth::guard('admin')->user()->user_id)->first()->password_hash;
		$adminUser = AdminUser::find(request('user_id'));

		if (Hash::check(request('currentUserPass'), $currentUserRegisteredPass)) {
			if (!empty(request('userPass'))) {
				$adminUsersUpdated  =   $adminUser->update([
					'name'            => request('userName'),
					'email'            => request('userEmail'),
					'password_hash'   => Hash::make(request('userPass')),
				]);
			}
			else{
				$adminUsersUpdated  =   $adminUser->update([
					'name'            => request('userName'),
					'email'            => request('userEmail'),
				]);
			}

			if ($adminUsersUpdated) {

				return redirect()->back()->with('success','Admin user successfully updated');
			}
			else {
				return redirect()->back()->with('failed','Something went Wrong! Not Saved');
			}
		}
		else {
			return redirect()->back()->with('failed','Current logged user password not matched with the records ! Not Updated');
		}
	}
}
