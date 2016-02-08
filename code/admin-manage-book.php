<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    if(checkSession()){
?>

    <!--/#header-->
    <div class="container" id="book_name_label"> 
        <form name="search_book" method="post" action="controller/search_in_issued_books.php" onsubmit="return submitForm();">
            <div class="input-group col-xs-5 col-xs-offset-3" id="book_name_label">
                <input type="text" class="textbox_size form-control input-lg" id="search" placeholder="Search book by bookID / memberID" />
                <span class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit" >
                        <i class="glyphicon glyphicon-search text-info"></i>
                    </button>
                </span>
            </div>
        </form>
        <div class="books_table" id="load_manage_books">
            <h2>Manage Issued Books</h2>
        </div>
        <div class="modal fade" id="help" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Penalty Details</h4>
                    </div>
                    <div class="modal-body">
                        <span id="confirm-text" >You have penality to be paid. Do you want to pay now?</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default yes" data-dismiss="modal">Yes</button>
                      <button type="button" class="btn btn-default no" data-dismiss="modal">NO</button>
                    </div>
                </div>  
            </div>
        </div>
        <a href="#" id="button" data-toggle="modal" data-target="#help"></a>
    </div>
    <center>
        <ul class="pagination" id="pagination1">
        </ul>
    </center>
    <!--/#table-->
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    </script>
    <script type="text/javascript">
        var parent = document.getElementById('load_manage_books');
        var books;
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_manage_books.php',
                type: 'post',
                success: function(response){                        
                    console.log(response);
                    if(response) {
                        books = jQuery.parseJSON(response);                     
                        viewData(books,parent);
                        paginationView(books,10);    
                    }

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
        var submitForm = function() {
            var validation_message; 
            search_book_details = {
                search: $('#search').val().toLowerCase()
            };
            $('#pagination1').empty();
            $.ajax({
                url: $('form').attr('action'),
                type: $('form').attr('method'),
                data: search_book_details,
                success: function(response){
                    //console.log(response);
                    parent.removeChild(parent.childNodes[3]);
                    
                    if (response){
                        books = jQuery.parseJSON(response);  
                        viewData(books,parent); 
                        paginationView(books,10);    
                    }else{
                        results = document.createElement('h2');
                        results.className = "no_result";
                        results.innerText = "No results found";
                        parent.appendChild(results);
                    }
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            });         
            return false;
        }

        $(document).on("click",".Return",function(){
            var $row = $(this).closest("tr"),       
            $tds = $row.find("td"); 
            var book_id = $tds[0].textContent; 
            console.log(book_id);
            $.ajax({             
                url: 'controller/return_books.php',
                type: 'post',
                data: { book_id: book_id },
                success: function(response){
                    if($.isNumeric(response) && response != 0){
                        $(".no").show();
                        $('.yes').css("background-color","#fff");
                        $('.yes').text("YES");
                        $('.modal-title').text("Penalty Details");
                        $('#confirm-text').css('color', 'red');
                        $('#confirm-text').text("You have penality " + response + " Rs to be paid. Do you want to pay now?");
                        $(document).on("click",".yes",function(){
                            $.ajax({             
                                url: 'controller/return_money_paid.php',
                                type: 'post',
                                data:{ book_id: book_id },
                                success: function(response){
                                    $("#button").click();
                                    $(".no").hide();
                                    $('.modal-title').text("Book Return Status" );
                                    $('.yes').css("background-color","#5bc0de");
                                    $('.yes').text("OK");
                                    $('#confirm-text').css('color', 'green');
                                    $('#confirm-text').text("Book returned successfully" );
                                    $(document).on("click",".yes",function(){                
                                        window.location = 'admin-manage-book.php';
                                    });

                                    //window.location.href='admin-manage-book.php';  
                                },
                                error: function(xhr, desc, err){
                                    console.log(desc);
                                }
                            });  
                        });
                        $(document).on("click",".no",function(){                
                            window.location.href = 'admin-manage-book.php';
                        });
                        //console.log(response);
                        //window.location.href = "admin-manage-book.php";
                    }else{
                        $(".no").hide();
                        $('.modal-title').text("Book Return Status" );
                        $('.yes').css("background-color","#5bc0de");
                        $('.yes').text("OK");
                        $('#confirm-text').css('color', 'green');
                        var book_name = $tds[1].textContent;
                        $('#confirm-text').text(book_name+"Book returned successfully" );
                        $(document).on("click",".yes",function(){                
                            window.location = 'admin-manage-book.php';
                        });
                        //window.location.href='admin-manage-book.php';
                    }
                    
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            });  
        });
    </script>    
</body>
</html>
<?php 
}else {
    header("Location: login.php");
}

?> 
