<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    if(checkSession()){
?>  
    <!--/#header-->
    <div class="container" id="book_name_label"> 
        <div id="load_members" >
             <h2>New Membership Requests</h2>
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
                  <h4 class="modal-title">Reject Membership Request</h4>
                </div>
                <div class="modal-body">
                    <span id="confirm-text" >Are you sure to reject the membership request?</span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default YES" data-dismiss="modal">Yes</button>
                  <button type="button" class="btn btn-default NO" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="button" data-toggle="modal" data-target="#help"></a>
        
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
                    //$("#button").click();
                    $(".NO").hide();
                    $('.modal-title').text("Approve membership" );
                    $('.YES').text("OK");
                    $('#confirm-text').text("Membership approved successfully" );
                    $(document).on("click",".YES",function(){                
                        window.location = 'admin-accept-membership.php';
                    });
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
            $(".NO").show();
            $('.YES').text("YES");
            $('.modal-title').text("Reject Membership Request");
            $('#confirm-text').text("Are you sure to reject the membership request" );
            $(document).on("click",".YES",function(){
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
        });
    </script>
</body>
</html>
<?php 
}else {
    header("Location: login.php");
}

?> 