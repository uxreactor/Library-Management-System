<?php 
    include ("header-admin.php");
    require 'controller/session.php';
?>
    <!--/#header-->
    <div class="container">
        <div class="row" id="load-all-members"> 
            <form method="POST" onsubmit="return submitForm();">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <select class="select_list select-books-members" id="option" onchange="loadDetails()">
                                <option selected="selected">Books</option>
                                <option>Members</option>
                            </select>
                        </div>      
                        <input type="text" id="search" class="textbox_size form-control input-lg" placeholder="Search book by authorname/bookname">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-lg" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                    <br/>
                    <br/>
                </div>
            </form>  
        </div>
        <br/>
        <br/>
        <div id = "load-books">
            <h2>All books</h2>      
        </div> 

    </div>
    <!--/#table-->
    <center>
        <ul class="pagination" id="pagination1">
        </ul>
    </center>

    <?php include ("footer.php");?>
    <!--/#footer-->

    <?php include ("javascript-links.php");?>    
    
    <script type="text/javascript">
        
        var parent = document.getElementById('load-books');
        var books;
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_all_books_in_library.php',
                type: 'post',
                 success: function(response){                        
                    books = jQuery.parseJSON(response);
                    viewData(books,parent);
                    paginationView(books,5);  
                },
                error: function(xhr, desc, err){
                    writeError('No results found',error);
                }
            });
     
        }
        $(function() {
            postForm();
        });
        $(document).on("click",".Edit",function(){
           var $tr = $(this).closest('tr');
           var isbn = $tr.find('td:first-child').text();
           console.log(isbn);
           window.location.href="admin-editbook-details.php?isbn="+isbn;
               
       });

        function loadDetails(){
            $('.no_result').remove();
            var select = document.getElementById('option').value;
            
            if(select == "Books"){
                parent.childNodes[1].textContent = "All Books";
                url = 'controller/load_all_books_in_library.php';
      
            } else if(select == "Members") {
                parent.childNodes[1].textContent = "All Members";
                url = 'controller/load_all_members.php';
            }
            postForm(url);  
        }

        $(function() {
            loadDetails()
        });

       function postForm(url) {
            $('.table').remove();
            $('#pagination1').empty();
            $.ajax({
                url: url,
                type: 'post',
                success: function(response){                        
                    console.log(response);
                    books = jQuery.parseJSON(response);                     
                    viewData(books,parent);
                    paginationView(books,5);   
                },
                error: function(xhr, desc, err){
                    writeError('No results found',error);
                }
            });
        }
        var submitForm = function() {
            var validation_message;
            search_book = [{ 
                type: 'text',
                value: $('#search').val(),
                errorMessage:'Book or author name is required' 
            }];

            var select = document.getElementById('option').value;
            
            if(select == "Books"){
                url = 'controller/search_book.php';
      
            } else if(select == "Members") {
                url = 'controller/search_member.php';
            }

            validation_message = validateForm(search_book);  
            search_book_details = {
                search: $('#search').val().toLowerCase()
            };
            
            if(submitToServer(validation_message)){
                $('.table,.no_result').remove();
                $('#pagination1').empty();
                $.ajax({
                    url: url,
                    type: "POST",
                    data: search_book_details,
                    success: function(response){
                        console.log(response);
                        if (response){
                            books = jQuery.parseJSON(response);
                            viewData(books,parent);  
                            paginationView(books,5);  
                        }else{
                            results = document.createElement('h2');
                            results.className = "no_result";
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
            }
            return false;
        } 
        $("input").click(function() {
            //alert("bala");
        });        
    </script>

</body>
</html>
