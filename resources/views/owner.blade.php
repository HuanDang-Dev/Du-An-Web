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
            .text-font {
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div class="admin">
            <div class="navbar-side px-2">
                <h2 class="pl-3">Owner</h2>

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

            <div class="container-fluid-full px-3 pt-3">
                <div class="row-fluid">
                        <div class="row-fluid sortable">
                                <div class="box-header">
                                    <h4><i class="halflings-icon white user"></i><span class="break"></span>Bài đăng</h4>
                                </div>
                                <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                        <thead>
                                            <tr>
                                                <th>Tên bài đăng</th>
                                                <th>Ngày đăng</th>
                                                <th>Chủ trọ</th>
                                                <th>Trạng thái</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>title</td>
                                                <td class="center">date</td>
                                                <td class="center">name Owner</td>
                                                <td class="center">
                                                    <div class=" d-flex flex-wrap w-auto">
                                                        <div class="label label-success m-1">Like: </div>
                                                        <div class="label label-success m-1">Rating: </div>
                                                    </div>
                                                    <!-- <div class=" d-flex flex-wrap w-auto" v-else>
                                                        <div class="label label-important  m-1">Like: </div>
                                                        <div class="label label-important m-1">Rating: <span v-for="item in ad.rating" :key="item.id"><i class="fas fa-star"></i></span></div>
                                                        <div class="label label-important m-1">Đã thuê</div>
                                                    </div> -->
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success py-1 px-2 my-1" href="#">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info py-1 pl-2 pr-1 my-1" href="#">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger py-1 px-2 my-1" href="#">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <!-- <button class="btn btn-danger py-1 px-2 my-1" href="#" v-on:click="removeElementAdmin(i)">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <footer>
                <p>
                    <span style="text-align:left;float:left"></span>
                </p>
            </footer>
        </div>
    </body>
</html>
