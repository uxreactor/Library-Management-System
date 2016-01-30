<?php include ("header-admin.php");?> 
    <!--/#header-->
    <div class="container"> 
        <div id="load_manage_books">
            <h2>Manage issued books()</h2>
        </div>
    </div>
    <!--/#table-->
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    </script>
    <script type="text/javascript">
        var parent = document.getElementById('load_manage_books');
        function postForm() {
            $.ajax({             
                url: 'controller/load_manage_books.php',
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
