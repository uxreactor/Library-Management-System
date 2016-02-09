<?php 
    include ("header-admin.php");

    require('controller/controller.php');
    $isbn = $_GET['isbn'];
    $memberDetails = getMemberDetails($isbn);
    if($memberDetails[0]['Gender'] == 'Female'){
    	$memberDetails[0]['Gender'] = 'checked';
    }
    $memId = $memberDetails[0]['Member ID'];
    require 'controller/session.php';
    if(checkSession()){
    
    
  ?>

  <div class="container">
        <h2>Editing Member Details</h2>
        <form name="add_book" method="post" action="controller/submit_editmembership_details.php" onsubmit="return submitForm();">
            <div class="form-group" id="name_id_label">
                <label >Name</label>
                <input type="text" class="form-control" id="name_id"  value="<?php echo $memberDetails[0]['Member Name']; ?>" />
                <span class="error"></span>
            </div>
            <div class="form-group" id="phoneno_id_label">
                <label >Phone number</label>
                <input type="number" class="form-control" id="phoneno_id" value="<?php echo $memberDetails[0]['Phone No.']; ?>"/>
                <span class="error"></span>
            </div>
            <div class="form-group" id="input_email_label">
                <label >Email</label>
                <input type="text" class="form-control" id="input_email" value="<?php echo $memberDetails[0]['Mail ID']; ?>"/>
                <span class="error"></span>
            </div>
            <div class="form-group" id="issue_date_label">
                <label >Date Of Birth</label>
                <input type="date" class="form-control" id="dob" value="<?php echo $memberDetails[0]['Dob']; ?>"/>
                <span class="error"></span>
            </div>
            <div class="form-group">
                <h3> Gender : </h3>    
                <label class="radio-inline">
                <input type="radio"  class ="radio" name="radio" value="Male" checked /> Male</label>
                <label class="radio-inline">
                <input type="radio"  class ="radio" name="radio" value="Female" <?php echo $memberDetails[0]['Gender']; ?>/> Female</label>         
            </div>            
            <h3>Address</h3>
            <div class="form-group" id="hno_label">
                <label >H.No</label>
                <input type="text" class="form-control" id="hno" value="<?php echo $memberDetails[0]['H NO']; ?>" />
                <span class="error"></span>
            </div>
            <div class="form-group" id="street_label">
                <label >Street</label>
                <input type="text" class="form-control" id="street" value="<?php echo $memberDetails[0]['Street']; ?>"/>
                <span class="error"></span>               
            </div>
            <div class="form-group" id="city_label">
                <label >City</label>
                <input type="text" class="form-control" id="city" value="<?php echo $memberDetails[0]['City']; ?>"/>
                <span class="error"></span>               
            </div>
            <div class="form-group" id="state_label">
                <label >State</label>
                <input type="text" class="form-control" id="state" value="<?php echo $memberDetails[0]['State']; ?>"/>
                <span class="error"></span>                
            </div>
            <div class="form-group" id="pin_label">
                <label >PIN code</label>
                <input type="text" class="form-control" id="pin" value="<?php echo $memberDetails[0]['Pincode']; ?>" />
                <span class="error"></span>               
            </div>
            <span style=" font-size:18px;"> Membership type</span>
            <select class="select_list" id="membership_type" style="width:23%;">
                <option <?php if($memberDetails[0]["Membership ID"] == 1){ echo "selected";}; ?> value="Platinum">Platinum</option>
                <option <?php if($memberDetails[0]["Membership ID"] == 2){ echo "selected";}; ?> value="Gold">Gold</option>
                <option <?php if($memberDetails[0]["Membership ID"] == 3){ echo "selected";}; ?> value="Silver">Silver</option>
            </select>
            <img src="images/download.png" alt="Help" data-toggle="modal" data-target="#help"style="width:20px;height:20px; margin-left:1%;">
            <br/><br />
            <div class="modal fade" id="help" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Membership Type Details</h4>
                    </div>
                    <div class="modal-body">
                     <table  class="table table-bordered table-striped" style="width:40%; ">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Cost</th>
                                <th>Validation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Platinum</td>
                                <td>300</td>
                                <td>12 months</td>
                            </tr>
                            <tr>
                                <td>Gold</td>
                                <td>200</td>
                                <td>6 months</td>
                            </tr>
                            <tr>
                                <td>Silver</td>
                                <td>100</td>
                                <td>3 months</td>
                            </tr>
                        </tbody>
                    </table>
                    <span id="confirm-text"></span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info OK" data-dismiss="modal">Ok</button>
                    </div>
                </div>  
            </div>
        </div>
        <a href="#" id="button" data-toggle="modal" data-target="#help"></a>
            
            <button type="submit" class="btn btn-default btn-lg btn-info" >Submit</button>
            <a href="our-library.php" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
       

        <!--/#issue book form -->
    </div>
    <?php include ("footer.php");?> 
    <!--/#footer-->

    <?php include ("javascript-links.php");?>   

    <script type="text/javascript">
        function submitForm() {

            var validation_message;
            add_member = [{ 
                type : 'text' , 
                value: $('#name_id').val() , 
                errorMessage:'Name is required' 
            }, { 
                type:'number' , 
                value: $('#phoneno_id').val() , 
                errorMessage:'Phone number is required' 
            }, { type:'email' ,
                 value: $('#input_email').val() , 
                 errorMessage:'Email is required'
            },{ 
                type:'date' , 
                value: $('#dob').val() ,
                errorMessage:'Date of birth is required'
            },{ 
                type:'text' ,
                value: $('#hno').val() , 
                errorMessage:'House No is required' 
            },{ 
                type:'text' ,
                value: $('#street').val() , 
                errorMessage:'Street is required' 
            },{ 
                type:'text' , 
                value: $('#city').val() , 
                errorMessage:'City is required' 
            },{ 
                type:'text' , 
                value: $('#state').val() , 
                errorMessage:'State is required' 
            },{ 
                type:'text' , 
                value: $('#pin').val() , 
                errorMessage:'Pin Code is required' 
            }];

            validation_message = validateForm(add_member);  
          	var memId = <?php echo $memId  ?>;
            if(submitToServer(validation_message)){
              var  member_details = { 
              		memberId: memId,
                    name: $('#name_id').val(),
                    phoneno: $('#phoneno_id').val(),
                    email: $('#input_email').val(),
                    dob: $('#dob').val(),
                    gender: $("input:checked").val(),
                    membership_type: $('#membership_type').val(),
                    hno: $('#hno').val(),
                    street: $('#street').val(),
                    city: $('#city').val(),
                    state: $('#state').val(),
                    pin: $('#pin').val()
                };

                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: member_details,
                    success: function(response){
                        $("#button").click();
                        $(".table").hide();
                        $('.modal-title').text("Edit Membership Details");
                        $('#confirm-text').show();
                        $('#confirm-text').css('color', 'green');
                        var mem_name = document.getElementById('name_id').value;
                        $('#confirm-text').text(mem_name+" details updated successfully");
                        $(document).on("click",".OK",function(){ 
                                window.location = 'our-library.php';
                        });
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
               
            } else {
                body = document.getElementById('name_id_label');
                writeError(validation_message[0],body);
                body = document.getElementById('phoneno_id_label');
                writeError(validation_message[1],body);
                body = document.getElementById('input_email_label');
                writeError(validation_message[2],body);
                body = document.getElementById('issue_date_label');
                writeError(validation_message[3],body);
                body = document.getElementById('hno_label');
                writeError(validation_message[4],body);
                body = document.getElementById('street_label');
                writeError(validation_message[5],body);
                body = document.getElementById('city_label');
                writeError(validation_message[6],body);
                body = document.getElementById('state_label');
                writeError(validation_message[7],body);
                body = document.getElementById('pin_label');
                writeError(validation_message[8],body);
               
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