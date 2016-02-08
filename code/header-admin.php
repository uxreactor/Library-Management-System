<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Librarian Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/lightbox.css" rel="stylesheet" />  
    <link href="css/animate.min.css" rel="stylesheet" /> 
	<link href="css/main.css" rel="stylesheet" />
	<link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png" />
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head><!--/head-->
<body>
	<header id="header">      
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                   <a class="navbar-brand" href="our-library.php" style="margin-top:10px;">
                        <h1>UXR LIBRARY</h1>
                    </a>  
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php include ("active-menu-item.php");?>
                        <li class="<?php echo ($page_name=='our-library.php')?'active':'';?>"><a href="our-library.php">Our library</a></li>
                        <li class="<?php echo ($page_name=='admin-add-book.php')?'active':'';?>"><a href="admin-add-book.php">Add New Book</a></li>
                        <li class="dropdown "><a>Issue<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li class="<?php echo ($page_name=='admin-issue-book.php')?'active':'';?>"><a href="admin-issue-book.php">Issue New Book</a></li>
                                <li class="<?php echo ($page_name=='admin-manage-book.php')?'active':'';?>"><a href="admin-manage-book.php">Manage Issued Books</a></li>
                            </ul>
                        </li>    
                        <li class="dropdown <?php echo ($page_name=='admin-new-book.php')?'active':'';?>" > <a>Requests<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li class="<?php echo ($page_name=='admin-new-book.php')?'active':'';?>"><a href="admin-new-book.php">New Books</a></li>
                                <li class="<?php echo ($page_name=='admin-accept-membership.php')?'active':'';?>"><a href="admin-accept-membership.php">New Memberships</a></li>
                                <li class="<?php echo ($page_name=='admin-book-renewal.php')?'active':'';?>"><a href="admin-book-renewal.php">Renew Books</a></li>
                                <li class="<?php echo ($page_name=='admin-membership-renewal.php')?'active':'';?>"><a href="admin-membership-renewal.php">Renew Memberships</a></li>
                            </ul>
                        </li>                         
                        <li><a href="controller/logout.php">Logout</a></li>                    
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->