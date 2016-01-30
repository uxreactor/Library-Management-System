<?php include ("header-admin.php");?> 
    <!--/#header-->
    <div class="container">
        <h2>Adding Book</h2>
        <form name="add_book" method="post" action="controller/submit_add_book.php" onsubmit="return submitForm();">
            <div class="form-group" id="book_name_label">
                <label >Book name</label>
                <input type="text" class="form-control" id ="book_name" />
                <span class="error"></span>
            </div>
            <div class="form-group" id="author_name_label">
                <label >Author name</label>
                <input type="text" class="form-control" id ="author_name"/>
                <span class="error"></span>
            </div>
            <div class="form-group" id="isbn_label">
                <label >ISBN</label>
                <input type="text" class="form-control" id ="isbn"/>
                <span class="error"></span>
            </div>
            <div class="form-group" id="category_label">
                <label >Category</label><br/>
                <select class="form-control" id="category">
                    <option value="Arts">Arts</option>
                    <option value="Technology">Technology</option>
                    <option value="Novel">Novel</option>
                    <option value="History">History</option>
                    <option value="Anthology">Anthology</option>
                    <option value="Comics">Comics</option>
                </select>   
            </div>
            <div class="form-group" id="edition_label">
                <label >Edition</label>
                <input type="number" class="form-control" id ="edition"/>
                <span class="error"></span>
            </div>
            <div class="form-group" id="price_label">
                <label >Price</label>
                <input type="number" class="form-control" id ="price"/>
                <span class="error"></span>
            </div>
            <div class="form-group" id="publisher_label">
                <label >Publisher</label>
                <input type="text" class="form-control" id ="publisher"/>
                <span class="error"></span>
            </div>
            <div class="form-group" id="quantity_label">
                <label >Quantity</label>
                <input type="number" class="form-control" id ="quantity"/>
                <span class="error"></span>
            </div>
            <button type="submit" class="btn btn-default btn-lg btn-info">Submit</button>
            <a href="our-library.html" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
        <!--/#issue book form -->
    </div>  
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?>  
    <script type="text/javascript">
        $(function () {
                  //$('#myTab li:eq(1) a').tab('show');

               });

        var submitForm = function() {
            var validation_message;
            add_book = [{ type : 'text' , value: $('#book_name').val() , errorMessage:'Book name is required' }, 
            { type:'text' , value: $('#author_name').val() , errorMessage:'Author name is required' },
            { type:'text' , value: $('#isbn').val() , errorMessage:'ISBN is required' },
            { type:'text' , value: $('#edition').val() , errorMessage:'Edition is required' },
            { type:'text' , value: $('#price').val() , errorMessage:'Price is required' },
            { type:'text' , value: $('#publisher').val() , errorMessage:'Publisher is required' },
            { type:'text' , value: $('#quantity').val() , errorMessage:'Quantity is required' }];
            validation_message = validateForm (add_book);  
            add_book_details = {book_name: $('#book_name').val(), author_name: $('#author_name').val(),isbn : $('#isbn').val(),category: $('#category').val(),edition: $('#edition').val(),price: $('#price').val(),publisher: $('#publisher').val(),quantity: $('#quantity').val()};
             if(submitToServer(validation_message)){
                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: add_book_details,
                    success: function(response){
                        console.log(response);
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
                return false;
            }
            return false;
        }
    </script>   
</body>
</html>
