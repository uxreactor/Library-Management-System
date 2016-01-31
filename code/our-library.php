<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container">
        <div class="row" id="load-all-members">    
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <div class="input-group-btn">
                        <select class="select_list select-books-members">
                            <option selected="selected">Books</option>
                            <option>Members</option>
                        </select>
                    </div>      
                    <input type="text" class="textbox_size form-control input-lg" placeholder="Search book by authorname/bookname">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-lg" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
                <br/>
                <br/>
            </div>         
        </div>
    <?php include ("footer.php");?>
    <!--/#footer-->

    <?php include ("javascript-links.php");?>    
    
    <script type="text/javascript">
        var parent = document.getElementById('load-all-members');
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_all_members.php',
                type: 'post',
                success: function(response){                        
                    obj = jQuery.parseJSON(response);
                    viewData(obj,parent);
                },
                error: function(xhr, desc, err){
                    writeError('No results found',error);
                }
            });
        }

        $("form#books").submit(function() {
            postForm();
            return false;
        });

        $(function() {
            postForm();
        });


        var submitForm = function() {
            var validation_message;
            search_book = [{ 
                type: 'text',
                value: $('#search').val(),
                errorMessage:'Book or author name is required' 
            }];
            validation_message = validateForm(search_book);  
            search_book_details = {
                search: $('#search').val()
            };
            
            if(submitToServer(validation_message)){
                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: search_book_details,
                    success: function(response){
                        console.log(response);
                        parent.removeChild(parent.childNodes[3]);
                        
                        if (response){
                            obj = jQuery.parseJSON(response);
                            viewData(obj,parent);  
                        }else{
                            results = document.createElement('h2');

                            results.innerText = "No results";
                            parent.appendChild(results);
                        }
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
                
            }else{
                body = document.getElementById('book_name_label');
                writeError(validation_message[0],body);
                return false;
            }
            return false;
        }
    </script>
</body>
</html>
