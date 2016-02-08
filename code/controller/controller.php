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
	 * in the database. The isbn and bookid will be stored in tbl_all_books table and rest of all details are stored in the tbl_book_varities table to reduce the redundense data
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
	 * @return/outcome : Adds the newbook into the database and returns a string with successful message.
	 */

	function addNewBook($isbn,$price,$edition,$publisher,$category,$bookname,$authorname,$quantity){			

		$conn = connection();
		$sql  =" INSERT INTO `tbl_book_varities`(`isbn`, `price`, `edition`, `publisher`,`category`,`book_name`,`author_name`) SELECT * FROM (SELECT '$isbn','$price','$edition','$publisher','$category','$bookname','$authorname') AS tmp WHERE NOT EXISTS (SELECT `book_name`,`isbn` FROM `tbl_book_varities` WHERE `book_name` = '$bookname' AND `isbn` = '$isbn') ";
		if ($conn->query($sql) === TRUE) {
			$sql = "INSERT INTO  tbl_all_books (isbn) VALUES ";
				for($i=1;$i<=$quantity;$i++){
					$sql .= $i==$quantity ? "('$isbn')" : "('$isbn'), ";
				}
				if ($conn->query($sql) == TRUE) {
					return 1;
				} else {
					return "Error: " . $sql . "<br>" . $conn->error;
				}
		}else{
			return "Error: " . $sql . "<br>" . $conn->error;
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
		$sql = " SELECT a.username, a.password, b.mem_id FROM tbl_login a JOIN tbl_members b WHERE a.username = '$username' AND a.password ='$password' AND b.mem_email ='$username' ";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
    		$row = $result->fetch_assoc();
    		$returnVal = $row["mem_id"];
    		return $returnVal; // return value
		}else{
			return 0; // return value
		}
		$conn->close();
	}



	/**
	 * @adminLogin : This function will check the details of the admin in the database and if the details are matched then it allows to login else it just displays an error message.
	 * @author : Prabhakar
	 *
	 * @param : string - username
	 * @param : password - password
	 *
	 * @return/outcome : It will returns 1 if the data is valid else returns 0.
	 */
	function adminLogin($username,$password){
		$conn = connection();
		$sql = " SELECT * FROM tbl_admin_login WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
			 return 1; // return value
		}else{
			return 0; // return value
		}
		$conn->close();
	}


	/**
	 * @adminForgotPassword : This function will checks whether the email is exists or not
	 * @author : Prabhakar
	 *
	 * @param : string - email id.
	 *
	 * @return/outcome : It will returns email if the data is valid else returns false.
	 */
	function adminForgotPassword($email){
		$conn = connection();
		$sql = " SELECT username FROM tbl_admin_login WHERE username = '$email'";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
        	return $email; // return value
		}else{
			return 0; // return value
		}
		$conn->close();
	}

	/**
	 * @userForgotPassword : This function will checks whether the email is exists or not
	 * @author : Prabhakar
	 *
	 * @param : string - email id.
	 *
	 * @return/outcome : It will returns email if the data is valid else returns false.
	 */
	function userForgotPassword($email){
		$conn = connection();
		$sql = " SELECT username FROM tbl_login WHERE username = '$email'";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
        	return $email; // return value
		}else{
			return 0; // return value
		}
		$conn->close();
	}


	/**
	 * @memberForgotPassword : This function will checks whether the emeil is exists or not
	 * @author : Prabhakar
	 *
	 * @param : string - email id.
	 *
	 * @return/outcome : It will returns 1 if the data is valid else returns 0.
	 */
	function memberForgotPassword($email){
		$conn = connection();
		$sql = " SELECT username FROM tbl_login WHERE username = '$email'";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
        	return $email; // return value
		}else{
			return 0; // return value
		}
		$conn->close();
	}


	/**
	 * @updatePassword : This function will update the password against the matched email id.
	 * @author : Prabhakar,Anurag
	 *
	 * @param : string - email
	 * @param : string - password
	 *
	 * @return/outcome : It will update the password record in the table tbl_admmin_login.
	 */

	function updatePassword($email,$password){
		$conn = connection();
		$sql = "UPDATE tbl_admin_login SET password='$password' WHERE username = '$email'";
		if ($conn->query($sql) === TRUE) {
			echo  $email.$password;
			return 1;
		}else{
			return 0;
		}
		
		$conn->close();
	}

	/**
	 * @updatePassword : This function will update the password against the matched email id.
	 * @author : Prabhakar,Anurag
	 *
	 * @param : string - email
	 * @param : string - password
	 *
	 * @return/outcome : It will update the password record in the table tbl_login.
	 */

	function updatePasswordUser($email,$password){
		$conn = connection();
		$sql = "UPDATE tbl_login SET password='$password' WHERE username = '$email'";
		if ($conn->query($sql) === TRUE) {
			echo  $email.$password;
			return 1;
		}else{
			return 0;
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
			 return 1; // return value
		}else{
			return 0; // return value
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

	function editBookDetails($old_isbn,$isbn,$price,$edition,$publisher,$category,$bookname,$authorname,$quantity){
		$conn = connection();

		$sql = " UPDATE tbl_all_books a JOIN tbl_book_varities b SET a.isbn='$isbn', b.isbn = '$isbn' , b.price = '$price' , b.edition = '$edition' , b.publisher = '$publisher', b.category = '$category', b.book_name = '$bookname' , b.author_name = '$authorname'  WHERE b.isbn='$old_isbn' AND b.isbn=a.isbn ";
		if ($conn->query($sql) === TRUE) {
		    return "Book details updated successfully";
		} else {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	
	}


	/**
	 * @loadAllBooks : This function will display all the records of books from the database to the respective page it displays all the dettails of book along with count of the book.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : Returns a json arrayobject where it consists all the records of books.
	 */
	function loadAllBooks(){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT a.`book_name` AS 'Book Name', a.`author_name` AS 'Author Name', a.`category` AS 'Category', a.`publisher` AS 'Publisher', a.`edition` AS 'Edition', a.`price` AS 'Book Price', a.`isbn` AS 'ISBN Number', COUNT(b.`isbn`) AS 'Qty' FROM `tbl_book_varities` a LEFT JOIN `tbl_all_books` b on a.`isbn` = b.`isbn` GROUP BY b.`isbn` " ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {		// Used to fetch the data from database.    	
		    	$result_isbn = $conn->query($sql);
		    	$row_isbn = $result_isbn->fetch_assoc();
				$object = array();
		    	$object['ISBN'] = $row["ISBN Number"];
		    	$object['Book name'] = $row["Book Name"];
		    	$object['Author name'] = $row["Author Name"];
		    	$object['Edition'] = $row["Edition"];
		    	$object['Publisher'] = $row["Publisher"];
		    	$object['Category'] = $row["Category"];
		        $object['Price'] = $row["Book Price"];
		    	$object['Quantity'] = $row["Qty"];
		    	$object['Action'] = "Edit,Delete";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return 0; 
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value
	}

	/**
	 * @loadAllMembers : This function will display all the records of members from the database to the respective page.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : Returns a json arrayobject where it consists all the records of memberes.
	 */
	function loadAllMembers(){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT * FROM tbl_members " ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row

		    while($row = $result->fetch_assoc()) {  // Used to fetch the data from database.    
		    	$object = array();
		    	$object['Member ID'] = $row["mem_id"];
		    	$object['Member Name'] = $row["mem_name"];
		    	$object['Validity'] = $row["expiry_on"];
		    	$object['Phone No.'] = $row["mem_moblieno"];
		    	$object['Mail ID'] = $row["mem_email"];
				$object['Action'] = "Edit,Delete";
		    	array_push($arrayObject, $object);
		    } 
		} else {
		    return false;
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value
	}


	/**
	 * @searchForBook : This function will search for a particular book based on the users criteria.
	 * @author : Mohan, Bala
	 *
	 * @param : string - search_key
	 *
	 * @return/outcome : Returns a json arrayobject where it consists the record of particular book.
	 */
	function searchForBook($search_key){
		$arrayObject = array();
		$conn = connection();
		//SELECT a.`book_name`, a.`author_name` , a.`category` , a.`publisher`, a.`edition` , a.`price` , a.`isbn` , COUNT(b.`isbn`)  FROM `tbl_book_varities` a LEFT JOIN `tbl_all_books` b on a.`isbn` = b.`isbn` GROUP BY b.`isbn`
		$sql = " SELECT a.`book_name`, a.`author_name` , a.`category` , a.`publisher`, a.`edition` , a.`price` , a.`isbn` , COUNT(b.`isbn`) AS 'qty' FROM `tbl_book_varities` a LEFT JOIN `tbl_all_books` b on a.`isbn` = b.`isbn` WHERE LOWER(book_name) LIKE '$search_key%' || LOWER(author_name) LIKE '$search_key%' || LOWER(category) LIKE '$search_key%' GROUP BY b.`isbn` " ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {		    	
				$object = array();
		    	$object['ISBN'] = $row["isbn"];
		    	$object['Book name'] = $row["book_name"];
		    	$object['Author name'] = $row["author_name"];
		    	$object['Edition'] = $row["edition"];
		    	$object['Publisher'] = $row["publisher"];
		    	$object['Category'] = $row["category"];
		    	$object['Price'] = $row["price"];
		    	$object['Quantity'] = $row["qty"];
		    	$object['Action'] = "Edit,Delete";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return false; 
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value
	}
	/**
	 * @searchForBook : This function will search for a particular book based on the users criteria.
	 * @author : NagaLakshmi yarra
	 *
	 * @param : string - search_key
	 *
	 * @return/outcome : Returns a json arrayobject where it consists the record of particular book.
	 */
	function searchForIssuedBook($search_key){
		$arrayObject = array();
		$conn = connection();
		//SELECT a.`book_name`, a.`author_name` , a.`category` , a.`publisher`, a.`edition` , a.`price` , a.`isbn` , COUNT(b.`isbn`)  FROM `tbl_book_varities` a LEFT JOIN `tbl_all_books` b on a.`isbn` = b.`isbn` GROUP BY b.`isbn`
		$sql = " SELECT *  FROM `tbl_issued_books`  WHERE book_id LIKE '$search_key%' || mem_id LIKE '$search_key%' " ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {		    	
				$object = array();
		    	$object['BookID'] = $row["book_id"];
		    	$object['MemID'] = $row["mem_id"];
		    	$object['Issueddate'] = $row["issue_date"];
		    	$object['Return expected'] = $row["return_expected"];
		    	$object['Action'] = "Return";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return false; 
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value
	}
	
	/**
	 * @searchForMember : This function will search for a particular member based on the users criteria.
	 * @author : Mohan, Bala
	 *
	 * @param : string - search_key
	 *
	 * @return/outcome : Returns a json arrayobject where it consists the record of particular member.
	 */
	function searchForMember($search_key){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT * FROM tbl_members WHERE mem_id LIKE '$search_key%' || LOWER(mem_name) LIKE '$search_key%' " ;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['Mem ID'] = $row["mem_id"];
		    	$object['Name'] = $row["mem_name"];
		    	$object['Moblie'] = $row["mem_moblieno"];
		    	$object['Email'] = $row["mem_email"];
		    	$object['DOB'] = $row["mem_dob"];
		    	$object['Gender'] = $row["mem_gender"];
		    	$object['Action'] = "Edit,Delete";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return 0;
		}

		$conn->close();
		return(json_encode($arrayObject)); // return
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
	function editMembershipDetails( $memId, $mem_name , $mem_moblieno , $mem_email , $mem_dob , $mem_gender , $addr_hno , $addr_street , $addr_city , $addr_state , $addr_pincode){
		$conn = connection();
		//$sql = "INSERT INTO sampleTable (id, name, date) VALUES ($id, '$name', CURDATE())";
		$sql = "UPDATE tbl_members SET mem_name = '$mem_name' , mem_moblieno = '$mem_moblieno' , mem_email = '$mem_email' , mem_dob = '$mem_dob' ,
		mem_gender = '$mem_gender'  , addr_hno = '$addr_hno' , addr_street = '$addr_street' ,
		addr_city = '$addr_city' , addr_state = '$addr_state' , addr_pincode = '$addr_pincode' WHERE mem_id='$memId' ";

		if ($conn->query($sql) === TRUE) {
		    return "Member details updated successfully";
		} else {
		    return "Error: " . $sql . "<br>" . $conn->error;
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
	function requestingMembership($name, $phoneNumber, $emailId, $dob, $gender, $membershipType, $hNo, $street, $place, $city, $zip){
		$conn = connection();

		$sql = "INSERT INTO tbl_mem_request (mem_name, mem_mobileno, mem_email, mem_dob, mem_gender,addr_hNo, addr_street, addr_city, addr_state, addr_pincode,  ms_id) VALUES ('$name', '$phoneNumber', '$emailId','$dob', '$gender','$hNo', '$street', '$place', '$city', '$zip', '$membershipType')";
		if ($conn->query($sql) === FALSE) {
			return "Error: " . $sql . "<br>" . $conn->error;
		}else{
			return "successfully";
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
	function requestingMembershipRenewal($memberid,$membername){
		$conn = connection();

		$sql = "INSERT INTO tbl_membership_renewal_request (mem_id,mem_name) VALUES ('$memberid','$membername') ";

		if ($conn->query($sql) === TRUE) {
		    return "New record created successfully";
		} else {
		    return "Error: " . $sql . "<br>" . $conn->error;
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
	 * @return/outcome : It will save the data in the databse and returns a string with successful message.
	 */


	function requestingForNewBook($memberId,$bookName,$authorName){
		$conn = connection();
		$sql = "INSERT INTO `tbl_new_book_request`(`book_name`, `author_name`, `mem_id`) SELECT * FROM (SELECT '$bookName','$authorName','$memberId') AS tmp WHERE NOT EXISTS (SELECT * FROM `tbl_new_book_request` WHERE `mem_id` = '$memberId')";
		if ($conn->query($sql) === TRUE) {
	    	return "New record created successfully";
		} else {
	    return "Error: " . $sql . "<br>" . $conn->error;
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
	 * @return/outcome : It will save and update the duedate in the database and returns the successful message.
		 */


	function requestingForDueDateExtension($memberid, $bookid, $extensiondays){
		$conn = connection();
		//$sql = " SELECT ms_id FROM tbl_members WHERE mem_id = '$memberid' ";
		$sql = "INSERT INTO `due_date_extension`(`mem_id`, `book_id`, `extension_days`) SELECT * FROM (SELECT '$memberid','$bookid',' $extensiondays') AS tmp WHERE NOT EXISTS (SELECT * FROM `due_date_extension` WHERE `book_id` = '$bookid')";
		if ($conn->query($sql) === TRUE) {
			return "New Duedate extension is requested";
		} else {
			return "Error: " . $sql . "<br>" . $conn->error;
		}
			$conn->close();	
	}


	/**
	 * @approveMembership : This function is used to approve the membership requests and append the new entry in the database.
	 * @author : Mohan, Bala
	 *
	 * @param : email - emailId
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
		    $sql = "INSERT INTO tbl_members (mem_name, mem_moblieno, mem_email, mem_dob, mem_gender, ms_id, membership_on, expiry_on, addr_hno, addr_street, addr_city, addr_state, addr_pincode) VALUES ('$object[0]', '$object[1]', '$object[2]', '$object[3]', '$object[4]', '$object[12]', '$object[13]', '$object[14]', '$object[7]', '$object[8]', '$object[9]', '$object[10]', '$object[11]' )";
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		} else {
		    return 0;
		}
		$sql = "DELETE FROM tbl_mem_request WHERE mem_email='$emailId'";
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}

	/**
	 * @rejectMembership : This function is used to reject the membership requests from database.
	 * @author : Mohan, Bala
	 *
	 * @param : email - emailId
	 *
	 * @return/outcome : It will save the new membership details in the database.
	 */

	
	function rejectMembership($emailId){
		$conn = connection();
		$sql = "DELETE FROM tbl_mem_request WHERE mem_email='$emailId'";
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
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
		$sql = "SELECT book_name, author_name, COUNT(*) AS count FROM tbl_new_book_request GROUP BY book_name, author_name";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['Book name'] = $row["book_name"];
		    	$object['Author name'] = $row["author_name"];
		    	$object['No of Requests'] = $row["count"];
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return 0;
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value


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
		$sql = " SELECT a.extension_days, b.return_expected FROM due_date_extension a JOIN tbl_issued_books b WHERE b.mem_id = '$memberid' AND a.book_id = '$bookid' ";
		$result = $conn->query($sql);	
        if ($result->num_rows > 0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
	    	$returndate = $row["return_expected"];
	    	$extension = $row["extension_days"];
		} else {
		    return 0;
		}
		$date = date('Y-m-d', strtotime("+$extension days", strtotime($returndate)));
		$sql = "UPDATE tbl_issued_books SET return_expected = '$date'  WHERE mem_id = '$memberid' AND book_id = '$bookid' ";
		if ($conn->query($sql) === TRUE) {
			rejectExtension($memberid,$bookid);
			return 1;
		} else {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}


	/**
	 * @approveDueDateExtension : This function is used delete the data from the datbase.
	 * @author : Yaswanth
	 *
	 * @param : string - memberId
	 * @param : string - bookId
	 * 
	 *
	 * @return/outcome : If the extension is rejected it will delete the dataa from the database.
	 */

	function rejectExtension($memberid , $bookid) {
		$conn = connection();
			$sql = "DELETE FROM due_date_extension WHERE mem_id = '$memberid' AND book_id = '$bookid'";
			$conn->query($sql);		   
    	$conn->close();
	     return 1 ;
	}

	/**
	 * @approveMembershipRenewal : This function is used approve the membership validity extension.
	 * @author : Mohan, Bala
	 *
	 * @param : string - memberId
	 * @param : string - extensionType
	 *
	 * @return/outcome : If the extension is approved it will save the updated extion date else it will remain same.
	 */
		function approveMembershipRenewal($memId,$extensionType){
		$conn = connection();
		$sql = "SELECT expiry_on FROM tbl_members WHERE mem_id='$memId'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    $row = $result->fetch_assoc();
	    	$expirydate = $row["expiry_on"];
		}
		if($extensionType == 1){
			//$membershipId = 1;
			$expiry = date('Y-m-d', strtotime("+12 months", strtotime($expirydate)));
			echo $expiry;
		}elseif ($extensionType == 2) {
			//$membershipId = 2;
			$expiry = date('Y-m-d', strtotime("+6 months", strtotime($expirydate)));
		}else{
			//$membershipId = 3;
			$expiry = date('Y-m-d', strtotime("+3 months", strtotime($expirydate)));
		}
		$sql = "UPDATE tbl_members SET expiry_on = '$expiry' WHERE mem_id='$memId'";
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		$sql = "DELETE FROM tbl_membership_renewal_request WHERE mem_id='$memId'";
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		return "Approved membership renewal request";
		
		$conn->close();
	}


	/**
	 * @rejetcMembershipRenewal : This function is used reject the membership validity extension.
	 * @author : Prabhakar
	 *
	 * @param : string - memberId
	 *
	 * @return/outcome : It will removes the membership renewal request.
	 */
	function rejetcMembershipRenewal($memId){
		$conn = connection();
		$sql = "DELETE FROM tbl_membership_renewal_request WHERE mem_id='$memId'";
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		return "rejected membership renewal request";
		
		$conn->close();
	}


	/**
	 * @issueBook : This function is used to issue a book and a new record is stored in the database.
	 * @author : Mohan, Bala
	 *
	 * @param : string - memberId
	 * @param : string - bookId
	 *
	 * @return/outcome : The data is saved in the issued books table in the database.
	 */



	function issueBook($memberId, $bookId){
		$conn = connection();
		$sql = " INSERT INTO `tbl_issued_books`(`mem_id`, `book_id`, `issue_date`, `return_expected`) SELECT * FROM (SELECT '$memberId', '$bookId', '$issuedDate', '$returnDate') AS tmp WHERE NOT EXISTS (SELECT `book_id` FROM `tbl_issued_books` WHERE `book_id` = '$bookId') ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			return "Book is issued successfully
			";
		}else{
			return "You have already issued this book";
		}
		$conn->close();

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
		$sql = " UPDATE tbl_issued_books SET return_actual = '$return_actual'  WHERE book_id = '$bookId' ";
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		$sql = "SELECT * FROM tbl_issued_books WHERE book_id = '$bookId'";
		$result = $conn->query($sql);
		//print_r($result);
		if ($result->num_rows > 0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
		    $return_expected = $row["return_expected"];

		}else {
			return 0;
		}
		$diff = 0;
		$return_actual_new = new DateTime($return_actual);
		$return_expected_new = new DateTime($return_expected);
		$diff = $return_actual_new->diff($return_expected_new)->format("%a");
		if($return_actual_new > $return_expected_new){
		  	$penality = $diff*10;
		  	$sql = " UPDATE tbl_issued_books SET penality = '$penality'  WHERE book_id = '$bookId' ";
		  	$result = $conn->query($sql);
			return 'failed';
		}else {
			$sql = " DELETE FROM tbl_issued_books WHERE book_id = '$bookId'";
		}
		
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

	}


	/**
	 * @returningBookAfterPenalityPaid : This function is used to update the status of issued books after penalty paid.
	 * @author : Mohan, Bala
	 *
	 * @param : string - bookId
	 *
	 * @return/outcome : The data is removed in the issued books.
	 */

	function returningBookAfterPenalityPaid($bookId){
		$conn = connection();
			$sql = "DELETE FROM tbl_issued_books WHERE book_id = '$bookId'";		
		if ($conn->query($sql) === FALSE) {
		    return "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

	}


		/**
	 * @viewMembershipRequests : This function is used to display the membership requests which are requesterd from the users.
	 * @author : Mohan, Bala
	 *
	 *
	 * @return/outcome : It will display all the requests for new membership the data is returned in array object.
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
		    	$object['Name'] = $row["mem_name"];
		    	$object['Mobile No'] = $row["mem_mobileno"];
		    	$object['Email Id'] = $row["mem_email"];
		    	$object['Gender'] = $row["mem_gender"];
		    	$object['H No'] = $row["addr_hno"];
		    	$object['Street'] = $row["addr_street"];
		    	$object['City'] = $row["addr_city"];
		    	$object['State'] = $row["addr_state"];
		    	$object['Pincode'] = $row["addr_pincode"];
		    	if($row["ms_id"]==1){
		    		$object['Membership type'] = "Platinum";
		    	}else if($row["ms_id"]==2){
		    		$object['Membership typetype'] = "Gold";
		    	}else{
		    		$object['Membership type'] = "Silver";
		    	}
		    	$object['Action'] ="Approve,Reject";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return 0;
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value


	}


/**
	 * @viewMembershipRenewalRequests : This function is used to display the membership renewal requests which are requesterd from the members.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : Returns a json object where it consists all the records of membership renewal requests.
	 */


	function viewMembershipRenewalRequests(){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT a.mem_id, a.mem_name, b.expiry_on, b.ms_id  FROM tbl_membership_renewal_request a JOIN tbl_members b WHERE a.mem_id = b.mem_id" ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
		    while($row = $result->fetch_assoc()) {		// Used to fetch the data from database.    	
				$object = array();
		    	$object['Mem ID'] = $row["mem_id"];
		    	$object['Name'] = $row["mem_name"];
		    	$object['Expiry on'] = $row["expiry_on"];
		    	$object['MS ID'] = $row["ms_id"];
		    	$object['Action'] = "Approve,Reject";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return 0; 
		}
 //return value
		$conn->close();
		return json_encode($arrayObject);
		
	}


		/**
	 * @viewIssuedBooks : This function is used to display the all issued books details .
	 * @author : Mohan, Bala
	 *
	 *
	 * @return/outcome : It will display all issued books , where it returns the arrayobject to display.
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
		    	$object['Book ID'] = $row["book_id"];
		    	$object['Mem ID'] = $row["mem_id"];
		    	$object['Issue date'] = $row["issue_date"];
		    	$object['Return expected'] = $row["return_expected"];
		    	$object['Penality'] = $row["penality"];
		    	$object['Action'] ="Return";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return 0;
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value


	}


	/**
	 * @viewDueDateExtensions : This function is used to display the details of all duedate extensions which are requested by the members.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : It will display all the requests from users where the data is returned in the form of arayobject.
	 */
	function viewDueDateExtensions(){
		$arrayObject = array();
		$conn = connection();
		$sql = "SELECT a.book_id, a.mem_id, b.mem_name AS name, a.extension_days, b.ms_id FROM due_date_extension a JOIN tbl_members b WHERE a.mem_id = b.mem_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['Book ID'] = $row["book_id"];
		    	$object['Mem ID'] = $row["mem_id"];
		    	$object['Member Name'] = $row["name"];
		    	$object['Extension days'] = $row["extension_days"];
		    	$object['Action'] ="Approve,Reject";
		    	array_push($arrayObject, $object);
		    }
		} else {
		    return 0;
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value
	}


	/**
	 * @emailCheck : This function is used to check the duplicate email Id for appling a membership.
	 * @author : Mohan, Bala
	 *
	 * @param : string - email
	 *
	 * @return/outcome : It will returns 1 if the email is exist else returns 0.
	 */
	function emailCheck($email){
		$conn = connection();
		$sql = " SELECT mem_email FROM tbl_mem_request WHERE mem_email = '$email' ";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
			 return 1; // return value
		}else{
			return 0; // return value
		}
		$conn->close();
	}

	/**
	 * @loadMemberBooks : This function is used to display the details of all books that member taken.
	 * @author : Yaswanth.
	 *
	 * @param : integer - membeId
	 *
	 * @return/outcome : It will display all the books that are user taken.Where the data is returned in the form of arrayobject.
	 */
	function loadMemberBooks($memberId){
		$arrayObject = array();
		$conn = connection();
		$sql = "SELECT b.book_id,book_name,issue_date,return_expected FROM tbl_book_varities a join tbl_all_books b join tbl_issued_books c WHERE c.mem_id = $memberId AND c.book_id = b.book_id AND b.isbn = a.isbn GROUP BY book_name";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$object = array();
			    	$object['Book name'] = $row["book_name"];
	 		    	$object['Book Id'] = $row["book_id"];
			    	$object['Issue date'] = $row["issue_date"];
			    	$object['Return date'] = $row["return_expected"];
			    	$object['Action'] ="Request Extension";
			    	array_push($arrayObject, $object);
		    }
		} else {
		    return false;
		}

		$conn->close();
		return(json_encode($arrayObject)); //return value
	}

	
	/**
	 * @loadDropdownOptions : This function is used to select all the categories in database.
	 * @author : Mohan, Bala
	 *
	 * @return/outcome : It will display all the categories, where the data is returned in the form of arrayobject
	 */
	function loadDropdownOptions(){
		$conn = connection();
		$sql = " SELECT DISTINCT category FROM tbl_book_varities;";
		$arrayObject = array();
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
        	 while($row = $result->fetch_assoc()) {
		    	$object = array();
		    	$object['category'] = $row["category"];	
		    	array_push($arrayObject, $object);
		    }
		}else{
			return 0; // return value
		}
		$conn->close();
		return(json_encode($arrayObject)); //return value
	}

	/**
	 * @getMemberName : This function is used to fetch the member name with the help of the memberid.
	 * @author : Mohan, Bala
	 *
	 * @param : integer - memberid
	 *
	 * @return/outcome : It will read the member name and returns.
	 */
	function getMemberName($memberId){
		$conn = connection();
		$sql = " SELECT mem_name FROM tbl_members WHERE mem_id=$memberId;";
		$arrayObject;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc(); 
	    	$arrayObject = $row["mem_name"];	
	    	return $arrayObject;
		}else{
			return 0; // return value
		}
		$conn->close();
	}


	/**
	 * @getBookDetails : This function is used to fetch the book details with the help of the isbn.
	 * @author : Mohan, Bala
	 *
	 * @param : integer - memberid
	 *
	 * @return/outcome : It will read the member name and returns a arraobject.
	 */


	function getBookDetails($isbn){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT a.*, COUNT(b.`isbn`) AS 'Qty' FROM tbl_book_varities a LEFT JOIN tbl_all_books b on a.`isbn` ='$isbn'" ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
	    	$row = $result->fetch_assoc();
			$object = array();
			$object['ISBN'] = $row["isbn"];
	    	$object['Price'] = $row["price"];
	    	$object['Edition'] = $row["edition"];
	    	$object['Publisher'] = $row["publisher"];
	    	$object['Category'] = $row["category"];
	    	$object['Book name'] = $row["book_name"];
	    	$object['Author name'] = $row["author_name"];
	    	$object['Quantity'] = $row["Qty"];
	    	array_push($arrayObject, $object);
		} else {
		    return 0; 
		}

		$conn->close();
		return $arrayObject; //return value
	}



	/**
	 * @deleteBook : This function is used delete a book from the datbase.
	 * @author : Yaswanth
	 *
	 * @param : string - isbn
	 *
	 * @return/outcome : If the extension is rejected it will delete the data from the database.
	 */

	function deleteBook($isbn) {
		$conn = connection();
			$sql = "DELETE FROM tbl_book_varities WHERE isbn = '$isbn'";
			$conn->query($sql);		   
    	$conn->close();
	     return 1 ;
	}

	/**
	 * @deleteMember : This function is used delete a member from the datbase.
	 * @author : Yaswanth
	 *
	 * @param : integer - member id
	 *
	 * @return/outcome : It will delete the member data from the database.
	 */

	function deleteMember($memberEmail) {
		$conn = connection();
			echo $memberEmail;
			$sql = "DELETE a.*, b.* FROM tbl_members a JOIN tbl_login b WHERE a.`mem_email` = '$memberEmail' AND b.`username` = '$memberEmail'";
			$conn->query($sql);		   
    	$conn->close();
	    return $memberEmail ;
	}



	/**
	 * @getMemberDetails : This function will display all the records of members from the database to the respective page.
	 * @author : Yaswanth
	 *
	 * @return/outcome : Returns a json arrayobject where it consists all the records of members.
	 */
	function getMemberDetails($memberid){
		$arrayObject = array();
		$conn = connection();
		$sql = " SELECT * FROM tbl_members WHERE mem_id = '$memberid' " ;
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
		    // output data of each row  
		    	$row = $result->fetch_assoc() ;
		    	$object = array();
		    	$object['Member ID'] = $row["mem_id"];
		    	$object['Member Name'] = $row["mem_name"];
		    	$object['Phone No.'] = $row["mem_moblieno"];
		    	$object['Mail ID'] = $row["mem_email"];
		    	$object['Dob'] = $row["mem_dob"];
		    	$object['Gender'] = $row["mem_gender"];
		    	$object['H NO'] = $row["addr_hno"];
		    	$object['Street'] = $row["addr_street"];
		    	$object['City'] = $row["addr_city"];
		    	$object['State'] = $row["addr_state"];
		    	$object['Pincode'] = $row["addr_pincode"];
		    	array_push($arrayObject, $object);

		} else {
		    return 0;
		}

		$conn->close();
		return ($arrayObject); //return value
	}


	/**
	 * @emailChecking : This function is used to check the duplicate email Id for appling a membership.
	 * @author : Yaswanth
	 *
	 * @param : string - email
	 *
	 * @return/outcome : It will returns 1 if the email is exist else returns 0.
	 */
	function emailChecking($email){
		$conn = connection();
		$sql = " SELECT mem_email FROM tbl_mem_request WHERE mem_email = '$email' ";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo count($row);
				echo $row['yaswanth'] = $row['mem_email'];
			}
			return 1; 
		}else{
			return 0; // return value
		}
		$conn->close();
	}


	
	/**
	 * This function will return the book details based on the bookid in JSON format.
	 * @author : Rupam Datta
	 *
	 * @param : number - bookid
	 *
	 * @return/outcome : json object.
	 */
	function getBookDetailsById($bookid){
		$conn = connection();
		$count=0;

		$sql = 'SELECT a.`isbn`, `price`, `edition`, `publisher`, `category`, `book_name`, `author_name`, b.`book_id` FROM `tbl_book_varities` a JOIN `tbl_all_books` b WHERE a.`isbn` = b.`isbn` and b.`book_id` = '.$bookid;
		$result = $conn->query($sql);
		$object = array();
		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
    		$object['bookid'] = $row["book_id"];
	    	$object['isbn'] = $row["isbn"];
	    	$object['bookname'] = $row["book_name"];
	    	$object['author'] = $row["author_name"];
	    	$object['publisher'] = $row["publisher"];
		} else {
			return 0;
		}

		$conn->close();
		return(json_encode($object)); //return value
	}

	/**
	 * This function will return the member details based on the memberid in JSON format.
	 * @author : Rupam Datta
	 *
	 * @param : number - memberid
	 *
	 * @return/outcome : json object.
	 */
	function getMemberDetailsById($memberid){
		$conn = connection();
		$count=0;

		$sql = 'SELECT a.`mem_id`, a.`mem_name`, b.`ms_type`, b.`ms_validity_period`, b.`ms_book_limit`, b.`ms_days_limit` , b.`penalty` FROM `tbl_members` a JOIN `tbl_membership` b WHERE a.`ms_id` = b.`ms_id` and a.`mem_id` = '.$memberid;
		$result = $conn->query($sql);
		$object = array();
		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
    		$object['id'] = $row["mem_id"];
	    	$object['name'] = $row["mem_name"];
	    	$object['type'] = $row["ms_type"];
	    	$object['validity'] = $row["ms_validity_period"];
	    	$object['book_limit'] = $row["ms_book_limit"];
	    	$object['days_limit'] = $row["ms_days_limit"];
	    	$object['penalty'] = $row["penalty"];
		} else {
			return 0;
		}

		$conn->close();
		return(json_encode($object)); //return value
	}
?>