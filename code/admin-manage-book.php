<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    if(checkSession()){
?>

    <!--/#header-->
    <div class="container" id="book_name_label"> 
        <form name="search_book" method="post" action="controller/search_issued_books.php" onsubmit="return submitForm();">
            <div class="input-group col-xs-5 col-xs-offset-3" id="book_name_label">
                <input type="text" class="textbox_size form-control input-lg" id="search" placeholder="Search book by Bookid / Memberid" />
                <span class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit" >
                        <i class="glyphicon glyphicon-search text-info"></i>
                    </button>
                </span>
            </div>
        </form>
        <div class="books_table" id="load_manage_books">
            <h2>Manage issued books</h2>
        </div>
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
                    books = jQuery.parseJSON(response);                     
                    viewData(books,parent);
                    paginationView(books,5);
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
        $(document).on("click",".btn",function(){
            var $row = $(this).closest("tr"),       
            $tds = $row.find("td"); 
            var book_id = ($tds[0].textContent); 
            console.log(book_id);
            $.ajax({             
                url: 'controller/return_books.php',
                type: 'post',
                data: { book_id: book_id },
                success: function(response){
                    if(response == 'failed'){
                        var confirm_response = confirm("You have penality to be paid. Do you want to pay now?");
                        if(confirm_response){
                            $.ajax({             
                                url: 'controller/return_money_paid.php',
                                type: 'post',
                                data:{ book_id: book_id },
                                success: function(response){ 
                                    window.location.href='admin-manage-book.php';  
                                },
                                error: function(xhr, desc, err){
                                    console.log(desc);
                                }
                            });  
                        }else{

                        }
                        //console.log(response);
                        //window.location.href = "admin-manage-book.php";
                    }else{
                        window.location.href='admin-manage-book.php';
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
