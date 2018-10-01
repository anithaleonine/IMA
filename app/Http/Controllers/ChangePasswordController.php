<?php

namespace App\Http\Controllers;


use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ChangePasswordController extends Controller
{

    public function Confirmpassword()
    {
      return view('changepassword/confirmpassword');
    }

}
