<?php
	/**
	 * @connection : This function is used to connect to the database.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : It will make connection from localsystem to database.
	 */
	function connection() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "uxr_library";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		return $conn;
	}
	/**
	 * @addNewBook : This function will add a new book in the database, where the details of book will be given by admin. The details are appended
	 * in the database. The isbn and bookid will be stored in tbl_all_books table and rest of all details are stot=red in the tbl_book_varities table to reduce the redundense data
	 * @author : Mohan, Bala
	 *
	 * @param : integer - isbn
	 * @param : integer - price
	 * @param : integer - edition
	 * @param : string - publilsher
	 * @param : string - bookname
	 * @param : string - category
	 * @param : string - authorname
	 * @param : integer - quantity  
	 *
	 * @return/outcome : Adds the newbook into the database.
	 */
	function addNewBook($isbn,$price,$edition,$publisher,$category,$bookname,$authorname,$quantity){			

		$conn = connection();

		//$sql = "INSERT INTO sampleTable (id, name, date) VALUES ($id, '$name', CURDATE())";
		for($i=1;$i<=$quantity;$i++){
			$sql = " INSERT INTO  tbl_all_books (isbn) VALUES ('$isbn') ";
			if ($conn->query($sql) == TRUE) {
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$sql = " SELECT isbn FROM tbl_book_varities WHERE isbn ='$isbn' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			}else{
				$sql = "INSERT INTO  tbl_book_varities (isbn,price,edition,publisher,category,book_name,author_name) VALUES ('$isbn','$price','$edition','$publisher','$category','$bookname','$authorname')";	
				if ($conn->query($sql) == TRUE) {
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}
		$conn->close();
	}


	/**
	 * @login : This function will check the details in the database and if the details are matched then it allows to login else it just displays an error message.
	 * @author : Mohan, Bala
	 *
	 * @param : string - username
	 * @param : password - password
	 *
	 * @return/outcome : It will returns 1 if the data is valid else returns 0.
	 */
	function login($username,$password){
		$conn = connection();
		$sql = " SELECT username , password FROM tbl_login WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
			 echo "Login Successfull"; // return value
		}else{
			echo "0"; // return value
		}
		$conn->close();
	}


	/**
	 * @checkCategoryExists : This function will check the category in the database and if it exists displays an error else allows user to continue.
	 * @author : Mohan, Bala
	 *
	 * @param : string - category_name
	 *
	 * @return/outcome : It will return 1 if the category is valid else it returns 0.
	 */
	function checkCategoryExists($category_name){
		$conn = connection();
		$sql = " SELECT category FROM tbl_book_varities WHERE category='$category_name' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
			 echo "1"; // return value
		}else{
			echo "0"; // return value
		}

		$conn->close();
	}



	/**
	 * @editBookDetails : This function will edit the details of the book and replace the details in the same location in database using with old_isbn number.
	 * @author : Mohan, Bala
	 *
	 * @param : integer - old_isbn
	 * @param : integer - isbn
	 * @param : integer - price
	 * @param : integer - edition
	 * @param : string - publilsher
	 * @param : string - bookname
	 * @param : string - category
	 * @param : string - authorname
	 *
	 * @return/outcome : It will replace the data into the database.
	 */
	function editBookDetails($old_isbn,$isbn,$price,$edition,$publisher,$category,$bookname,$authorname){
		$conn = connection();

		$sql = " UPDATE tbl_all_books SET isbn='$isbn'  WHERE isbn='$old_isbn' ";
		if ($conn->query($sql) === TRUE) {
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$sql = " UPDATE tbl_book_varities SET isbn = '$isbn' , price = '$price' , edition = '$edition' , publisher = '$publisher', category = '$category',
				book_name = '$bookname' , author_name = '$authorname' WHERE isbn ='$old_isbn' ";
		if ($conn->query($sql) === TRUE) {
		    echo "Book details updated successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	
	}


	/**
	 * @loadAllBooks : This function will display all the records of books from the database to the respective page it displays all the dettails of book along with count of the book.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : Returns a json object where it consists all the records of books.
	 */
	function loadAllBooks(){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT * FROM tbl_book_varities " ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {		// Used to fetch the data from database.    	
		    	$isbn = $row["isbn"];
		    	$sql = " SELECT COUNT(isbn) FROM tbl_all_books WHERE isbn ='$isbn' ";
		    	$result_isbn = $conn->query($sql);
		    	$row_isbn = $result_isbn->fetch_assoc();
				$object = array();
		    	$object['isbn'] = $row["isbn"];
		    	$object['price'] = $row["price"];
		    	$object['edition'] = $row["edition"];
		    	$object['publisher'] = $row["publisher"];
		    	$object['category'] = $row["category"];
		    	$object['book_name'] = $row["book_name"];
		    	$object['author_name'] = $row["author_name"];
		    	$object['book_quantity'] = $row_isbn["COUNT(isbn)"];
		    	$object['action'] = "edit,delete";

		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results"; 
		}

		$conn->close();
		print_r(json_encode($arrayObject)); //return value
	}


	/**
	 * @loadAllMembers : This function will display all the records of members from the database to the respective page.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : Returns a json object where it consists all the records of memberes.
	 */
	function loadAllMembers(){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT * FROM tbl_members " ;
		//$result = mysql_query("$sql");
		//print_r($result);
		//header("Content-type: image/jpeg");
		//echo mysql_result($result, 0);
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row

		    while($row = $result->fetch_assoc()) {  // Used to fetch the data from database.    
		    	$object = array();
		    	$object['mem_id'] = $row["mem_id"];
		    	$object['mem_name'] = $row["mem_name"];
		    	$object['mem_moblieno'] = $row["mem_moblieno"];
		    	$object['mem_email'] = $row["mem_email"];
		    	$object['mem_dob'] = $row["mem_dob"];
		    	$object['mem_gender'] = $row["mem_gender"];
		    	//header("Content-type: image/jpeg");
		    	//$object['mem_photo'] = $row["mem_photo"];
		    	//$object['mem_add_proof'] = $row["mem_add_proof"];
		    	//echo $object['mem_photo'];
		    	$object['ms_id'] = $row["ms_id"];
		    	$object['membership_on'] = $row["membership_on"];
		    	$object['expiry_on'] = $row["expiry_on"];
		    	$object['addr_hno'] = $row["addr_hno"];
		    	$object['addr_street'] = $row["addr_street"];
		    	$object['addr_city'] = $row["addr_city"];
		    	$object['addr_state'] = $row["addr_state"];
		    	$object['addr_pincode'] = $row["addr_pincode"];
				$object['action'] = "edit,delete";
		    	array_push($arrayObject, $object);
		    } 
		} else {
		    echo "0 results";
		}

		$conn->close();
		print_r(json_encode($arrayObject)); //return value
	}


	/**
	 * @searchForBook : This function will search for a particular book based on the users criteria.
	 * @author : Mohan, Bala
	 *
	 * @param : string - search_key
	 *
	 * @return/outcome : Returns a json object where it consists the record of particular book.
	 */
	function searchForBook($search_key){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT * FROM tbl_book_varities WHERE book_name LIKE '$search_key%' || author_name LIKE '$search_key%' || category LIKE '$search_key%'" ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {		    	
		    	$isbn = $row["isbn"];
		    	$sql = " SELECT COUNT(isbn) FROM tbl_all_books WHERE isbn ='$isbn' ";
		    	$result_isbn = $conn->query($sql);
		    	$row_isbn = $result_isbn->fetch_assoc();
				$object = array();
		    	$object['isbn'] = $row["isbn"];
		    	$object['price'] = $row["price"];
		    	$object['edition'] = $row["edition"];
		    	$object['publisher'] = $row["publisher"];
		    	$object['category'] = $row["category"];
		    	$object['book_name'] = $row["book_name"];
		    	$object['author_name'] = $row["author_name"];
		    	$object['book_quantity'] = $row_isbn["COUNT(isbn)"];
		    	$object['action'] = "edit,delete";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results"; 
		}

		$conn->close();
		print_r(json_encode($arrayObject)); //return value
	}


	/**
	 * @searchForMember : This function will search for a particular member based on the users criteria.
	 * @author : Mohan, Bala
	 *
	 * @param : string - search_key
	 *
	 * @return/outcome : Returns a json object where it consists the record of particular member.
	 */
	function searchForMember($search_key){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT * FROM tbl_members WHERE mem_id LIKE '$search_key%' || mem_name LIKE '$search_key%' " ;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['mem_id'] = $row["mem_id"];
		    	$object['mem_name'] = $row["mem_name"];
		    	$object['mem_moblieno'] = $row["mem_moblieno"];
		    	$object['mem_email'] = $row["mem_email"];
		    	$object['mem_dob'] = $row["mem_dob"];
		    	$object['mem_gender'] = $row["mem_gender"];
		    	//$object['mem_photo'] = $row["mem_photo"];
		    	//$object['mem_add_proof'] = $row["mem_add_proof"];
		    	$object['ms_id'] = $row["ms_id"];
		    	$object['membership_on'] = $row["membership_on"];
		    	$object['expiry_on'] = $row["expiry_on"];
		    	$object['addr_hno'] = $row["addr_hno"];
		    	$object['addr_street'] = $row["addr_street"];
		    	$object['addr_city'] = $row["addr_city"];
		    	$object['addr_state'] = $row["addr_state"];
		    	$object['addr_pincode'] = $row["addr_pincode"];
		    	$object['action'] = "edit,delete";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		print_r(json_encode($arrayObject)); // return
	}


	/**
	 * @editMembershipDetails : This function will edit the membership details and replaces the details in their previous locations.
	 * @author : Mohan, Bala
	 *
	 * @param : integer - mem_id
	 * @param : string - mem_name
	 * @param : integer - mem_moblieno
	 * @param : email - mem_email
	 * @param : date - mem_dob
	 * @param : string - mem_gender
	 * @param : string - mem_photo
	 * @param : string - mem_add_proof
	 * @param : integer - ms_id
	 * @param : date - membership_on
	 * @param : date - expiry_on
	 * @param : string - addr_hno
	 * @param : string - addr_street
	 * @param : string - addr_city
	 * @param : string - addr_state
	 * @param : integer - addr_pincode
	 *
	 * @return/outcome : It will saves the data in the database.
	 */
	function editMembershipDetails($mem_id , $mem_name , $mem_moblieno , $mem_email , $mem_dob , $mem_gender , $mem_photo , $mem_add_proof , $ms_id , $membership_on , $expiry_on , $addr_hno , $addr_street , $addr_city , $addr_state , $addr_pincode){
		$conn = connection();

		//$sql = "INSERT INTO sampleTable (id, name, date) VALUES ($id, '$name', CURDATE())";
		$sql = "UPDATE tbl_members SET mem_name = '$mem_name' , mem_moblieno = '$mem_moblieno' , mem_email = '$mem_email' , mem_dob = '$mem_dob' ,
		mem_gender = '$mem_gender' , mem_photo = '$mem_photo' ,mem_add_proof = '$mem_add_proof', ms_id = '$ms_id' ,
		membership_on = '$membership_on' , expiry_on = '$expiry_on' , addr_hno = '$addr_hno' , addr_street = '$addr_street' ,
		addr_city = '$addr_city' , addr_state = '$addr_state' , addr_pincode = '$addr_pincode' WHERE mem_id='$mem_id' ";

		if ($conn->query($sql) === TRUE) {
		    echo "Member details updated successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	
	}


		/**
	 * @requestingMembership : This function will takes the membership details and saves in the database.
	 * @author : Mohan, Bala
	 *
	 * @param : string - name
	 * @param : string - phoneNumber
	 * @param : email - emailId
	 * @param : string - MembershipType 
	 * @param : address - address
	 * @param : string - photos
	 * @param : string - addressProof
	 *
	 * @return/outcome : It will saves the data in the database.
	 */
	function requestingMembership($name, $phoneNumber, $emailId, $dob, $gender, $membershipType, $hNo, $street, $place, $city, $zip, $photos, $addressProof){
		$conn = connection();
		if($membershipType == "Platinum"){
			$membershipId = 1;
		}elseif ($membershipType == "Gold") {
			$membershipId = 2;
		}else{
			$membershipId = 3;
		}

		$sql = "INSERT INTO tbl_mem_request (mem_name, mem_mobileno, mem_email, mem_dob, mem_gender, mem_photo, mem_add_Proof, addr_hNo, addr_street, addr_city, addr_state, addr_pincode,  ms_id) VALUES ('$name', '$phoneNumber', '$emailId','$dob', '$gender', '$photos', '$addressProof', '$hNo', '$street', '$place', '$city', '$zip', '$membershipId')";
		if ($conn->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
	}

	/**
	 * @requestingMembershipRenewal : This function will takes renewal details and saves in the databaase.
	 * @author : Mohan, Bala
	 *
	 * @param : string - MemberId
	 * @param : string - MembershipType
	 *
	 * @return/outcome : It will save and extend the membership in the database.
	 */
	function requestingMembershipRenewal($memberid, $membershipType){
		$conn = connection();
		if ($membershipType == "Platinum"){
			$memberhipid = 1;
		}elseif($membershipType == "Gold"){
			$membershipid = 2;
		}else{
			$membershipid = 3;
		}

		$sql = "INSERT INTO tbl_membership_renewal_request (mem_id) VALUES ('$memberid') ";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	}


	/**
	 * @requestingForNewBook : This function will take the details of the requested book and save details in the database.
	 * @author : Mohan, Bala
	 *
	 * @param : string - bookName
	 * @param : string - authorName
	 * @param : string - edition
	 *
	 * @return/outcome : It will save the data in the databse.
	 */
	function requestingForNewBook($bookName, $authorName, $edition){
		$conn = connection();
		$sql_select = "SELECT  * FROM tbl_new_book_request where book_name='$bookName' AND edition = $edition";
		$result = $conn->query($sql_select);
		//echo "number of rows";
		//print_r($result->num_rows);
		//echo "<br/>";
		if ($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$reqNumber = $row["requests"]+1;
			//echo $reqNumber;
			$sql_update = "UPDATE tbl_new_book_request SET requests='$reqNumber' WHERE book_name = '$bookName' AND edition = '$edition' ";
			if ($conn->query($sql_update) === FALSE) {
		    echo "Error: " . $sql_update . "<br>" . $conn->error;
			} else{
				//echo "Requset updated sucessfully";
			}
		}else {
			$sql = "INSERT INTO tbl_new_book_request (book_name, author_name,edition,requests) VALUES ('$bookName', '$authorName', '$edition', '1')";
			if ($conn->query($sql) === FALSE) {
		    echo "Error: " . $sql . "<br>" . $conn->error;
			} else{
				echo "New request added sucessfully";
			}
		}
		
		if ($conn->query($sql_select) === FALSE) {
		    echo "Error: " . $sql_select . "<br>" . $conn->error;
		}
		
		$conn->close();
	}


	/**
	 * @requestingForDueDateExtension : This function will take the due date extension details.
	 * @author : Mohan, Bala
	 *
	 * @param : string - MemberId
	 * @param : string - bookId
	 * @param : string - extensionDays
	 *
	 * @return/outcome : It will save and update the due date in the database.
		 */
	function requestingForDueDateExtension($memberid, $bookid, $extensiondays){
		$conn = connection();
		//$sql = " SELECT ms_id FROM tbl_members WHERE mem_id = '$memberid' ";
		$sql = "SELECT book_id FROM due_date_extension WHERE book_id = $bookid  ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			echo "You have already requsted for duedate extension";
		}else{
			$sql = "INSERT INTO due_date_extension (mem_id, book_id, extension_days) VALUES ('$memberid',$bookid, $extensiondays)";

			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

		
			$conn->close();
		}
		


		
	}


	/**
	 * @approveMembership : This function is used to approve the membership requests and append the new entry in the database.
	 * @author : Mohan, Bala
	 *
	 * @param : string - name
	 * @param : string - phoneNumber
	 * @param : email - emailId
	 * @param : string - MembershipType 
	 * @param : address - address
	 * @param : string - photos
	 * @param : string - addressProof
	 *
	 * @return/outcome : It will save the new membership details in the database.
	 */
	function approveMembership($emailId){
		$conn = connection();
		$object = array();
		$sql = "SELECT * FROM tbl_mem_request where mem_email='$emailId'";
		$result = $conn->query($sql);
		//print_r($result);
		if ($result->num_rows > 0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
		    $object[0] = $row["mem_name"];
		    $object[1] = $row["mem_mobileno"];
		    $object[2] = $row["mem_email"];
		    $object[3] = $row["mem_dob"];
		    $object[4] = $row["mem_gender"];
		    $object[5] = $row["mem_photo"];
		    $object[6] = $row["mem_add_proof"];
		    $object[7] = $row["addr_hno"];
		    $object[8] = $row["addr_street"];
		    $object[9] = $row["addr_city"];
		    $object[10] = $row["addr_state"];
		    $object[11] = $row["addr_pincode"];
		    $object[12] = $row["ms_id"];
		    $object[13] = date("Y-m-d");
		    // echo $object[13];
		    //echo date('Y-m-d', strtotime("+12 months", strtotime($object[13])));;
		    if($object[12] == 1){
				$object[14] = date('Y-m-d', strtotime("+12 months", strtotime($object[13])));
			}elseif ($object[12] == 2) {
				$object[14] = date('Y-m-d', strtotime("+6 months", strtotime($object[13])));
			}else{
				$object[14] = date('Y-m-d', strtotime("+3 months", strtotime($object[13])));
			}
		    $sql = "INSERT INTO tbl_members (mem_name, mem_moblieno, mem_email, mem_dob, mem_gender, mem_photo, mem_add_proof, ms_id, membership_on, expiry_on, addr_hno, addr_street, addr_city, addr_state, addr_pincode) VALUES ('$object[0]', '$object[1]', '$object[2]', '$object[3]', '$object[4]', '$object[5]', '$object[6]', '$object[12]', '$object[13]', '$object[14]', '$object[7]', '$object[8]', '$object[9]', '$object[10]', '$object[11]' )";
		if ($conn->query($sql) === FALSE) {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		} else {
		    echo "0 results";
		}
		$sql = "DELETE FROM tbl_mem_request WHERE mem_email='$emailId'";
		if ($conn->query($sql) === FALSE) {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}


	/**
	 * @viewNewBookRequests : This function is used to display the books which are requesterd by the users.
	 * @author : Mohan, Bala
	 *
	 * @param : string - bookName
	 * @param : string - authorName(optional)
	 * @param : string - memberId
	 * @param : string - memberName
	 *
	 * @return/outcome : It will display all the requests for new book.
	 */
	function viewNewBookRequests(){
		$arrayObject = array();
		$conn = connection();
		$sql = "SELECT * FROM tbl_new_book_request";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['book_name'] = $row["book_name"];
		    	$object['author_name'] = $row["author_name"];
		    	$object['edition'] = $row["edition"];
		    	$object['requests'] = $row["requests"];
		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		print_r(json_encode($arrayObject)); //return value


	}


	/**
	 * @approveDueDateExtension : This function is used approve the requests of due date extension and replace the updated due date in database.
	 * @author : Mohan, Bala
	 *
	 * @param : string - memberId
	 * @param : string - bookId
	 * @param : string - returnDate
	 * @param : string - extensionDays
	 *
	 * @return/outcome : If the extension is approved it will save the updated extension date else it will reject.
	 */
	function approveDueDateExtension($memberid, $bookid){
		$conn = connection();
		$sql = " SELECT return_expected FROM tbl_issued_books WHERE mem_id = '$memberid' AND book_id = '$bookid' ";
		$result = $conn->query($sql);
		
        if ($result->num_rows > 0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
	    	$returndate = $row["return_expected"];
		} else {
		    echo "0 results";
		}
		$sql = " SELECT extension_days FROM due_date_extension WHERE mem_id = '$memberid' AND book_id = '$bookid' ";
		$result = $conn->query($sql);
		
        if ($result->num_rows > 0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
	    	$extension = $row["extension_days"];
		} else {
		    echo "0 results";
		}

		$date = date('Y-m-d', strtotime("+$extension days", strtotime($returndate)));
		$sql = "UPDATE tbl_issued_books SET return_expected = '$date'  WHERE mem_id = '$memberid' AND book_id = '$bookid' ";
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}


	/**
	 * @approveMembershipRenewal : This function is used approve the membership validity extension.
	 * @author : Mohan, Bala
	 *
	 * @param : string - memberId
	 * @param : string - memberName
	 * @param : string - extensionType
	 *
	 * @return/outcome : If the extension is approved it will save the updated extion date else it will remain same.
	 */
		function approveMembershipRenewal($memId,$extensionType){
		$conn = connection();
		$sql = "SELECT * FROM tbl_members where mem_id='$memId'";
		$result = $conn->query($sql);
		//print_r($result);
		if ($result->num_rows > 0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
		    $expiry = $row["expiry_on"];

		}else {
			echo "0 Results";
		}
		if($extensionType == "Platinum"){
			$membershipId = 1;
			$expiry = date('Y-m-d', strtotime("+12 months", strtotime($expiry)));
		}elseif ($extensionType == "Gold") {
			$membershipId = 2;
			$expiry = date('Y-m-d', strtotime("+6 months", strtotime($expiry)));
		}else{
			$membershipId = 3;
			$expiry = date('Y-m-d', strtotime("+3 months", strtotime($expiry)));
		}

		$sql = "UPDATE tbl_members SET expiry_on = '$expiry' WHERE mem_id='$memId'";
		$sql = "DELETE FROM tbl_membership_renewal_request WHERE mem_id='$memId'";
		if ($conn->query($sql) === FALSE) {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}


	/**
	 * @issueBook : This function is used to issue a book to the member and also it consists local variable for current date and returning.
	 * current date is taken from the system and returning date is taken from the profile.
	 * @author : Mohan, Bala
	 *
	 * @param : string - memberId
	 * @param : string - bookId
	 *
	 * @return/outcome : The data is saved in the issued books.
	 */
	function issueBook($memberId, $bookId, $issuedDate, $returnDate){
		$conn = connection();
		//$sql = "INSERT INTO sampleTable (id, name, date) VALUES ($id, '$name', CURDATE())";
		$sql = "SELECT book_id FROM tbl_issued_books WHERE book_id = $bookId  ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			echo "You have already issued this book";
		}else{
			$sql = "INSERT INTO tbl_issued_books ( mem_id, book_id, issue_date,return_expected ) VALUES ( '$memberId', '$bookId', '$issuedDate', '$returnDate')";
			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			$conn->close();
		}

	}


	/**
	 * @returningBook : This function is used to update the status of issued books.
	 * @author : Mohan, Bala
	 *
	 * @param : string - memberId
	 *
	 * @return/outcome : The data is removed in the issued books.
	 */
	function returningBook($bookId){
		$conn = connection();
		$return_actual = date('Y-m-d');
		$sql = "UPDATE tbl_issued_books SET return_actual = '$return_actual'  WHERE book_id = '$bookId' ";
		if ($conn->query($sql) === FALSE) {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$sql = "SELECT * FROM tbl_issued_books where book_id = '$bookId'";
		$result = $conn->query($sql);
		//print_r($result);
		if ($result->num_rows > 0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
		    $return_expected = $row["return_expected"];

		}else {
			echo "0 Results";
		}
		$diff = 0;
		$return_actual_new = new DateTime($return_actual);
		$return_expected_new = new DateTime($return_expected);
		$diff = $return_actual_new->diff($return_expected_new)->format("%a");
		if($return_actual_new > $return_expected_new){
		  	$penality = $diff*10;
		  	$sql = "UPDATE tbl_issued_books SET penality = '$penality'  WHERE book_id = '$bookId' ";
		  	$result = $conn->query($sql);
			return 0;
		}else {
			$sql = "DELETE FROM tbl_issued_books WHERE book_id = '$bookId'";
		}
		
		if ($conn->query($sql) === FALSE) {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

	}


		/**
	 * @viewNewBookRequests : This function is used to display the membership requests which are requesterd from the users.
	 * @author : Mohan, Bala
	 *
	 *
	 * @return/outcome : It will display all the requests for new book.
	 */
	function viewMembershipRequests(){
		$arrayObject = array();
		$conn = connection();
		$sql = "SELECT * FROM tbl_mem_request";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['mem_name'] = $row["mem_name"];
		    	$object['mem_mobileno'] = $row["mem_mobileno"];
		    	$object['mem_email'] = $row["mem_email"];
		    	$object['mem_gender'] = $row["mem_gender"];
		    	$object['mem_photo'] = $row["mem_photo"];
		    	$object['mem_add_proof'] = $row["mem_add_proof"];
		    	$object['addr_hno'] = $row["addr_hno"];
		    	$object['addr_street'] = $row["addr_street"];
		    	$object['addr_city'] = $row["addr_city"];
		    	$object['addr_state'] = $row["addr_state"];
		    	$object['addr_pincode'] = $row["addr_pincode"];
		    	$object['ms_id'] = $row["ms_id"];
		    	$object['action'] ="approve,reject";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		print_r(json_encode($arrayObject)); //return value


	}


/**
	 * @loadAllBooks : This function is used to display the membership renewal requests which are requesterd from the users.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : Returns a json object where it consists all the records of books.
	 */
	function viewMembershipRenewalRequests(){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT * FROM tbl_membership_renewal_request " ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {		// Used to fetch the data from database.    	
		    	$mem_id = $row["mem_id"];
		    	$sql = " SELECT * FROM tbl_members WHERE mem_id ='$mem_id' ";
		    	$result = $conn->query($sql);
		    	$row_mem_id = $result->fetch_assoc();
				$object = array();
		    	$object['mem_id'] = $row_mem_id["mem_id"];
		    	$object['mem_name'] = $row_mem_id["mem_name"];
		    	$object['expiry_on'] = $row_mem_id["expiry_on"];
		    	$object['ms_id'] = $row_mem_id["ms_id"];
		    	$object['action'] = "approve,reject";

		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results"; 
		}

		$conn->close();
		print_r(json_encode($arrayObject)); //return value
	}


		/**
	 * @viewNewBookRequests : This function is used to display the issued book details .
	 * @author : Mohan, Bala
	 *
	 *
	 * @return/outcome : It will display all the requests for new book.
	 */
	function viewIssuedBooks(){
		$arrayObject = array();
		$conn = connection();
		$sql = "SELECT * FROM tbl_issued_books";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['book_id'] = $row["book_id"];
		    	$object['mem_id'] = $row["mem_id"];
		    	$object['issue_date'] = $row["issue_date"];
		    	$object['return_expected'] = $row["return_expected"];
		    	$object['return_actual'] = $row["return_actual"];
		    	$object['penality'] = $row["penality"];
		    	$object['action'] ="return";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		print_r(json_encode($arrayObject)); //return value


	}


			/**
	 * @viewNewBookRequests : This function is used to display the issued book details .
	 * @author : Mohan, Bala
	 *
	 *
	 * @return/outcome : It will display all the requests for new book.
	 */
	function viewDueDateExtensions(){
		$arrayObject = array();
		$conn = connection();
		$sql = "SELECT * FROM due_date_extension";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['book_id'] = $row["book_id"];
		    	$object['mem_id'] = $row["mem_id"];
		    	$object['extension_days'] = $row["extension_days"];
		    	$object['action'] ="approve,reject";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		print_r(json_encode($arrayObject)); //return value


	}

?>