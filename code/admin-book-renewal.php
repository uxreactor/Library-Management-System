<?php include ("header-admin.php");?> 
    <!--/#header-->
    <div class="container"> 
        <div id="load-renew-book">
            <h2>Request for due date extension()</h2>
        </div>
       
    </div>
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    </script>
    <script type="text/javascript">
            var parent = document.getElementById('load-renew-book');
            function postForm() {
                $.ajax({             
                    url: 'controller/load_renew_books.php',
                    type: 'post',
                    success: function(response){                        
                        console.log(response);
                        obj = jQuery.parseJSON(response);
                        viewData(obj,parent);
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
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