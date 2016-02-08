<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    if(checkSession()){
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
                            <button class="btn btn-default btn-lg" type="submit"><span class="glyphicon glyphicon-search text-info"></span></button>
                        </span>
                    </div>
                    <br/>
                    <br/>
                </div>
            </form>  
        </div>
        <div id = "load-books">
            <h2>All Books </h2>      
        </div> 
        <div class="modal fade" id="help" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <span id="confirm-text" ></span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default YES" data-dismiss="modal">Yes</button>
                      <button type="button" class="btn btn-default NO" data-dismiss="modal">NO</button>
                    </div>
                </div>  
            </div>
        </div>
    <!--/#table-->
    <center>
        <ul class="pagination" id="pagination1">
        </ul>
    </center>
    <a href="#" id="button" data-toggle="modal" data-target="#help"></a>

    <?php include ("footer.php");?>
    <!--/#footer-->

    <?php include ("javascript-links.php");?>    
    
    <script type="text/javascript">
        
        var parent = document.getElementById('load-books');
        var books;
        var error = document.getElementById('book_name_label');
        $(document).on("click",".Edit",function(){ 
            var select = document.getElementById('option').value;
            var $tr = $(this).closest('tr');
            var isbn = $tr.find('td:first-child').text();
            console.log(isbn);
            if(select == "Books"){
                window.location.href="admin-editbook-details.php?isbn="+isbn;
            } else if(select == "Members") {
                window.location.href="admin_editmember_details.php?isbn="+isbn;               
            }               
       });

        function loadDetails(){
            $('.no_result').remove();
            var select = document.getElementById('option').value;
            
            if(select == "Books"){
                $("#search").attr("placeholder", "Enter bookname/ authorname/ category");
                parent.childNodes[1].textContent = "All Books";
                url = 'controller/load_all_books_in_library.php';
      
            } else if(select == "Members") {
                $("#search").attr("placeholder", "Enter bookID/ memberID");
                parent.childNodes[1].textContent = "All Members";
                url = 'controller/load_all_members.php';
            }
            postForm1(url);  
        }

        $(function() {
            loadDetails()
        });

       function postForm1(url) {
            $('.table').remove();
            $('#pagination1').empty();
            $.ajax({
                url: url,
                type: 'post',
                success: function(response){                        
                    //console.log(response);
                    books = jQuery.parseJSON(response);                     
                    viewData(books,parent);
                    paginationView(books,10);   
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
                        //console.log(response);
                        if (response){
                            books = jQuery.parseJSON(response);
                            viewData(books,parent);  
                            paginationView(books,10);  
                        }else{
                            results = document.createElement('h2');
                            results.className = "no_result";
                            results.innerText = "No results found";
                            parent.appendChild(results);
                        }
                    },
                    error: function(xhr, desc, err){
                        //console.log(desc);
                    }
                });
            }else{
                body = document.getElementById('book_name_label');
                writeError(validation_message[0],body);
            }
            return false;
        } 
        $(document).on("click",".Delete",function(){
            var a=0;
            var $row = $(this).closest("tr"),       
            $tds = $row.find("td");       
            var isbn = $tds[0].textContent;
            var bookname = $tds[5].textContent; 
            var member = $tds[1].textContent;
            var select = document.getElementById('option').value;
            if(select == "Books"){
                $(".NO").show();
                $('.YES').text("YES");
                $('.modal-title').text("Book details");
                $('#confirm-text').css('color', 'red');
                $('#confirm-text').text("Are you sure to delete the "+ bookname+" book from library" );
                $(document).on("click",".YES",function(){                
                    delete_details(isbn);
                });
            } else if(select == "Members") {
                $(".NO").show();
                $('.YES').text("YES");
                $('.modal-title').text("Membership type details" );
                $('#confirm-text').css('color', 'red');
                $('#confirm-text').text("Are you sure to delete the "+ member+" from library" ); 
                $(document).on("click",".YES",function(){                
                    delete_member(isbn);
                });     
            } 
           function delete_details(isbn) {                       
                key_isbn = {isbn : isbn, type : select};
                $.ajax({             
                    url: 'controller/delete_book.php',
                    type: 'post',
                    data: key_isbn,
                    success: function(response){   
                        console.log(response);
                        $("#button").click();
                        $(".NO").hide();
                        $('.modal-title').text("Delete Record" );
                        $('.YES').text("OK");
                        $('#confirm-text').css('color', 'red');
                        $('#confirm-text').text("One record deleted successfully" );
                        $(document).on("click",".YES",function(){                
                            window.location = 'our-library.php';
                        });
                    },
                    error: function(xhr, desc, err){
                        //console.log(desc);
                    }

                });
            } 
        }); 
              
    </script>

</body>
</html>
<?php 
}else {
    header("Location: login.php");
}

?>
