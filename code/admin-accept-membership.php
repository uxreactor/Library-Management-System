<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?> 
    <!--/#header-->
    <div class="container" id="book_name_label"> 
        <div id="load_members" >
             <h2>New membership requests</h3>
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
        var parent = document.getElementById('load_members');
        var books;
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_allmembers.php',
                type: 'post',
                success: function(response){                        
                    //console.log(response);
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

        $(document).on("click",".Approve",function(){
            var $row = $(this).closest("tr");
            $tds = $row.find("td"); 
            var email = {email:$tds[2].textContent}
            console.log(email);
            $.ajax({             
                url: 'controller/admin_approve_accept_membership.php',
                type: 'post',
                data: email,
                success: function(response){   
                    //console.log(response);
                    window.location.href = 'admin-accept-membership.php';                     
                },
                error: function(xhr, desc, err){
                    //console.log(desc);
                }
            });
        });
        $(document).on("click",".Reject",function(){
            var $row = $(this).closest("tr");
            $tds = $row.find("td"); 
            var email = {email:$tds[2].textContent}
            console.log(email);
            $.ajax({             
                url: 'controller/admin_reject_membership.php',
                type: 'post',
                data: email,
                success: function(response){   
                    //console.log(response);
                    window.location.href = 'admin-accept-membership.php';                     
                },
                error: function(xhr, desc, err){
                    //console.log(desc);
                }

            });
        });
    </script>
</body>
</html>
