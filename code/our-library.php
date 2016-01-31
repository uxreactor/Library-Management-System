<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container">
        <div class="row">    
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <div class="input-group-btn">
                        <select class="select_list select-books-members" id="option" onchange="loadDetails()">
                            <option selected="selected">Books</option>
                            <option>Members</option>
                        </select>
                    </div>      
                    <input type="text" class="textbox_size form-control input-lg" placeholder="Search book by authorname/bookname">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-lg" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <div id="load-books">
            <h2>All books</h2>      
        </div> 
    </div>
    <!--/#table-->
    <?php include ("footer.php");?>
    <!--/#footer-->

    <?php include ("javascript-links.php");?>    
    <script type="text/javascript">
        var parent = document.getElementById('load-books');
        var error = document.getElementById('book_name_label');
        
        $(function() {
            loadDetails()
        });

        function loadDetails(){
            var select = document.getElementById('option').value;
            var url;
            if(select == "Books"){
                url = 'controller/load_all_books_in_library.php';
      
            } else if(select == "Members") {
                url = 'controller/load_all_members.php';
            }
            postForm(url);  
        }

        function postForm(url) {
            $('.table').remove();
            $.ajax({             
                url: url,
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
    </script>
</body>
</html>
