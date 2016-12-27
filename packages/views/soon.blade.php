<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Coming Soon</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .z-css{
                color: #2196F3;
                font-size: 1.3em;
            }
            .tt-date{
                color: white;
                background-color: #757575;
                padding: 3px 12%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        
                            @if(Route::has('login'))
                                <a href="{{ url('/login') }}">Login</a> 
                            @endif
                            @if(Route::has('register'))
                                <a href="{{ url('/register') }}">Register</a> 
                            @endif

                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Coming <span class="z-css">Soon</span>
                </div> 
                <span class="tt-date">{{ date('Y-m-j') }}</span>
            </div>
        </div>
    </body>
</html>
