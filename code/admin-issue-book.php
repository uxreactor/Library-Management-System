<?php include ("header-admin.php");?> 
    <!--/#header-->
    <div class="container">
        <h2>Issue a book</h2>
        <form name="login" method="post" action="controller/submit_issue_book.php" onsubmit="return submitForm();">
            <div class="form-group" id="book_id_label">
                <label >Book Id</label>
                <input type="number" class="form-control" id="book_id" />
                <span></span>
            </div>
            <div class="form-group" id="mem_id_label">
                <label >Member Id</label>
                <input type="number" class="form-control" id="mem_id" />
                <span></span>
            </div>
            <div class="form-group" id="issue_date_label">
                <label >Issue date</label>
                <input type="date" class="form-control" id="issue_date" />
                <span></span>
            </div>
            <div class="form-group" id="return_date_label">
                <label >Return date</label>
                <input type="date" class="form-control" id="return_date" />
                <span></span>
            </div>
            <button type="submit" class="btn btn-default btn-lg btn-info">Submit</button>
            <a href="our-library.html" style="font-size:18px; padding-left:15px"> <u> Cancel </u></a>
        </form>
    </div>
    <?php include ("footer.php");?> 
    <!--/#footer-->
    <?php include ("javascript-links.php");?>  
    <script type="text/javascript">
        $(function () {
                      //$('#myTab li:eq(1) a').tab('show');
        });

        var submitForm = function() {
            var validation_message;
            var add_book = [{ type : 'text' , value: $('#book_id').val() , errorMessage:'Book_id is required' }, 
            { type:'text' , value: $('#mem_id').val() , errorMessage:'Member id is required' },
            { type:'date' , value: $('#issue_date').val() , errorMessage:'Issue date is required' },
            { type:'date' , value: $('#return_date').val() , errorMessage:'Return date is required' }];    
            validation_message = validateForm (add_book );  
            var issue_book = {book_id: $('#book_id').val(),mem_id: $('#mem_id').val(),issue_date: $('#issue_date').val(),return_date: $('#return_date').val()};
             if(submitToServer(validation_message)){
                $.ajax({
                    url: $('form').attr('action'),
                    type: $('form').attr('method'),
                    data: issue_book,
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, desc, err){
                        console.log(desc);
                    }
                });
            }else{
                body = document.getElementById('book_id_label');
                writeError(validation_message[0],body);
                body = document.getElementById('mem_id_label');
                writeError(validation_message[1],body);
                body = document.getElementById('issue_date_label');
                writeError(validation_message[2],body);
                body = document.getElementById('return_date_label');
                writeError(validation_message[3],body);
                return false;
            }
            return false;
        }
    </script> 
</body>
</html>
