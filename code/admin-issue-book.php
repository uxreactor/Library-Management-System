<?php 
    include ("header-admin.php");
    require 'controller/session.php';
    if(checkSession()){
?>

    <!--/#header-->
    <div class="container">
        <h2>Issue a book</h2>
        <form name="login" method="post" action="controller/submit_issue_book.php" onsubmit="return submitForm();">
            <div class="form-group" id="book_id_label">
                <label >Book Id</label>
                <input type="number" class="form-control" id="book_id" />
                <span></span>
            </div>
            <div class="form-group">
                <label >Book Title</label>
                <input type="text" class="form-control" id="book_name" readonly="true" />
            </div>
            <div class="form-group">
                <label >Author</label>
                <input type="text" class="form-control" id="book_author"  readonly="true" />
            </div>
            <div class="form-group" id="mem_id_label">
                <label >Member Id</label>
                <input type="number" class="form-control" id="mem_id" />
                <span></span>
            </div>
            <div class="form-group">
                <label >Member Name</label>
                <input type="text" class="form-control" id="member_name" readonly="true" />
            </div>
            <div class="form-group">
                <label >Type</label>
                <input type="text" class="form-control" id="member_type"  readonly="true" />
            </div>
            <div class="form-group" id="issue_date_label">
                <label >Issue date</label>
                <input type="date" class="form-control" id="issue_date" readonly="true" />
                <span></span>
            </div>
            <div class="form-group" id="return_date_label">
                <label >Return date</label>
                <input type="date" class="form-control" id="return_date" readonly="true" />
                <span></span>
            </div>
            <button type="submit" class="btn btn-default btn-lg btn-info">Submit</button>
            <a href="our-library.php" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
    </div>
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?>  
    <script type="text/javascript" src="js/date.js"></script>
    <script type="text/javascript" src="js/helper.js"></script>
    <script type="text/javascript">

        $(document).on('blur','#book_id',function(){
            if($(this).val()) getBookDetails($(this).val());
            $('#mem_id').focus();
        });

        $(document).on('blur','#mem_id',function(){
            if($(this).val()) getMemberDetails($(this).val());
        });

        var getBookDetails = function(book_id){
            $.ajax({
                url: 'controller/get_book_details.php',
                type: 'post',
                data: {book_id: book_id},
                success: function(response){
                    if(response){
                        response = jQuery.parseJSON(response);
                        $('#book_name').val(response.bookname);
                        $('#book_author').val(response.author);
                    } else {
                        body = document.getElementById('book_id_label');
                        writeError('Invalid Book Id',body);
                        $('#book_id').focus();
                    }
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            });
        }

        var getMemberDetails = function(member_id){
            $.ajax({
                url: 'controller/get_member_details.php',
                type: 'post',
                data: {member_id: member_id},
                success: function(response){
                    if(response) {
                        response = jQuery.parseJSON(response);
                        console.log(response);
                        $('#member_name').val(response.name);
                        $('#member_type').val(response.type);
                        //Prefill the issue and return dates
                        $('#issue_date').val(dateFormat());
                        var return_date = dateFormat(null,Date.today().addDays(response.book_limit));
                        $('#return_date').val(return_date);
                    } else {
                        body = document.getElementById('mem_id_label');
                        writeError('Invalid Member Id',body);
                    }
                },
                error: function(xhr, desc, err){
                    console.log(desc);
                }
            });
        }

        var submitForm = function() {
            var validation_message;
            
            var add_book = [
                { type : 'text' , value: $('#book_id').val() , errorMessage:'Book_id is required' }, 
                { type:'text' , value: $('#mem_id').val() , errorMessage:'Member id is required' }
            ];
            
            validation_message = validateForm(add_book); 

            var issue_book = {
                book_id: $('#book_id').val(),
                mem_id: $('#mem_id').val(),
                issue_date: dateFormat('yyyy-mm-dd',$('#issue_date').val()),
                return_date: dateFormat('yyyy-mm-dd',$('#return_date').val())
            };

            if(submitToServer(validation_message)){
                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: issue_book,
                    success: function(response){
                        alert(response);
                        window.location.href = 'http://localhost/uxr_library/code/our-library.php';
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            }else{
                body = document.getElementById('book_id_label');
                writeError(validation_message[0],body);
                body = document.getElementById('mem_id_label');
                writeError('Invalid Member Id',body);
            }
            return false;
        }
    </script> 
</body>
</html>
<?php 
}else {
    header("Location: login.php");
}

?>
