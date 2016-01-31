<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container"> 
        <div id="load_mem_request">
            <h2>Membership renewal requests</h2>
        </div>
    </div>
    <!--/#table-->
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    <script type="text/javascript">
        var parent = document.getElementById('load_mem_request');
        function postForm() {
            $.ajax({             
                url: 'controller/load_mem_request.php',
                type: 'post',
                success: function(response){                        
                    console.log(response);
                    obj = jQuery.parseJSON(response);
                    console.log(obj);
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
