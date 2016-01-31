<?php include ("header-guest.php");?> 
    </header>
    <!--/#header-->
    <div class="container">
        <form name="search_book" method="post" action="controller/search_Index_book.php" onsubmit="return submitForm();">
            <div class="input-group col-xs-5 col-xs-offset-3" id="book_name_label">
                <input type="text" class="textbox_size form-control input-lg" id="search" placeholder="Search book by authorname/bookname" />
                <span class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit" >
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
                <span></span>
            </div>
        </form>
        <br/>
        <br/>
        <div id="load-books">
            <h2>All books</h2>      
        </div>      
        <!--/#search bar-->   
       <!-- <table  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Book ID</th>
                <th>Book name</th>
                <th>Category</th>
                <th>Author name</th>
                <th>Availability</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>01</th>
                <td>UX Design</td>
                <td>Study</td>
                <td>Donald Norman</td>
                <td>05</td>
              </tr>
              <tr>
                <th>02</th>
                <td>UX Design</td>
                <td>Study</td>
                <td>Donald Norman</td>
                <td>05</td>
              </tr>
              <tr>
                <th>03</th>
                <td>UX Design</td>
                <td>Study</td>
                <td>Donald Norman</td>
                <td>05</td>
              </tr>
           </tbody>
        </table>
        <!--/#table-->
        <center>
            <ul class="pagination">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
        </center>
    </div>
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    <script type="text/javascript">
    </script>
    <script type="text/javascript">
        var parent = document.getElementById('load-books');
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_all_books.php',
                type: 'post',
                success: function(response){                        
                    console.log(response);
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
                search: $('#search').val().toLowerCase()
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
                            results.innerText = "No results found";
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
