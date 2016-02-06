<?php include ("header-guest.php");?> 
    </header>
    <!--/#header-->
    <div class="container">
        <form name="search_book" method="post" action="controller/search_book.php" onsubmit="return submitForm();">
            <div class="input-group col-xs-5 col-xs-offset-3" id="book_name_label">
                <input type="text" class="textbox_size form-control input-lg" id="search" placeholder="Search book by authorname/bookname" />
                <span class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit" >
                        <i class="glyphicon glyphicon-search text-info"></i>
                    </button>
                </span>
            </div>
        </form>
        <br/>
        <br/>
        <div id="load-books">
            <h2>All Books</h2>      
        </div>      
        <center>
            <ul class="pagination" id="pagination1">
            </ul>
        </center>
    </div>
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
                    if(response){
                        books = jQuery.parseJSON(response);
                        $.each(books,function(idx,elem){
                            delete elem.Action;
                        })    
                        viewData(books,parent);
                        paginationView(books,10);
                    }            
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            });
        }
        $(function() {
            postForm();
        });
        var submitForm = function() {
            var validation_message; 
            search_book_details = {
                search: $('#search').val().toLowerCase()
            };
            $('#pagination1').empty();
            $.ajax({
                url: $('form').attr('action'),
                type: $('form').attr('method'),
                data: search_book_details,
                success: function(response){
                    //console.log(response);
                    parent.removeChild(parent.childNodes[3]);
                    
                    if (response){
                        books = jQuery.parseJSON(response);
                        $.each(books,function(idx,elem){
                            delete elem.Action;
                        })  
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
            return false;
        }
    </script>
</body>
</html>
