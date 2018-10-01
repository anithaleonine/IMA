<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
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
    use AuthenticatesUsers {
        login as protected traitLogin;
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/createpage';
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
     * @override
     * We are Overriding the default Login handler to include an Addition check of blocked User.
     */
    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();
        if($user && $user->status == true)
            return back()->withErrors([
                'email' => 'Your Account has been blocked. Please contact the Administrators'
            ]);
        return $this->traitLogin($request);
    }
}