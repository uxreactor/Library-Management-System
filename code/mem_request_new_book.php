<?php 
    include ("header-member.php");
    require 'controller/session.php';
    if(checkSession()){
        $mem_id=checkSession();
?>

    <!--/#header-->
    <div class="container">
        <h2>New Book Request</h2>
        <form name="add_book" method="post" action="controller/validate_request_new-book.php" onsubmit="return submitForm();">
            <div class="form-group" id="book_name_label">
                <label >Book name</label>
                <input type="text" class="form-control" id="book_name"/>
                <span></span>
            </div>
            <div class="form-group" id="author_name_label">
                <label >Author name</label>
                <input type="text" class="form-control" id="author_name"/>
                <span></span>
            </div>
            <button type="submit" class="btn btn-info btn-lg" >Submit</button>
            <a href="member.php" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
        <!--/#issue book form -->
        <div class="modal fade" id="help" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Requesting New Book</h4>
                    </div>
                    <div class="modal-body">
                        <span id="confirm-text">New Book request has sent Successfully</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default OK" data-dismiss="modal">OK</button>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <a href="#" id="button" data-toggle="modal" data-target="#help"></a>
    <?php include ("footer.php");?>  
    <!--/#footer-->

    <?php include ("javascript-links.php");?> 
    <script>
        
//$_SESSION["user"]=23
        var submitForm = function() {
            var validation_message;
            add_book = [
                    { type : 'text' , value: $('#book_name').val() , errorMessage:'Book name is required' },
                    { type:'text' , value: $('#author_name').val() , errorMessage:'Author name is required' }
            ];
            
            
            new_book_details = {
                mem_id :<?php echo $mem_id ?>,
                book_name:$('#book_name').val(),
                author_name:$('#author_name').val()
            };  
            validation_message = validateForm (add_book );

            if(submitToServer(validation_message)){
                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: new_book_details,
                    success: function(response){
                        console.log(response);
                        //window.location = 'member.php';
                        $("#button").click();
                        $('#confirm-text').text("Request New book has sent Successfully" );
                        $(document).on("click",".OK",function(){                
                            window.location = 'member.php';
                        });
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            } 
            else{
                body = document.getElementById('book_name_label');
                writeError(validation_message[0],body);
                body = document.getElementById('author_name_label');
                writeError(validation_message[1],body);
            }
            return false;
        }
        RemoveInlineError(); 

    </script>  
</body>
</html>
<?php 
}else {
    header("Location: login.php");
}

?>
