<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    if(checkSession()){
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
    <div class="modal fade" id="help" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Reject membership renewal request</h4>
                    </div>
                    <div class="modal-body">
                        <span id="confirm-text" >Are you sure to reject the membership renewal</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default YES" data-dismiss="modal">Yes</button>
                      <button type="button" class="btn btn-default NO" data-dismiss="modal">NO</button>
                    </div>
                </div>  
            </div>

        </div>
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
                    //console.log(response);
                    books = jQuery.parseJSON(response);                     
                    viewData(books,parent);
                    paginationView(books,10);   
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
            $memId = $tds[0].textContent;
            $msId = $tds[3].textContent;
            $(this).val('Approved');
                $.ajax({             
                url: 'controller/admin_approve_membership_renewal.php',
                type: 'post',
                data:{ msId: $msId, memId: $memId },
                success: function(response){                        
                    console.log(response);
                    //message.textContent = "MemberID: "+ $memId+ " request is Approved";
                    window.location.href = 'admin-membership-renewal.php';                                       
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            }); 
        });
        $(document).on("click",".Reject",function(){
            //var a = confirm("Are you sure to reject");
                var parent = document.getElementById('message')
                var $row = $(this).closest("tr"),       
                $tds = $row.find("td");       
                $memId = $tds[0].textContent;
                $(this).val('Rejected');
                 $(this).css({
                  background: '#D9534F'
                });
                $('#confirm-text').text("Are you sure to delete the book from library" );
                $(document).on("click",".YES",function(){ 
                    $.ajax({             
                        url: 'controller/admin_reject_membership_renewal.php',
                        type: 'post',
                        data:{ memId: $memId },
                        success: function(response){                        
                            console.log(response);
                            //message.textContent = "MemberID :"+ $memId+ " request is rejected";
                            window.location.href = 'admin-membership-renewal.php';                                       
                        },
                        error: function(xhr, desc, err){
                            console.log(desc);
                        }
                    });                
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