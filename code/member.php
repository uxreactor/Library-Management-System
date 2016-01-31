<?php 
    include ("header-member.php");
    require 'controller/session.php';
    //echo checkSession();
?>
    <!--/#header-->
    <div class="container">
        <div class="input-group col-xs-6 col-xs-offset-3">
            <input type="text" class="textbox_size form-control" placeholder="Search book by authorname/bookname" />
            <span class="input-group-btn">
                <button class="btn btn-default btn-lg" type="button">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </span>
        </div>
    <br/>
    <br/>
    <!--/#searchbar--> 
    </h3>
    <h2>My books</h2>
    <table  class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Book ID</th>
          <th>Book name</th>
          <th>Issued date</th>
          <th>Return date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>1</th>
          <td>UX Design</td>
          <td>21/12/2015</td>
          <td>10/02/2016</td>
          <td><input type="button" class="btn btn-info" value=" Request extension" /></td>
        </tr>
        <tr>
          <th>2</th>
          <td>UX Design</td>
          <td>21/12/2015</td>
          <td>10/02/2016</td>
          <td><input type="button" class="btn btn-info" value=" Request extension" /></td>
        </tr>
        <tr>
          <th>3</th>
          <td>UX Design</td>
          <td>21/12/2015</td>
          <td>10/02/2016</td>
          <td><input type="button" class="btn btn-info" value=" Request extension" /></td>
        </tr>
     </tbody>
    </table>
    </div>
    <!--/#table-->
    <table class="table table-striped">
  	
	</table>
	<!--/#table-->
    <?php include ("footer.php");?>
    <!--/#footer-->


    <?php include ("javascript-links.php");?>   
</body>
</html>
