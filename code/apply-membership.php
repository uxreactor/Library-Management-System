<?php include ("header-guest.php");?> 
    <!--/#header-->

    <div class="container">
        <div class = "notification" style="font-size: 40px; color:green"></div>
        <h2>Apply for new membership</h2>
        <form name="add_book" method="post" action="controller/submit_new_membership.php" onsubmit="return submitForm();">
            <div class="form-group" id="name_id_label">
                <label >Name</label>
                <input type="text" class="form-control" id="name_id" />
                <span class="error"></span>
            </div>
            <div class="form-group" id="phoneno_id_label">
                <label >Phone number</label>
                <input type="number" class="form-control" id="phoneno_id"/>
                <span class="error"></span>
            </div>
            <div class="form-group" id="input_email_label">
                <label >Email</label>
                <input type="text" class="form-control" id="input_email" />
                <span class="error"></span>
            </div>
            <div class="form-group" id="issue_date_label">
                <label >Date Of Birth</label>
                <input type="date" class="form-control" id="dob" />
                <span class="error"></span>
            </div>
            <div class="form-group">
                <h3> Gender : </h3>    
                <label class="radio-inline"> <input type="radio"  class="radio" name="radio" value="male" checked="checked"> Male</label>
                <label class="radio-inline"> <input type="radio"  class="radio" name="radio" value="female"> Female</label>         
            </div>            
            <h3>Address</h3>
            <div class="form-group" id="hno_label">
                <label >H.No</label>
                <input type="text" class="form-control" id="hno" />
                <span class="error"></span>
            </div>
            <div class="form-group" id="street_label">
                <label >Street</label>
                <input type="text" class="form-control" id="street" />
                <span class="error"></span>               
            </div>
            <div class="form-group" id="city_label">
                <label >City</label>
                <input type="text" class="form-control" id="city" />
                <span class="error"></span>               
            </div>
            <div class="form-group" id="state_label">
                <label >State</label>
                <input type="text" class="form-control" id="state" />
                <span class="error"></span>                
            </div>
            <div class="form-group" id="pin_label">
                <label >PIN code</label>
                <input type="text" class="form-control" id="pin" />
                <span class="error"></span>               
            </div>
            <span style=" font-size:18px;"> Membership type</span>
            <select class="select_list" id="membership_type" style=" width:23%;">
                <option>Platinum</option>
                <option>Gold</option>
                <option>Silver</option>
            </select><a href="" data-toggle="modal" data-target="#help" style=" margin-left:1%;">Help</a>
            <br/><br />
            <div class="modal fade" id="help" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Membership type details</h4>
                    </div>
                    <div class="modal-body">
                     <table  class="table table-bordered table-striped" style="width:40%;">
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
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>  
            </div>
        </div>
            
            <button type="submit" class="btn btn-default btn-lg btn-info" >Submit</button>
            <a href="index.php" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
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
          
            if(submitToServer(validation_message)){
              var  member_details = { 
                    name: $('#name_id').val(),
                    phoneno: $('#phoneno_id').val(),
                    email: $('#input_email').val(),
                    dob: $('#dob').val(),
                    gender: $('.radio').val(),
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
                        $('.notification').text(response);
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
    </script>   
</body>
</html>