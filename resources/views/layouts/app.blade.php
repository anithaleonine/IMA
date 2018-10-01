<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">




    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

<style type="text/css">
.msg {
    display: none;
}
.error {
    color: red;
}
.success {
    color: green;
}
</style>

</head>
<body>
    <div id="app">
       

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->

<script>

$( "#myform" ).validate({
  rules: {
    password: "required",
    password_confirmation: {
      equalTo: "#password"
    }
  }
});
</script>



<script>
$('form input[name="email"]').blur(function () {
    var email = $(this).val();
var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
if (re.test(email)) {
    $('.msg').hide();
    $('.success').show();
} else {
    $('.msg').hide();
    $('.error').show();
}

});
</script>

<script type="text/javascript">
$( "#login" ).validate({
    messages: {
        password: "password is required.",
        email: {
            required: "Email is required.",
            email: "You must provide a valid email address."
        }
    }
});

</script>

</body>
</html>
