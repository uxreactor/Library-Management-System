<?php 
    include ("header-member.php");
    require 'controller/session.php';
    $member_id = checkSession();
    if(checkSession()){
?>

    <!--/#header-->
    <div class="container">
       
    <br/>
    <br/>
    <!--/#searchbar-->
    <div id="load_books">
      <h2>My Books</h2>
    </div>
    <div class="modal fade" id="help" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Due date Extension</h4>
                </div>
                <div class="modal-body">
                    <span id="confirm-text">Due date extension is sent Successfully</span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default OK" data-dismiss="modal">OK</button>
                </div>
            </div>  
        </div>
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
            paginationView(obj,10);
          }
          $("#button").click();
            $('#confirm-text').text("Due date extension request has been sent Successfully" );
            $(document).on("click",".OK",function(){                
                window.location = 'member.php';
          });
        },
        error: function(xhr, desc, err){
          writeError('No results found',parent);
        }
    });
  </script>
</body>
</html>
<?php 
}else {
    header("Location: login.php");
}

?>
<script type="text/javascript">
  $(document).on("click",".btn",function(){
    var $row = $(this).closest("tr"),       
    $tds = $row.find("td");       
    var bookId = $tds[1].textContent;
    var returnDate = $tds[2].textContent; 
    var url = "member-request-extension.php? bookId=" + bookId + "&returnDate=" + returnDate ;
    window.location.href = url;
  });

</script>