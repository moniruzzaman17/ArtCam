<?php

namespace App\Http\Controllers\admin\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminUser;
use Carbon\Carbon;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $maxAttempts = 3;
    protected $decayMinutes = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
    	return view('admin.auth.login');
    }

    protected function guard(){
        return Auth::guard('admin');
    }
    // /**
    //  * Redirect to homepage after login.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function redirectTo(){
        // return '/admin/dashboard'; // works for login
        return route('admin.home',session()->getId()); // works for login
    }

    // /**
    //  * Get the login username to be used by the controller.
    //  *
    //  * @return string
    //  */
    public function username()
    {
        return 'email';
    }

    // /**
    //  * Validate the user login request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return void
    //  *
    //  * @throws \Illuminate\Validation\ValidationException
    //  */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|email|max:255',
            'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        $this->store();
        return [
            'email'=>$request->{$this->username()},
            'password'=>$request->password
        ];
    }
    protected function store(){
        $admin = AdminUser::orderBy('user_id', 'DESC')->first();
        $admin->last_log_time =  Carbon::now('Asia/Dhaka');
        $admin->lognum =  $admin->lognum +1;

    //     // Store admin session key
    //     /*
    //     $adminSession = new AdminUserSession;
    //     $adminSession->user_id =  $admin->user_id;
    //     $adminSession->session_id =  session()->getId();
    //     $adminSession->ip =  request()->ip(); */


        $admin->save();
    //     // $adminSession->save();
    }

    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('admin.login');
        // return route('admin.login');
    }
}
