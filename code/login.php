<?php include ("header-guest.php");?> 
    <!--/#header-->
    <div class="container">
            <ul id = "myTab" class = "nav nav-tabs">
               <li class = "active"><a href = "#Admin" data-toggle = "tab"> Admin</a></li>
               <li><a href = "#User" data-toggle = "tab">User</a></li>  
            </ul>
            <!--/#tabs-->
            <div id = "myTabContent" class = "tab-content">
                <div class = "tab-pane fade in active" id = "Admin">
                    <form name="login" method="post" action="controller/validateLogin.php" onsubmit="return submitForm();">
                        <div class="form-group" id="admin_email" >
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" class="form-control" id="email" placeholder="Email" >
                            <span></span>
                        </div>
                        <div class="form-group" id ="admin_password">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <span></span>
                        </div>
                        <a href=""> Forgot Password ? </a> <br/><br/>
                        <input type="submit" value="Login" class="btn btn-info" />
                    </form>
                    <!--/#loginform-->
                </div>
                <div class = "tab-pane fade" id = "User">
                  <form name="login" method="post" action="controller/validateLogin.php" onsubmit="return submitForm();">
                        <div class="form-group" id = "user_email">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="email2" placeholder="Email">
                            <span></span>
                        </div>
                        <div class="form-group" id ="user_password">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password2" placeholder="Password">
                            <span></span>
                        </div>
                        <a href=""> Forgot Password ? </a> <br/><br/>
                        <input type="submit" value="Login" class="btn btn-info"/>
                    </form>
                    <!--/#loginform-->
                </div>  
            </div>
        </div>
    <?php include ("footer.php");?> 
    <!--/#footer-->

    <?php include ("javascript-links.php");?> 
    <script>
   $(function () {
      //$('#myTab li:eq(1) a').tab('show');
   });
    var submitForm = function() {
        var validation_message;
        login = [{ type : 'email' , value: $('#email').val() , errorMessage:'Email is required' }, { type:'password' , value: $('#password').val() , errorMessage:'Password is required' }];

        login_details = {email:$('#email').val(),password:$('#password').val()};
        validation_message = validateForm (login );          
         alert(login_details);
        if(submitToServer(validation_message)){
            alert(login_details);
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
            body = document.getElementById('admin_email');
            writeError(validation_message[0],body);
            body = document.getElementById('admin_password');
            writeError(validation_message[1],body);
            body = document.getElementById('user_email');
            writeError(validation_message[0],body);
            body = document.getElementById('user_password');
            writeError(validation_message[1],body);
            return false;
        }
        return false;
    }
    </script>
</body>
</html>
