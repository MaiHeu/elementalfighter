<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Elemental Fighter</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?php


    include("DatabaseHandler.php");

    if (isset($_COOKIE['ID']) == FALSE) {
        ?>
        <script> window.open("login.php", "_self"); </script>
        <?php
    }

    if (isset($_GET['text'])) {

    }

    ?>

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
            <li class="nav-item active"><a href="home.php" target="main_frame" class="nav-link"><i class="fa fa-home"></i><span>Home</span></a>
            </li>
            <li class="nav-item"><a href="charaktercenter.php" target="main_frame" class="nav-link"><i
                            class="fa fa-users"></i><span>Charakter</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-gears"></i><span>Training</span></a></li>
            <li class="nav-item"><a href="messages.php" target="main_frame" class="nav-link"><i
                            class="fa fa-envelope"></i><span>Nachrichten</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown"
                   class="nav-link dropdown-toggle user-action"> <?php echo "$_COOKIE[NAME]"; ?> <b
                            class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="benutzerloeschen.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profil löschen</a>
                    </li>
                    <li><a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Einstellungen</a></li>
                    <li class="divider dropdown-divider"></li>
                    <li><a href="login.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<iframe name="main_frame" src="home.php" height=850 width=100% style="border:0px"></iframe>

</body>

<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #4b4e6d;
        color: white;
        text-align: center;
    }
</style>

<div class="footer">
    <p>© 2019 - M&M Productions</p>
</div>

</html>                                                        