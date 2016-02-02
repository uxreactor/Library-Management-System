<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container" id="book_name_label"> 
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
