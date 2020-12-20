<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Electrolize&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        .wave{
            position: fixed;
            bottom: 0;
            left: 0;
            height: 100%;
            z-index: -1;
        }

        .container{
            width: 100vw;
            height: 100vh;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap :7rem;
            padding: 0 2rem;
        }

        .img{
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .login-content{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
        }

        .img img{
            width: 500px;
        }

        form{
            width: 360px;
        }

        .login-content img{
            height: 100px;
        }

        .login-content h2{
            margin: 15px 0;
            color: #333;
            text-transform: uppercase;
            font-size: 2.9rem;
        }

        .login-content .input-div{
            position: relative;
            display: grid;
            margin: 25px 0;
            padding: 5px 0;
            border-bottom: 2px solid #d9d9d9;
        }

        .login-content .input-div.one{
            margin-top: 0;
        }

        .i{
            color: #d9d9d9;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .i i{
            transition: .3s;
        }

        .input-div > div{
            position: relative;
            height: 45px;
        }

        .input-div > label{
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
            transition: .3s;
        }

        .input-div:before, .input-div:after{
            content: '';
            position: absolute;
            bottom: -2px;
            width: 0%;
            height: 2px;
            background-color: #38d39f;
            transition: .4s;
        }

        .input-div:before{
            right: 50%;
        }

        .input-div:after{
            left: 50%;
        }

        .input-div.focus:before, .input-div.focus:after{
            width: 50%;
        }

        .input-div.focus > label{
            top: -5px;
            font-size: 15px;
        }

        .input-div.focus > .i > i{
            color: #38d39f;
        }

        .input-div > div > input{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: none;
            padding: 0.5rem 0.7rem;
            font-size: 1.2rem;
            color: #555;
            font-family: 'poppins', sans-serif;
        }

        .input-div.pass{
            margin-bottom: 4px;
        }

        .forgot-pass{
            display: block;
            right: 0;
            padding: 2px;
            text-decoration: none;
            color: #999;
            font-size: 0.9rem;
            transition: .3s;
        }

        .forgot-pass:hover{
            color: #38d39f;
        }
        .remember {
            left: 0;
        }

        .btn{
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
            background-size: 200%;
            font-size: 1.2rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
        }
        .btn:hover{
            background-position: right;
        }


        @media screen and (max-width: 1050px){
            .container{
                grid-gap: 5rem;
            }
        }

        @media screen and (max-width: 1000px){
            form{
                width: 290px;
            }

            .login-content h2{
                font-size: 2.4rem;
                margin: 8px 0;
            }

            .img img{
                width: 400px;
            }
        }

        @media screen and (max-width: 900px){
            .container{
                grid-template-columns: 1fr;
            }

            .img{
                display: none;
            }

            .wave{
                display: none;
            }

            .login-content{
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <img class="wave" src="/images/wave.png">
    <div class="container">
        <div class="img">
            <img src="/images/bg.svg">
        </div>
        <div class="login-content">
            <form method="POST" action="/login">
                <img class="mb-4" src="/images/avatar.svg">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('thongbao'))
                <div class="alert bg-danger">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Error!</span>  {{session('thongbao')}}
                </div>
            @endif
                <div class="input-div one">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div class="div">
                        <input id="email" type="email" class="@error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                    </div>
                </div>

                <div class="input-div pass">
                    <label for="password">{{ __('Password') }}</label>

                    <div class="div">
                        <input id="password" type="password" class="f @error('password') is-invalid @enderror input" name="password" required autocomplete="current-password"> @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                    </div>
                </div>

                <div class="position-relative py-4 ml-4">
                    <div class="remember position-absolute">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    
                </div>

                <div class="mt-4">
                    <div>
                        <button type="submit" class="btn">
                            {{ __('Login') }}
                        </button> @if (Route::has('password.request'))
                    <a class="forgot-pass" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a> @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const inputs = document.querySelectorAll(".input");

        function addcl(){
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl(){
            let parent = this.parentNode.parentNode;
            if(this.value == ""){
                parent.classList.remove("focus");
            }
        }


        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
</body>

</html>