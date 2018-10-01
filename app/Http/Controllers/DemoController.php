<?php

namespace App\Http\Controllers;


use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Illuminate\Http\Request;

use App\User;

use App\Member;

use Mail; 



class DemoController extends Controller
{


    use  ThrottlesLogins;


    protected $redirectTo = '/';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Createpage()
    {
        return view('home/createpage');
    }


  public function test()
  {
     $data = ['message' => 'This is a test!'];

     Mail::to('ponarasup@gmail.com')->send(new TestEmail($data));
  }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function webRegister()
    {
        return view('webRegister');
    }


    public function webRegisterPost(Request $request)
    {
         $this->validate($request, [
            'first_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
            'CaptchaCode' => 'required|valid_captcha'


        ]);
          // if ($v->fails())
          // {
          // return redirect()->back()->withErrors($v->errors());
          // }
          // else
          //   {
                $first_name = $request->input('first_name');
                $email = $request->input('email');
                $password = $request->input('password');
                $mobile = $request->input('mobile');
                $users= User::create([
                    'email' => $email,
                    'password' => bcrypt($password),
                ]);
                $members= Member::create([
                    'user_id'=>$users['id'],
                    'first_name' => $first_name,
                    'mobile' => $mobile,

                  ]);
            return redirect()->back()->with('message', 'IT WORKS!');
        // }
        // catch (Exception $e) {
        //     //report($e);
        //     return false;
        // }
    }
}