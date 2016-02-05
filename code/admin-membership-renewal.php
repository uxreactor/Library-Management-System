<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container" id="book_name_label"> 
        <div id="load_mem_request">
            <h2>Membership renewal requests</h2>
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
        var parent = document.getElementById('load_mem_request');
        var books;
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_mem_request.php',
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
        $(document).on("click",".Approve",function(){
            var $row = $(this).closest("tr"),       
            $tds = $row.find("td");       
            $bookId = $tds[0].textContent;
            $memId = $tds[1].textContent;
            $(this).val('Approved');
            $(this).css({
              background: '#449D44'
            });
                $.ajax({             
                url: 'controller/admin_approve_membership_renewal.php',
                type: 'post',
                data:{ bookId: $bookId, memId: $memId },
                success: function(response){                        
                    console.log(response);
                    message.textContent = "MemberID: "+ $memId+ " request is Approved";
                    window.location.href = 'admin-membership-renewal.php';                                       
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            }); 
        });
        /*$(document).on("click",".Reject",function(){
            var a = confirm("Are you sure to delete");
            alert(a);
            if(a){
                var parent = document.getElementById('message')
                var $row = $(this).closest("tr"),       
                $tds = $row.find("td");       
                $bookId = $tds[0].textContent;
                $memId = $tds[1].textContent;
                $(this).val('Rejected');
                 $(this).css({
                  background: '#D9534F'
                });
                $.ajax({             
                    url: 'controller/submit_reject_extension.php',
                    type: 'post',
                    data:{ bookId: $bookId, memId: $memId },
                    success: function(response){                        
                        console.log(response);
                        message.textContent = "MemberID :"+ $memId+ " request is rejected";
                        window.location.href = 'admin-book-renewal.php';                                       
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                }); */
            }
        });
    </script>       
</body>
</html>
