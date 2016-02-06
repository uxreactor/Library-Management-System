<?php include ("header-guest.php");?> 
    <!--/#header-->
 <div class="container">
    <div id = "myTabContent" class = "tab-content">
        <form name="login" method="post" action="" onsubmit="return submitForm()">
            <div class="form-group" id="admin_password1" >
                <label for="exampleInputEmail1">Enter password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter new password" >
                <span></span>
            </div>
            <div class="form-group" id="admin_password2" >
                <label for="exampleInputEmail1">Re-enter password</label>
                <input type="password" class="form-control" id="repassword" placeholder="Re-enter password" >
                <span></span>
            </div>
            <input type="submit" value="Change password" class="btn btn-info" />
        </form>
        <!--/#forgot password form -->
    </div>
 <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    <script>
        var submitForm = function() {
            var validation_message,success=0;
            //var type = $('.nav-tabs li.active a').text().toLowerCase().trim();
                login_details = { email:$('#email').val()};
                login = [{ type : 'password' , value: $('#password').val() , errorMessage:'password is required' },
                        { type : 'password' , value: $('#repassword').val() , errorMessage:'Re-enter password' }];

            validation_message = validateForm(login);
            function validatePassword(a,b) {
                if(a == b){
                    return 1;
                }else {
                    success = 1;
                    return 0;
                }
            }
            //console.log(login_details);
            if(submitToServer(validation_message) && validatePassword($('#password').val(),$('#repassword').val())){
                $.ajax({             
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: login_details,
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            } 
            else{
                if (success == 1) {
                    body = document.getElementById('admin_password2');
                    writeError('Please check password',body);
                }else {
                    body = document.getElementById('admin_password1');
                    writeError(validation_message[0],body);
                    body = document.getElementById('admin_password2');
                    writeError(validation_message[1],body);
                }

            }
            return false;
        }
        RemoveInlineError();
    </script>