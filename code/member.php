<?php 
    include ("header-member.php");
    require 'controller/session.php';
    echo $member_id = checkSession();

    //echo "$member_id";
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
    <div id="load_books">
      <h2>My books</h2>
    </div>
    
	<!--/#table-->
  <?php include ("footer.php");?>
  <!--/#footer-->
  <center>
      <ul class="pagination" id="pagination1">
      </ul>
  </center>

  <?php include ("javascript-links.php");?>   
  <script type="text/javascript">
    var member_id = <?php echo $member_id; ?>;
    var parent = document.getElementById('load_books');
        
    $.ajax({             
        url: 'controller/load_member_books.php',
        type: 'post',
        data: { member_id: member_id } ,
        success: function(response){
          if(response) {
            obj = jQuery.parseJSON(response);
            viewData(obj,parent);
            paginationView(obj,5);
          }
        },
        error: function(xhr, desc, err){
          writeError('No results found',parent);
        }
    });
  </script>
</body>
</html>
