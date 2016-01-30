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

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png" />
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

                   <a class="navbar-brand" href="index.html" style="margin-top:10px;">
                        <h1>UXR LIBRARY</h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="our-library.html">Our library</a></li>
                        <li><a href="add-book.html">Add New Book</a></li>
                        <li class="dropdown"><a>Issue<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="issue-book.html">Issue New Book</a></li>
                                <li><a href="manage-book.html">Manage Issued Books</a></li>
                            </ul>
                        </li>    
                        <li class="dropdown "> <a>Requests<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="new-book.html">New Books</a></li>
                                <li class="active"><a href="admin-accept-membership.html">New Memberships</a></li>
                                <li><a href="admin-book-renewal.html">Renew Books</a></li>
                                <li><a href="renew-membership.html">Renew Memberships</a></li>
                            </ul>
                        </li>                         
                        <li><a href="index.html ">Logout</a></li>                    
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->
    <div class="container"> 
        <div id="load_members">
             <h2>New membership requests</h3>
        </div>
        <!--table  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Mail ID</th>
                <th>Membership type</th>
                <th>Address</th>
                <th colspan="2">Actions</th>
              </tr>
            </thead>
        <tbody>
            <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="button" class="btn btn-info" value="Approve" /></td>
                <td><input type="button" class="btn btn-info" value="Reject" /></td>
            </tr>
        </tbody>
        </table>
    </div>
    <!--/#table-->
     <footer>
        <div class="container">
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>&copy; UXReactor. All Rights Reserved.</p>
                    <p>Designed and Developed by <a target="_blank" href="http://www.uxreactor.com">UXReactor Coding Batch 01</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
   <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
    </script>
    <script type="text/javascript">
            var parent = document.getElementById('load_members');
            function postForm() {
                $.ajax({             
                    url: 'controller/load_allmembers.php',
                    type: 'post',
                    success: function(response){                        
                        console.log(response);
                        obj = jQuery.parseJSON(response);
                        viewData(obj,parent);
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            }

            $("form#books").submit(function() {
                postForm();
                return false;
            });

            $(function() {
                postForm();
            });
        </script>
</body>
</html>
