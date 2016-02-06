<?php include ("header-guest.php");?> 
    <!--/#header-->
 <div class="container">
    <h2>Forgot Password</h2>
    <div id = "myTabContent" class = "tab-content">
        <form name="login" method="post" action="" onsubmit="return submitForm();" id="emailform">
            <div class="form-group" id="admin_email" >
                <label for="exampleInputEmail1">Enter registered Email ID</label>
                <input type="text" class="form-control" id="email" placeholder="Email" >
                <span></span>
            </div>
            <input type="submit" id = "resetpassword" value="Reset password" class="btn btn-info" />
        </form>
        <form name="changepassword" method="post" action="" onsubmit="return submitForm1()" id="changepassword">
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
            <br/><br/>
            <div id="acknowledge" style="font-size: 25px; color:green"></div>
            <br/>
            <a href="login.php" id="goto" style="font-size: 20
            px; color:red"></a>
        </form>
        <!--/#forgot password form -->
    </div>
 <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    <script>
    $( "#changepassword" ).hide();
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
                    url: 'controller/validateForgotPassword.php',
                    type: $('form').attr('method'),
                    data: { email:$('#email').val()},
                    success: function(response){
                        console.log(response);
                        if(response == 1){
                            error = document.getElementById('admin_email');
                            $('.form-group span').text('');
                            error.childNodes[3].disabled = true;
                            $( "#resetpassword" ).hide();
                            $( "#changepassword" ).show();
                        }else {
                            body = document.getElementById('admin_email');
                            writeError('Email not registered',body);
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
        var submitForm1 = function() {
            var validation_message,success=0;
            //var type = $('.nav-tabs li.active a').text().toLowerCase().trim();
                login_details = { email:$('#email').val()};
                login = [{ type : 'password' , value: $('#password').val() , errorMessage:'Password is required' },
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
            if(submitToServer(validation_message) && validatePassword($('#password').val(),$('#repassword').val()) == 1){
                $.ajax({             
                    url: 'controller/update-password.php',
                    type: 'post',
                    data: {email: $('#email').val(), password: $('#password').val()},
                    success: function(response){
                        console.log(response);
                        $('#acknowledge').text("Your password has been changed sucessfully");
                        $('#goto').text("Login")
                        //window.location.href = 'login.php';
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