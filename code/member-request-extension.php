<?php 
    include ("header-member.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container">
        <h2>Book request extension </h2>
        <form name="login" method="post" action="" onsubmit="return submitForm();">
            <div class="form-group" >
                <label >Member ID</label>
                <input type="text" class="form-control" readonly />
            </div>
            <div class="form-group" >
                <label >Book ID</label>
                <input type="text" class="form-control" readonly />
            </div>
            <div class="form-group" >                
                <label >Return date</label>
                <input type="date" class="form-control" readonly />
            </div>
            <div class="form-group" id="extention_days_label">
                <label >Extension duration(Days)</label>
                <input type="number" class="form-control" id="extention_days"/>
                <span></span>
            </div>
            <button type="submit" class="btn btn-default btn-lg btn-info">Submit</button>
            <a href="" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
        <!--/#issue book form -->
    </div>
    <?php include ("footer.php");?>
    <!--/#footer-->

    <?php include ("javascript-links.php");?>
     
    <script>

        var submitForm = function() {
            var validation_message;
            login = [{ type : 'text' , value: $('#extention_days').val() , errorMessage:'Duration is required'}];
            validation_message = validateForm (login);  
            if(submitToServer(validation_message)){
                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: login,
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            } 
            else{
                body = document.getElementById('extention_days_label');
                writeError(validation_message[0],body);
                return false;
            }
            return false;
        }   

    </script>   
</body>
</html>
