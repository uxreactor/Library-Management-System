<?php 
    include ("header-member.php");
    require 'controller/session.php';
    $memberId = checkSession();
    require 'controller/controller.php';
    $memberName = getMemberName($memberId);
    if(checkSession()){
?>
    <!--/#header-->
    <div class="container">
        <h2>Membership Renewal Extension </h2>
        <form name="login" method="post" action="controller/submit_member_renew_membership.php" onsubmit="return submitForm();">
            <div class="form-group" id="mem_id_label">
                <label >Member Id </label>
                <input type="text" class="form-control" id="memId" value="<?php echo $memberId ?>" />
                <span></span>
            </div>
            <div class="form-group" id="mem_name_label">
                <label  >Member name </label>
                <input type="text" class="form-control" id="memname" value="<?php echo $memberName ?>"/>
                <span></span>
            </div>
            <div class="form-group" >
                <span style=" font-size:18px;"> Membership type</span>
                <select class="select_list">
                    <option>Platinum</option>
                    <option>Gold</option>
                    <option>Silver</option>
                </select>
            </div>
            <input type="submit" value="Submit" class="btn btn-default btn-lg btn-info"/>
            <a href="member.php" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
    </div>
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    <script>

        var submitForm = function() {
            var validation_message;
            var renew = [{ type : 'text' , value: $('#memId').val() , errorMessage:'Member Id is required' }, 
                    { type:'text' , value: $('#memname').val() , errorMessage:'Member name is required' }];
            validation_message = validateForm (renew); 

            var renew_details = {memid: $('#memid').val(),memname: $('#memname').val()};
            if(submitToServer(validation_message)){
                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: renew_details,
                    success: function(response){
                        console.log(response);
                        window.location = 'member.php';
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            } 
            else{
                body = document.getElementById('mem_id_label');
                writeError(validation_message[0],body);
                body = document.getElementById('mem_name_label');
                writeError(validation_message[1],body);
                return false;
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
