<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?> 
    <!--/#header-->
    <div class="container" id= "book_name_label"> 
        <div id= "load_books">
            <h2>Requests for New Books</h2>
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
    <script type="text/javascript">
        var parent = document.getElementById('load_books');
        var books;
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_new_books.php',
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

        $(function() {
            postForm();
        });
    </script>    
</body>
</html>
