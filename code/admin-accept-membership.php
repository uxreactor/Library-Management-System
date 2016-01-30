<?php include ("header-admin.php");?> 
    <!--/#header-->
    <div class="container"> 
        <div id="load_members">
             <h2>New membership requests</h3>
        </div>
    </div>
        <!--table  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Mail ID</th>
                <th>Membership type</th>
                <th>Address</th>
                <th colspan="2">Actions</th>
              </tr>
            </thead>
        <tbody>
            <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="button" class="btn btn-info" value="Approve" /></td>
                <td><input type="button" class="btn btn-info" value="Reject" /></td>
            </tr>
        </tbody>
        </table>
    </div>
    <!--/#table-->
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?> 
    <script type="text/javascript">
        var parent = document.getElementById('load_members');
        function postForm() {
            $.ajax({             
                url: 'controller/load_allmembers.php',
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
