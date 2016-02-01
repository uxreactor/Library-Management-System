<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container" id="book_name_label"> 
        <div id="load_manage_books">
            <h2>Manage issued books()</h2>
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
                    paginationView(books,2);
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
