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
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet" />

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png" />
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
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
                        <li><a href="admin-add-book.html">Add New Book</a></li>
                        <li class="dropdown"><a>Issue<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li class="active"><a href="admin-issue-book.html">Issue New Book</a></li>
                                <li><a href="admin-manage-book.html">Manage Issued Books</a></li>
                            </ul>
                        </li>    
                        <li class="dropdown "> <a>Requests<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="admin-new-book.html">New Books</a></li>
                                <li><a href="admin-accept-membership.html">New Memberships</a></li>
                                <li><a href="admin-book-renewal.html">Renew Books</a></li>
                                <li><a href="admin-membership-renewal.html">Renew Memberships</a></li>
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
        <h2>Issue a book</h2>
        <form name="login" method="post" action="controller/submit_issue_book.php" onsubmit="return submitForm();">
            <div class="form-group" id="book_id_label">
                <label >Book Id</label>
                <input type="number" class="form-control" id="book_id" />
                <span></span>
            </div>
            <div class="form-group" id="mem_id_label">
                <label >Member Id</label>
                <input type="number" class="form-control" id="mem_id" />
                <span></span>
            </div>
            <div class="form-group" id="issue_date_label">
                <label >Issue date</label>
                <input type="date" class="form-control" id="issue_date" />
                <span></span>
            </div>
            <div class="form-group" id="return_date_label">
                <label >Return date</label>
                <input type="date" class="form-control" id="return_date" />
                <span></span>
            </div>
            <button type="submit" class="btn btn-default btn-lg btn-info">Submit</button>
            <a href="our-library.html" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
    </div>
    <footer>
        <div class="container">
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>&copy; UXReactor. All Rights Reserved.</p>
                    <p>Designed and Developed by <a target="_blank" href="http://www.uxreactor.com">UXReactor Coding Batch 01</a></p>
                </div>
            </div>
        </div>
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
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/script.js"></script>  
    <script type="text/javascript">
        $(function () {
                      //$('#myTab li:eq(1) a').tab('show');
        });

        var submitForm = function() {
            var validation_message;
            var add_book = [{ type : 'text' , value: $('#book_id').val() , errorMessage:'Book_id is required' }, 
            { type:'text' , value: $('#mem_id').val() , errorMessage:'Member id is required' },
            { type:'date' , value: $('#issue_date').val() , errorMessage:'Issue date is required' },
            { type:'date' , value: $('#return_date').val() , errorMessage:'Return date is required' }];    
            validation_message = validateForm (add_book );  
            var issue_book = {book_id: $('#book_id').val(),mem_id: $('#mem_id').val(),issue_date: $('#issue_date').val(),return_date: $('#return_date').val()};
             if(submitToServer(validation_message)){
                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: issue_book,
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            }else{
                body = document.getElementById('book_id_label');
                writeError(validation_message[0],body);
                body = document.getElementById('mem_id_label');
                writeError(validation_message[1],body);
                body = document.getElementById('issue_date_label');
                writeError(validation_message[2],body);
                body = document.getElementById('return_date_label');
                writeError(validation_message[3],body);
                return false;
            }
            return false;
        }
    </script> 
</body>
</html>
