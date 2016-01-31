<?php include ("header-guest.php");?> 
    </header>
    <!--/#header-->
    <div class="container">
        <div class="input-group col-xs-5 col-xs-offset-4">
            <input type="text" class="textbox_size form-control input-lg" placeholder="Search book by authorname/bookname" />
            <span class="input-group-btn">
                <button class="btn btn-default btn-lg" type="button">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </span>
        </div>
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
        function postForm() {
            $.ajax({             
                url: 'controller/load_all_books.php',
                type: 'post',
                success: function(response){                        
                    console.log(response);
                    books = jQuery.parseJSON(response);                     
                    viewData(books,parent);
                    paginationView(books,2);                       
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            });
        }
        $(function() {
            postForm();
        });
    </script>
</body>
</html>
