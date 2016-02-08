<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    if(checkSession()){
?>
    <!--/#header-->
    <div class="container">
        <div class = "notification" style="font-size: 40px; color:green"></div>
        <h2>Adding Book</h2>
        <form name="add_book" method="post" action="controller/submit_add_book.php" onsubmit="return submitForm();">
            <div class="form-group" id="book_name_label">
                <label >Book name</label>
                <input type="text" class="form-control" id ="book_name"/>
                <span></span>
            </div>
            <div class="form-group" id="author_name_label">
                <label >Author name</label>
                <input type="text" class="form-control" id ="author_name"/>
                <span></span>
            </div>
            <div class="form-group" id="isbn_label">
                <label>ISBN</label>
                <input type="text" class="form-control" id ="isbn"/>
                <span></span>
            </div>
            <div class="form-group" id="category_label">
                <label >Category</label><br/>
                <select class="form-control" name="category" id="category" onchange="showfield(this.options[this.selectedIndex].value)">
                    <option value="Add new category">Add new category</option>
                </select>     
            </div>
            <div class="form-group" id="div1"></div> 
            <div class="form-group" id="edition_label">
                <label >Edition</label>
                <input type="number" class="form-control" id ="edition"/>
                <span></span>
            </div>
            <div class="form-group" id="price_label">
                <label >Price</label>
                <input type="number" class="form-control" id ="price"/>
                <span></span>
            </div>
            <div class="form-group" id="publisher_label">
                <label >Publisher</label>
                <input type="text" class="form-control" id ="publisher"/>
                <span></span>
            </div>
            <div class="form-group" id="quantity_label">
                <label >Quantity</label>
                <input type="number" class="form-control" id ="quantity"/>
                <span></span>
            </div>
            <button type="submit" class="btn btn-default btn-lg btn-info">Submit</button>
            <a href="our-library.php" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
        <div class="modal fade" id="help" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Adding New Book</h4>
                    </div>
                    <div class="modal-body">
                        <span id="confirm-text">New book added successfully</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info OK" data-dismiss="modal">OK</button>
                    </div>
                </div>  
            </div>
        </div>
        <a href="#" id="button" data-toggle="modal" data-target="#help"></a>
        <!--/#issue book form -->
    </div>  
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?>  
    <script type="text/javascript">
        var category = document.getElementById('category');  
        var new_option;
        $.ajax({
            url: 'controller/load_dropdown_options.php',
            type: 'POST',
            success: function(response){
                obj = jQuery.parseJSON(response);
                var data,info,options;
                console.log(obj);
                for(var key in obj){
                    info = obj[key];
                    data = info['category'];
                    options = document.createElement("option");
                    options.textContent = data;
                    options.setAttribute("value", data);
                    options.setAttribute("selected", 'selected');
                    category.insertBefore(options,category.childNodes[1]);  
                }
            },
            error: function(xhr, desc, err){
                console.log(desc);
            }
        });


        var submitForm = function() {
            var validation_message,add_book_details;
            if(!new_option){
               add_book = [{ type : 'text' , value: $('#book_name').val() , errorMessage:'Book name is required' }, 
                { type:'text' , value: $('#author_name').val() , errorMessage:'Author name is required' },
                { type:'text' , value: $('#isbn').val() , errorMessage:'ISBN is required' },
                { type:'text' , value: $('#edition').val() , errorMessage:'Edition is required' },
                { type:'text' , value: $('#price').val() , errorMessage:'Price is required' },
                { type:'text' , value: $('#publisher').val() , errorMessage:'Publisher is required' },
                { type:'text' , value: $('#quantity').val() , errorMessage:'Quantity is required' }]; 
                add_book_details = {type: "old", book_name: $('#book_name').val(), author_name: $('#author_name').val(),isbn : $('#isbn').val(),category: $('#category').val(),edition: $('#edition').val(),price: $('#price').val(),publisher: $('#publisher').val(),quantity: $('#quantity').val()};
            }else {
                add_book = [{ type : 'text' , value: $('#book_name').val() , errorMessage:'Book name is required' }, 
                { type:'text' , value: $('#author_name').val() , errorMessage:'Author name is required' },
                { type:'text' , value: $('#isbn').val() , errorMessage:'ISBN is required' },
                { type:'text' , value: $('#edition').val() , errorMessage:'Edition is required' },
                { type:'text' , value: $('#price').val() , errorMessage:'Price is required' },
                { type:'text' , value: $('#publisher').val() , errorMessage:'Publisher is required' },
                { type:'text' , value: $('#quantity').val() , errorMessage:'Quantity is required' },
                { type:'text' , value: $('#newcategory').val() , errorMessage:'Category is required' }];
                add_book_details = {type: "new", book_name: $('#book_name').val(), author_name: $('#author_name').val(),isbn : $('#isbn').val(),category: $('#newcategory').val(),edition: $('#edition').val(),price: $('#price').val(),publisher: $('#publisher').val(),quantity: $('#quantity').val()};
            }
            
            validation_message = validateForm (add_book);  
             
                if(submitToServer(validation_message)){
                    $.ajax({
                        url: $('form').attr('action'),
                        type: $('form').attr('method'),
                        data: add_book_details,
                        success: function(response){
                            //console.log(response);
                            if(response == "Category is already exists"){
                                body = document.getElementById('div1');
                                writeError(response,body);
                            }
                            $("#button").click();
                            $('#confirm-text').css('color', 'green');
                            var book_name = document.getElementById('book_name').value;
                            $('#confirm-text').text(book_name+"New book added successfully" );
                            $(document).on("click",".OK",function(){                
                                window.location = 'our-library.php';
                            });
                            $('.notification').text(response);
                        },
                        error: function(xhr, desc, err){
                            console.log(desc);
                        }
                    });
                    
                    
                }else{
                    body = document.getElementById('book_name_label');
                    writeError(validation_message[0],body);
                    body = document.getElementById('author_name_label');
                    writeError(validation_message[1],body);
                    body = document.getElementById('isbn_label');
                    writeError(validation_message[2],body);
                    body = document.getElementById('edition_label');
                    writeError(validation_message[3],body);
                    body = document.getElementById('price_label');
                    writeError(validation_message[4],body);
                    body = document.getElementById('publisher_label');
                    writeError(validation_message[5],body);
                    body = document.getElementById('quantity_label');
                    writeError(validation_message[6],body);
                    if(new_option){
                        body = document.getElementById('div1');
                        writeError(validation_message[7],body);
                    }
                    return false;
                }
                return false;
            }
            RemoveInlineError();

        </script> 
    <script type="text/javascript">
    function showfield(name){
        if(name=='Add new category'){
            document.getElementById('div1').innerHTML='<label >Add new category name</label> <input type="text" name="other" class="form-control" id ="newcategory"/> <span></span>';
            new_option =1;
        }
        else {
            document.getElementById('div1').innerHTML='';
            new_option = 0 ;
        }
    }
    </script>   
</body>
</html>
<?php 
}else {
    header("Location: login.php");
}

?>