@extends('layouts.admin.admin_app')

@section('content')
<div class="container" ng-app="login" ng-controller="LoginController">
<?php $data = Session::all(); 
// print_r($data);
?>

    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Register</h4></div>
                
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('web-register') }}" name="registerForm">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-8" id="form-messages" class="alert alert-danger" role="alert">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong class="danger" style="color:#dc3545;" >{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-8" id="form-messages" class="alert alert-danger" role="alert">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" ng-pattern="eml_add" ng-required="true" >
                                
                                 <span class="red-text" ng-if="registerForm.email.$error.required && registerForm.email.$dirty">Email is a required field</span>
            
                                 <span class="red-text" ng-show="registerForm.email.$error.pattern">Invalid Email</span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:#dc3545;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-8">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" ng-model="phone" ng-change="isValid(false)"  class="form-control" ng-required="true" ng-pattern="ph_numbr" >
                                  <small class="text-danger">{{ $errors->first('phone') }}</small>
                                  <div ng-messages="registerCreate.phone.$error" style="color:dc3545" role="alert">
                                  <div class="form-group col-md-12" ng-message="minlength">Your field is too short</div>
                                  <div class="form-group col-md-12" ng-message="maxlength">Your field is too long</div>
                                   <span class="red-text" ng-show="registerCreate.phone.$error.pattern">Please enter a valid 10 digit number</span>
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong style="color:#dc3545;">{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-8">
                             <input type="password" name="password" ng-model="password" class="form-control"  ng-minlength="3" ng-maxlength="25" required  >
                           <small class="text-danger">{{ $errors->first('password') }}</small>

                            <div ng-messages="registerForm.password.$error" style="color:maroon" role="alert">
                          <!-- <div ng-message="required">You did not enter a field</div> -->
                            <div class="form-group col-md-12" ng-message="minlength">Your field is too short</div>
                            <div class="form-group col-md-12" ng-message="maxlength">Your field is too long</div>
                            </div>
                                <!-- <input id="password" type="password" class="form-control" name="password" ng-change="isValid(false)" name="password" ng-model="password"> -->

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:#dc3545;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-8">
                               <!--  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" ng-model="cpassword" class="form-control" compare-to="password"> -->

                               <input type="password" name="password_confirmation" ng-model="password_confirmation" class="form-control" compare-to="password" ng-minlength="3" ng-maxlength="25" required  placeholder="Confirm Password" id="password-confirm"> 
                           <small class="text-danger">{{ $errors->first('cpassword') }}</small>
                           <div ng-if="registerForm.password_confirmation.$touched">
                            <span style="color:maroon" role="alert" class="error" ng-show="registerForm.password_confirmation.$error.compareTo">Passwords don't match.  
                            </span> 
                            </div>
                            <div ng-messages="registerForm.password_confirmation.$error" style="color:maroon" role="alert">
                          <!-- <div ng-message="required">You did not enter a field</div> -->
                            <div class="form-group col-md-12" ng-message="minlength">Your field is too short</div>
                            <div class="form-group col-md-12" ng-message="maxlength">Your field is too long</div>
                            </div>   
                          </div>   
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Captcha</label>


                            <div class="col-md-6">
                                {!! captcha_image_html('ContactCaptcha') !!}
                                <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:5px;    margin-left: 31px;">


                                @if ($errors->has('CaptchaCode'))
                                    <span class="help-block">
                                        <strong style="color:#dc3545;">{{ $errors->first('CaptchaCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
<!-- 
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif -->

    <!--  @foreach($errors->all(':message') as $message)
    <div id="form-messages" class="alert alert-danger" role="alert">
    {{ $message }}
    </div>
    @endforeach() -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
