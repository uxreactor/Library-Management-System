<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    //echo checkSession();
?> 
    <!--/#header-->
    <div class="container"> 
        <h2>Requests for new books()</h2>
        <table  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Book name</th>
                    <th>Author name</th>
                    <th>No.of requests</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <!--/#table-->
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?>     
</body>
</html>
