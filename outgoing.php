<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 4/6/17
 * Time: 10:32 AM
 */

require_once 'session.php';
require_once 'account_name.php';
?>
<html lang = "eng">
<head>
    <meta charset =  "UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1" />
    <title>Report Management</title>
</head>
<body class = "alert-warning">
<nav class  = "navbar navbar-inverse">
    <div class = "container-fluid">
        <div class = "navbar-header">
            <a class = "navbar-brand">Report Management</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a><span class = "glyphicon glyphicon-user"></span> <?php echo $acc_name?></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class = "container-fluid">
    <ul class="nav nav-pills">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="account.php">Account</a></li>
        <!--        <li><a href="pos.php">POS</a></li>-->
        <!--        <li><a href="transaction.php">Transactions</a></li>-->
        <li><a href="incoming.php">Incoming</a></li>
        <li><a href="outgoing.php">Outgoing</a></li>
    </ul>
    <br />
    <div class = "col-md-12 well">
        <img src = "#"/>
    </div>
</div>
<footer class = "navbar navbar-fixed-bottom navbar-inverse">
    <label class = "pull-right">All rights reserved &copy; <?php echo date('Y', strtotime('+8 HOURS'))?> <a href = "http://www.impalapay.com">www.impalapay.com</a></label>
</footer>
</body>
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/script.js"></script>
</html>