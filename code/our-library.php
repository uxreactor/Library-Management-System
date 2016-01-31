<?php 
    include ("header-admin.php");
    require 'controller/session.php';
?>
    <!--/#header-->
    <div class="container">
        <div class="row">    
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
            </div>
        </div>
        <br/>
        <br/>
        <div id="load-books">
            <h2>All books</h2>      
        </div> 
        <!--/#search bar and dropdown-->  
        <!--<table  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>Validity</th>
                <th>Phone No.</th>
                <th>Mail ID</th>
                <th colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1001</td>
                    <td>Anurag</td>
                    <td>26/12/2016</td>
                    <td>9059638871</td>
                    <td>abc@gmail.com</td>
                    <td><input type="button" class="btn btn-info" value="Edit" /></td>
                    <td><input type="button" class="btn btn-info" value="Delete" /></td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Anurag</td>
                    <td>26/12/2016</td>
                    <td>9059638871</td>
                    <td>abc@gmail.com</td>
                    <td><input type="button" class="btn btn-info" value="Edit" /></td>
                    <td><input type="button" class="btn btn-info" value="Delete" /></td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Anurag</td>
                    <td>26/12/2016</td>
                    <td>9059638871</td>
                    <td>abc@gmail.com</td>
                    <td><input type="button" class="btn btn-info" value="Edit" /></td>
                    <td><input type="button" class="btn btn-info" value="Delete" /></td>
                </tr>
           </tbody>
          </table>
    </div>
    <!--/#table-->
    <?php include ("footer.php");?>
    <!--/#footer-->

    <?php include ("javascript-links.php");?>    
    <script type="text/javascript">
        var parent = document.getElementById('load-books');
        var error = document.getElementById('book_name_label');
        function postForm() {
            $.ajax({             
                url: 'controller/load_all_books_in_library.php',
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
    </script>
</body>
</html>
