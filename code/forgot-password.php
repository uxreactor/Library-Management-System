<?php include ("header-guest.php");?> 
    <!--/#header-->
 <div class="container">
    <div id = "myTabContent" class = "tab-content">
        <form name="login" method="post" action="controller/validateForgotPassword.php" onsubmit="return submitForm();">
            <div class="form-group" id="admin_email" >
                <label for="exampleInputEmail1">Enter registered Email ID</label>
                <input type="text" class="form-control" id="email" placeholder="Email" >
                <span></span>
            </div>
            <input type="submit" value="Send new password" class="btn btn-info" />
        </form>
        <!--/#forgot password form -->
    </div>
 <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    <script>
        var submitForm = function() {
            var validation_message;
            //var type = $('.nav-tabs li.active a').text().toLowerCase().trim();
                login_details = { email:$('#email').val()};
                login = [{ type : 'email' , value: $('#email').val() , errorMessage:'Email is required' }];

            validation_message = validateForm(login);          
            //console.log(login_details);
            if(submitToServer(validation_message)){
                //alert(login_details);
                $.ajax({             
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: { email:$('#email').val()},
                    success: function(response){
                        console.log(response);
                        if(response){
                            window.location.href = 'change-password.php';
                        }
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            } 
            else{
                    body = document.getElementById('admin_email');
                    writeError(validation_message[0],body);
            }
            return false;
        }
    </script>