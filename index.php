<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beautiful Bootstrap Navbar with Menu Icons</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background: #eeeeee;
            font-family: 'Varela Round', sans-serif;
        }

        .form-inline {
            display: inline-block;
        }

        .navbar-header.col {
            padding: 0 !important;
        }

        .navbar {
            color: #fff;
            background: #222222;
            padding: 5px 16px;
            border-radius: 0;
            border: none;
            box-shadow: 0 0 4px rgba(0, 0, 0, .1);
        }

        .navbar img {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin-right: 10px;
        }

        .navbar .navbar-brand {
            color: #efe5ff;
            padding-left: 0;
            padding-right: 50px;
            font-size: 24px;
        }

        .navbar .navbar-brand:hover, .navbar .navbar-brand:focus {
            color: #fff;
        }

        .navbar .navbar-brand i {
            font-size: 25px;
            margin-right: 5px;
        }

        .navbar .nav-item span {
            position: relative;
            top: 3px;
        }

        .navbar .nav > li a {
            color: #efe5ff;
            padding: 8px 15px;
            font-size: 14px;
        }

        .navbar .nav > li a:hover, .navbar .nav > li a:focus {
            color: #fff;
            text-shadow: 0 0 4px rgba(255, 255, 255, 0.3);
        }

        .navbar .nav > li > a > i {
            display: block;
            text-align: center;
        }

        .navbar .dropdown-item i {
            font-size: 16px;
            min-width: 22px;
        }

        .navbar .dropdown-item .material-icons {
            font-size: 21px;
            line-height: 16px;
            vertical-align: middle;
            margin-top: -2px;
        }

        .navbar .nav-item.open > a, .navbar .nav-item.open > a:hover, .navbar .nav-item.open > a:focus {
            color: #fff;
            background: none !important;
        }

        .navbar .dropdown-menu {
            border-radius: 1px;
            border-color: #e5e5e5;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }

        .navbar .dropdown-menu li a {
            color: #777 !important;
            padding: 8px 20px;
            line-height: normal;
        }

        .navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:focus {
            color: #333 !important;
            background: transparent !important;
        }

        .navbar .nav .active a, .navbar .nav .active a:hover, .navbar .nav .active a:focus {
            color: #fff;
            text-shadow: 0 0 4px rgba(255, 255, 255, 0.2);
            background: transparent !important;
        }

        .navbar .nav .user-action {
            padding: 9px 15px;
        }

        .navbar .navbar-toggle {
            border-color: #fff;
        }

        .navbar .navbar-toggle .icon-bar {
            background: #fff;
        }

        .navbar .navbar-toggle:focus, .navbar .navbar-toggle:hover {
            background: transparent;
        }

        .navbar .navbar-nav .open .dropdown-menu {
            background: #faf7fd;
            border-radius: 1px;
            border-color: #faf7fd;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }

        .navbar .divider {
            background-color: #e9ecef !important;
        }

    </style>
    <style type="text/css">
        body {
            background: #eeeeee;
            font-family: 'Varela Round', sans-serif;
        }

        .form-inline {
            display: inline-block;
        }

        .navbar-header.col {
            padding: 0 !important;
        }

        .navbar {
            color: #fff;
            background: #222222;
            padding: 5px 16px;
            border-radius: 0;
            border: none;
            box-shadow: 0 0 4px rgba(0, 0, 0, .1);
        }

        .navbar img {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin-right: 10px;
        }

        .navbar .navbar-brand {
            color: #efe5ff;
            padding-left: 0;
            padding-right: 50px;
            font-size: 24px;
        }

        .navbar .navbar-brand:hover, .navbar .navbar-brand:focus {
            color: #fff;
        }

        .navbar .navbar-brand i {
            font-size: 25px;
            margin-right: 5px;
        }

        .navbar .nav-item span {
            position: relative;
            top: 3px;
        }

        .navbar .nav > li a {
            color: #efe5ff;
            padding: 8px 15px;
            font-size: 14px;
        }

        .navbar .nav > li a:hover, .navbar .nav > li a:focus {
            color: #fff;
            text-shadow: 0 0 4px rgba(255, 255, 255, 0.3);
        }

        .navbar .nav > li > a > i {
            display: block;
            text-align: center;
        }

        .navbar .dropdown-item i {
            font-size: 16px;
            min-width: 22px;
        }

        .navbar .dropdown-item .material-icons {
            font-size: 21px;
            line-height: 16px;
            vertical-align: middle;
            margin-top: -2px;
        }

        .navbar .nav-item.open > a, .navbar .nav-item.open > a:hover, .navbar .nav-item.open > a:focus {
            color: #fff;
            background: none !important;
        }

        .navbar .dropdown-menu {
            border-radius: 1px;
            border-color: #e5e5e5;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }

        .navbar .dropdown-menu li a {
            color: #777 !important;
            padding: 8px 20px;
            line-height: normal;
        }

        .navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:focus {
            color: #333 !important;
            background: transparent !important;
        }

        .navbar .nav .active a, .navbar .nav .active a:hover, .navbar .nav .active a:focus {
            color: #fff;
            text-shadow: 0 0 4px rgba(255, 255, 255, 0.2);
            background: transparent !important;
        }

        .navbar .nav .user-action {
            padding: 9px 15px;
        }

        .navbar .navbar-toggle {
            border-color: #fff;
        }

        .navbar .navbar-toggle .icon-bar {
            background: #fff;
        }

        .navbar .navbar-toggle:focus, .navbar .navbar-toggle:hover {
            background: transparent;
        }

        .navbar .navbar-nav .open .dropdown-menu {
            background: #faf7fd;
            border-radius: 1px;
            border-color: #faf7fd;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }

        .navbar .divider {
            background-color: #e9ecef !important;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-expand-xl navbar-dark">
    <div class="navbar-header d-flex col">
        <a class="navbar-brand" href="#"><i class="fa fa-cube"> Project</i>Elemental<b>Fighter</b></a>
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
                class="navbar-toggle navbar-toggler ml-auto">
            <span class="navbar-toggler-icon"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

        <ul class="nav navbar-nav navbar-right ml-auto">
            <li class="nav-item active"><a href="#" class="nav-link"><i class="fa fa-home"></i><span>Home</span></a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-users"></i><span>Charakter</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-gears"></i><span>Training</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i><span>Nachrichten</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"> Testname <b
                            class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profil</a></li>
                    <li><a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Einstellungen</a></li>
                    <li class="divider dropdown-divider"></li>
                    <li><a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>                                                        