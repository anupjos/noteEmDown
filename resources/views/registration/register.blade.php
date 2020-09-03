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
                    <div class="login-holder">
                        <p class="form-title">
                            Sign Up for Note 'Em Down</p>
                        <form role="form" class="login" action="/register" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Name" />
                            <input type="email" name="email" placeholder="Email Address" />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="submit" value="Sign Up" class="btn btn-success" />
                            <div class="text-center">
                                <a href="/login">Already have an account? Log In</a>
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
    </body>
</html>