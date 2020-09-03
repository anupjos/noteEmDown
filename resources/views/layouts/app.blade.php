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
        <link rel="stylesheet" href="/css/custom.css">
        <script src="https://kit.fontawesome.com/22c9dfb9c5.js" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        
    </head>

    <body>
        <div class="area">
            <nav class="navbar navbar-expand-md">  <!-- bg-primary -->
                <div class="navbar-collapse collapse w-100 order-1 order-md-0 navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Create/Add
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item nav-link" href="/task/create">Task</a>
                                <a class="dropdown-item nav-link" href="/stage/create">Stage</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mx-auto order-0">
                    <a class="navbar-brand mx-auto" href="/dashboard">Note 'Em Down </a>
                    <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse w-100 order-3 navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        @if( auth()->check() )
                        <li class="nav-item">
                            <a class="nav-link" href="/settings"><small><i class="far fa-user"></i></small> {{ auth()->user()->name }}</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content">
                <div class="alertHolder">
                    @if(Session::has('error_message'))
                        <div class="alert alert-danger" role="alert">
                            {!! Session::get('error_message') !!}
                        </div>
                    @endif
                    @if(Session::has('success_message'))
                        <div class="alert alert-success" role="alert">
                            {!! Session::get('success_message') !!}
                        </div>
                    @endif
                </div>
                @yield("content")
            </div>
        </div>
        
        @yield('script')
    </body>
</html>
