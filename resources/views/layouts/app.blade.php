<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Web Nhà Trọ</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Electrolize&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
       
        <style>
            html, body {
                font-family: 'Roboto', sans-serif;
                color: #2c3e50;
                background-color: #eeeeee;
                font-size: 16px;
            }
            ul li {
            list-style: none;
            }
            a {
            text-decoration: none;
            color: inherit;
            }
            h4, h3 {
                font-size: 16px;
            }
            small {
                font-size: 12px;
            }
            .item {
                border: 1px solid #e3e3e3;
                border-radius: 5px;
            }
            .btn-like {
                right: 0;
                border: none;
                background-color: initial;
            }
            .btn-rating {
                left: 0;
                border: none;
                background-color: initial;
            }
            i {
            font-size: 14px;
            }
            .btn-i-like {
                font-size: 18px;
            }
            button:focus{
            outline: none;
            }
            .navigation-component {
                font-family: Helvetica, Arial, sans-serif;
                position: sticky;
                background-color: rgb(255, 186, 0);
                border-color: rgb(255, 161, 0);
                top: 0px;
                width: 100%;
                font-size: 16px;
                z-index: 1000;
                user-select: none;
                transition-property: height;
                transition-duration: 0.1s;
                }
                .btn-icon {
                color: black;
                }
                .btn-icon-big {
                font-size: 30px;
                }
                .btn-icon:hover {
                color: #505050;
                }
                i {
                font-size: 20px;
                }
                .input-search {
                    height: 36px;
                    background-color: rgb(255, 255, 255);
                    border-radius: 0 5px 5px 0;
                    border: none;
                    position: relative;
                    padding: 0px;
                    font-size: 15px;
                    font-weight: normal;
                    font-stretch: normal;
                    font-style: normal;
                    line-height: 1.33;
                    letter-spacing: normal;
                    outline: none;
                    color: rgb(34, 34, 34);
                    text-indent: 12px;
                }
                .bg-search {
                background: white;
                border-radius: 5px 0 0 5px;
                border: white;
                }
                button:focus {
                outline: none;
                }
                .btn-edit {
                    text-transform: uppercase;
                    background: #fc9807;
                    color: #fff;
                    font-weight: bold;
                    border-radius: 4px;
                    text-decoration: none;
                }
                .footer-component {
                    border-top: 2px solid #c3c3c3;
                }
                .list-nostyle {
                list-style: none;
                }
                a {
                text-decoration: none;
                color: inherit;
                }
                .border-top{
                border-top: 2px solid #c3c3c3 !important;
                }
                .logo-img {
                width: 120px;
                }
                .bg-yellow {
                background-color: rgb(255, 186, 0);
                }
                .vs-con-input-label {
                    position: relative;
                    transition: all .3s ease;
                    width: 200px;
                }
                .vs-input--label {
                    padding-left: 5px;
                    font-size: .85rem;
                    color: rgba(0,0,0,.7);
                    display: inline-block;
                    margin-bottom: .5rem;
                }
                .vs-con-input-label .vs-con-input {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    align-items: flex-start;
                    flex-direction: column;
                    position: relative;
                    justify-content: center;
                }
                .vs-input--input {
                    color: inherit;
                    position: relative;
                    padding: .4rem;
                    border-radius: 5px;
                    border: 1px solid rgba(0,0,0,.2);
                    box-sizing: border-box;
                    box-shadow: 0 0 0 0 rgba(0,0,0,.15);
                    transition: all .3s ease;
                    width: 100%;
                }
                button, input {
                    overflow: visible;
                }
                .vs-con-textarea {
                    width: 100%;
                    position: relative;
                    border: 1px solid rgba(0,0,0,.08);
                    box-shadow: 0 0 0 0 transparent;
                    border-radius: 6px;
                    transform: translate(0);
                }
                .vs-textarea {
                    resize: none;
                    border-radius: 6px;
                    border: 0 solid transparent;
                    display: block;
                    padding: 9px;
                    color: rgba(0,0,0,.8);
                    width: 100%;
                    max-width: 100%;
                    min-width: 100%;
                    background: transparent;
                }
                h2 {
                    font-size: 22px;
                }
                .wrap {
                    height: 210px;
                    line-height: initial;
                }
                .wrap {
                    height: 60px;
                    line-height: 60px;
                    overflow: hidden;
                    -moz-transition: 0.3s height ease;
                    -o-transition: 0.3s height ease;
                    -webkit-transition: 0.3s height ease;
                    transition: 0.3s height ease;
                }
                .wrap img {
                    width: 50px;
                    border-radius: 50%;
                    padding: 3px;
                    height: auto;
                    float: left;
                    cursor: pointer;
                    -moz-transition: 0.3s border ease;
                    -o-transition: 0.3s border ease;
                    -webkit-transition: 0.3s border ease;
                    transition: 0.3s border ease;
                }
        </style>
</head>
<body>
    <div id="app">

        <div class="navigation-component">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 text-left pl-5 py-2">
                        <img class="logo-img ml-4" src="/images/logo.png" alt />
                    </div>
                    <div class="col-md-8 col-sm-12 py-3 d-flex align-items-center justify-content-center">
                        <div class="px-3">
                            <a href="/" class="btn-icon"><i class="fas fa-home pr-2"></i>Home </a>
                        </div>
                        <div class="px-3">
                            <a href="/owner" class="btn-icon"><i class="far fa-user pr-2"></i>Quản Lí</a>
                        </div>
                        <div class="px-3">
                            <a href="/chat" class="btn-icon"><i class="far fa-comments pr-2"></i>Chat </a>
                        </div>
                        <div class="px-3">
                            <a href="/post" class="btn-icon"><i class="far fa-edit pr-2"></i>Đăng tin</a>
                        </div>
                    </div>
                </div>
                <div class="row pb-1">
                    <div class="col-md-6 col-sm-12 text-left py-2 align-items-center justify-content-center">
                        <div class="d-flex pl-5">
                            <button class="bg-search"><i class="fas fa-search pt-1 pl-2 pr-1"></i></button>
                            <input placeholder="Bất động sản" type="text" class="input-search w-100" id="keyword" onchange="change()" value="">
                       </div>
                    </div>
                    <div class="col-md-5 col-sm-12 mx-4 px-5 d-flex align-items-center justify-content-center">
                        <div class="px-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-center position-ref full-height">
                                    @if (Route::has('login'))
                                        <div class="top-right links d-flex">
                                            @auth
                                                <div class="profile">
                                                    <button class="wrap btn-admin dropdown-toggle ml-3 p-2 text-font" data-toggle="dropdown" href="#">
                                                        <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" alt="" class="online">
                                                        {{ Auth::user()->name }}
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-menu-title">
                                                            <span class="pl-3">Cài đặt tài khoản</span>
                                                        </li>
                                                        <li><a class="pl-3 text-dark" href="/logout"><i class="halflings-icon off"></i>Đăng xuất</a></li>
                                                    </ul>
                                                </div>
                                            @else
                                                <a href="/commentIndex"><h2 class="px-2">{{ __('Login') }}</h2></a>

                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}"><h2 class="px-4">{{ __('Register') }}</h2></a>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <main class="py-4">
            @yield('content')
        </main>

        <div class="container-fluid py-4 second-background">
            <div class="container">
                <div class="row m-0 p-0">
                    <div class="col-12 m-0 p-0">
                        <div class="contact-component">
                            <div class="card border-radius-none">
                            <div class="card-body p-0">
                                <div class="row m-0 p-0">
                                <div class="col-6 bg-yellow d-flex justify-content-center align-items-center">
                                    <img class="logo-img" src="" alt />
                                    </div>
                                    <div  class="col-6 text-left p-2">
                                        <form action="/report" method="POST">
                                            @csrf
                                            <div  class="row w-100">
                                                <div  class="col-12 mb-3">
                                                    <div  class="  vs-con-input-label vs-input w-100">
                                                    <label for="" class="vs-input--label">Tên</label>
                                                    <div class="vs-con-input">
                                                        <input type="text" class="vs-input--input normal" placeholder="John Wist" name="name">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div  class="col-12 mb-3">
                                                    <div  class="  vs-con-input-label vs-input w-100">
                                                    <label for="" class="vs-input--label">Email</label>
                                                    <div class="vs-con-input">
                                                        <input type="text" class="vs-input--input normal" placeholder="youremail@email.com" name="email">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div  class="col-12 mb-3">
                                                    <div  class="  vs-con-input-label vs-input w-100">
                                                    <label for="" class="vs-input--label">Số điện thoại</label>
                                                    <div class="vs-con-input">
                                                        <input type="text" class="vs-input--input normal" placeholder="+84 930.293.232" name="phone">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div  class="col-12 mb-3">
                                                    <label class="mx-2">Nội dụng</label>
                                                    <div  class="vs-con-textarea">
                                                    <textarea placeholder="customer's feedback" class="vs-textarea" name="mess"></textarea>
                                                    </div>
                                                </div>
                                                <div  class="col-12 mb-3 text-right">
                                                    <button type="submit" class="btn btn-warning">Send us</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-component text-black py-2 pt-4 mx-5">
            <div class="container">
            <div class="row m-0 p-0 text-left">
                <div class="col-md-8 col-sm-12 m-0 px-5 d-flex flex-column">
                <h4>Chúng tôi</h4>
                <p>Với hệ thống căn hộ tiện ích đạt chuẩn, Nhà Trọ Tốt chú trọng xây dựng tính cộng đồng và phát triển đời sống xã hội cho thế hệ trẻ dựa trên sức mạnh của công nghệ.</p>
                <br>
                <p>CÔNG TY TNHH NHÀ TRỌ TỐT - Địa chỉ: Hà Nội </p>
                <p>Email: gnuh.naut.vn@gmail.com - Đường dây nóng: 0976 62 17 01</p>
                </div>
                <div class="col-md-4 col-sm-6 m-0 p-1">
                <ul class="text-left list-nostyle">
                    <li class="my-2">HỖ TRỢ KHÁCH HÀNG</li>
                    <li class="my-1"><a href="#">Trung tâm trợ giúp</a></li>
                    <li class="my-1"><a href="/rule">Quy định cần biết</a></li>
                </ul>
                </div>
            </div>
            <div class="row m-0 p-0 pt-4 border-top text-left">
                <div class="col-md-6 col-sm-12 px-5">
                    <h5>Liên hệ</h5>
                    <div class="text-left list-nostyle d-flex flex-row">
                        <div><a href="#"><img  class="w-50" src="/images/facebook.png" alt=""></a></div>    
                        <div><a href="#"><img class="w-50" src="/images/google.png" alt=""></a></div>
                        <div><a href="#"><img class="w-50" src="/images/skype.png" alt=""></a></div>   
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 px-5">
                    <h5>Chứng nhận</h5>
                    <div class="text-left d-flex flex-row py-2">
                        <div class="mt-1 ml-1"><img  class="w-100" src="/images/cerfiticate.png" alt=""></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    @if(auth()->check())
    <script>
        var authuser = @JSON(auth()->user())
    </script>
    @endif
    <script>
        function change(){
            if(document.getElementById("keyword").value != null){
                $("#keyword").keyup(function(event){
                    if(event.keyCode == 13){
                        search();
                    }
                });
            }
        };
        function search()
        {
            var keyword;
            keyword = document.getElementById("keyword").value;
            window.location = '/search/' + encodeURIComponent(keyword);
        }
    </script>
</body>
</html>
