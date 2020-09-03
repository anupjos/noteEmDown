{{--     @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
 
    <h2>Login</h2>
    <div class="row justify-content-sm-center">
        <div class="col-sm-6 align-self-center">
            {!! Form::open(['role' => 'form']) !!}
     
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
     
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
 

            <!-- Submit Button -->
            <div class="form-group text-center p-2">
                {!! Form::submit('Login', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Note 'Em Down</title>

        <!-- Fonts, Bootstrap -->
        <link href="https://fonts.googleapis.com/css2?family=Domine&display=swap" rel="stylesheet">

        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="/css/login.css">
        <script src="https://kit.fontawesome.com/22c9dfb9c5.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pass-reset-holder">
                        <div class="pass-reset">
                            <form class="login" action="/password/reset" method="POST">
                                @csrf
                                <input type="email" name="resetEmail" placeholder="Email address you signed up with" />
                                <input type="submit" value="Submit" class="pass-reset-submit btn btn-success" />
                            </form>
                        </div>
                    </div>
                    <div class="login-holder">
                        <p class="form-title">
                            Log in to Note 'Em Down</p>
                        <form role="form" class="login" action="/login" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="Email Address" />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="submit" value="Log In" class="btn btn-success" />
                            <div class="forgot text-center mt-2">
                                <a href="javascript:void(0)" class="forgot-pass">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a href="/register">Create New Account</a>
                            </div>
                        </form>
                    </div>
                    <div class="alertHolder mt-2">
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> {!! Session::get('error_message') !!}
                            </div>
                        @endif
                        @if(Session::has('success_message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Success!</strong> {!! Session::get('success_message') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.forgot-pass').click(function(event) {
                    $(".pass-reset-holder").toggleClass("show-pass-reset");
                }); 
                
                $('.pass-reset-submit').click(function(event) {
                    $(".pass-reset-holder").removeClass("show-pass-reset");
                }); 
            });
        </script>
    </body>
</html>