<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container"> 
        <div id="load-renew-book">
            <h2>Request for due date extension</h2>
            <center><span id="message"></span></center>
        </div> 

    </div>
    <!--/#table-->
    <center>
        <ul class="pagination" id="pagination1">
        </ul>
    </center>



    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    </script>
    <script type="text/javascript">
        var parent = document.getElementById('load-renew-book');
        var books;
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_renew_books.php',
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
        $(document).on("click",".Approve",function(){
            var $row = $(this).closest("tr"),       
            $tds = $row.find("td");       
            $bookId = $tds[0].textContent;
            $memId = $tds[1].textContent;
            $.ajax({             
                url: 'controller/submit_approve_extension.php',
                type: 'post',
                data:{ bookId: $bookId, memId: $memId },
                success: function(response){                        
                    console.log(response);
                    message.textContent = "MemberID: "+ $memId+ "request is Approved";
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            }); 
        });
        $(document).on("click",".Reject",function(){
            var parent = document.getElementById('message')
            var $row = $(this).closest("tr"),       
            $tds = $row.find("td");       
            $bookId = $tds[0].textContent;
            $memId = $tds[1].textContent;
            $.ajax({             
                url: 'controller/submit_reject_extension.php',
                type: 'post',
                data:{ bookId: $bookId, memId: $memId },
                success: function(response){                        
                    console.log(response);
                    message.textContent = "MemberID :"+ $memId+ " request is rejected";
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            }); 
        });

        </script>    
</body> 
</html>
