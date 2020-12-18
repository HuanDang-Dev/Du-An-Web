<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>Web Nhà Trọ</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Electrolize&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            .post {
                background-color: initial;
                text-align: left;
                font-size: 18px;
            }
            .navbar-side {
                display: flex;
                position: relative;
                flex-wrap: wrap;
                align-items: center;
                justify-content: space-between;
                background-color: #e3e3e3;
                padding: .5rem 1rem;
            }
            .nav.pull-right {
                float: right;
                margin-right: 0;
            }
            .box {
                border: 2px solid #578EBE;
                background: #fff !important;
                margin-bottom: 28px;
            }
            .box-header {
                line-height: 16px;
                padding: 10px;
                background: #578EBE;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
                overflow: hidden;
            }
            .dropdown-menu {
                border-top: 5px solid transparent;
                border-radius: 2px !important;
                position: absolute;
                top: 100%;
                left: -10px !important;
                z-index: 1000;
                display: none;
                float: left;
                min-width: 160px;
                max-width: 300px;
                padding: 0px 0;
                margin: 0px 0 0 0;
                list-style: none;
                text-shadow: none;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
            }
            .dropdown-menu:before {
                position: absolute;
                top: -7px;
                left: 9px;
                display: inline-block;
                border-right: 7px solid transparent;
                border-bottom: 7px solid #ccc;
                border-left: 7px solid transparent;
                border-bottom-color: #313131;
                content: '';
                right: 15px;
                left: auto;
            }

            .dropdown-menu-title {
                background: rgb(49, 49, 49);
                color: #fff;
                padding: 8px 0px;
                position: relative;
            }
            .label, .badge {
                text-shadow: none;
                font-family: 'Open Sans', sans-serif;
                font-weight: 600;
                font-size: 12px;
                padding: 3px 6px;
                width: auto;
            }
            .label-success{
                background: #43B5AD !important;
                border-color: #43B5AD !important;
                color: #fff;
            }
            .label-important{
                background: #E25A59 !important;
                border-color: #E25A59 !important;
                color: #fff;
            }
            .btn-admin {
                border: none;
                background-color: initial;
                font-size: 16px;
            }
            .btn-admin:not(:disabled):not(.disabled) {
                cursor: pointer;
            }
            .btn-admin.focus, .btn-admin:focus {
                outline: 0;
            }

            .btn-admin:hover {
                color: #212529;
                text-decoration: none;
            }
                .login__btn{
                background: linear-gradient(to right, #6190e9, #4236f0);
                box-shadow: 0px 11px 34px -10px #6190e9;
                padding:1rem;
                border:none;
                outline:none;
                border-radius: 100px;
                color:white;
                font-weight: bold;
                display:flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                }
                .btn-register {
                color: inherit;
                text-decoration: none;
                }
                button:focus {
                outline: none;
                }
                a:hover {
                color: inherit !important;
                text-decoration: none !important;
                }
                label {
                    font-size: 20px;
                }
                input, textarea {
                    border: 0.5px solid #cccccc;
                    border-radius: 10px;
                }
            .text-font {
                font-size: 20px;
            }
            .border-box {
                border: 1px solid #578EBE;
            }
        </style>
    </head>
    <body>
        <div class="post">
            <div class="navbar-side px-2">
                <h2 class="pl-3">Đăng tin</h2>

                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">
                        <li class="dropdown p-2">
                            <button class="btn-admin dropdown-toggle ml-3 p-2 text-font" data-toggle="dropdown" href="#">
                                Huan Dang
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                    <span class="pl-3">Cài đặt tài khoản</span>
                                </li>
                                <li><a class="pl-3 text-dark" href="/login"><i class="halflings-icon off"></i>Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="container-fluid-full mx-5 my-3 align-center">
                
                <div class="border-box">
                    <div class="box-header">
                        <h4><i class="halflings-icon white user"></i><span class="break"></span>Bài đăng</h4>
                    </div>
                    <div class="d-flex flex-column mx-5 my-1">
                        <div class="d-flex flex-column m-4">
                            <form action="http://localhost/process_file_upload.php" method="POST" enctype="multipart/form-data">
                                Chọn file để upload:
                                <input type="file" name="upload_file_input" id="upload_file_input">
                                    <br>
                                    <input type="submit" value="Upload Image" name="submit">
                            </form>
                        </div>
                        <div class="d-flex flex-column m-4">
                            <label class="" for="">Tiêu đề</label>
                            <input class="p-2" type="text">
                        </div>
                        <div class="d-flex flex-column m-4">
                            <label class="" for="">Giá tiền</label>
                            <input class="p-2" type="text">
                        </div>
                        <div class="d-flex flex-column m-4">
                            <label class="" for="">Diện tích</label>
                            <input class="p-2" type="text">
                        </div>
                        <div class="d-flex flex-column m-4">
                            <label class="" for="">Mô tả nhà trọ</label>
                            <textarea name="" id="" cols="30" rows="10">        Vị trí địa lý:  

        Gần trường đại học / cao đẳng:  

        Điều kiện cơ sở vật chất:
                        </textarea>
                        </div>
                        <div class="d-flex px-4 py-3 mb-2">
                            <button class="login__btn mx-3 w-25"><a class="btn-register" href="/">Đăng Tin</a></button>
                            <button class="login__btn mx-3 w-25"><a class="btn-register" href="/">Hủy</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
