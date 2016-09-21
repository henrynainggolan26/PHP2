<?php
	$connection = mysqli_connect("localhost", "root", "ssmaju", "test_wordpress");
	if (isset($_POST['submit'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$q = "insert into people (first_name, last_name, gender, email, phone_number, address) 
			values ('".$firstname."','".$lastname."','".$gender."','".$email."','".$phone."','".$address."')";
		$query = mysqli_query($connection, $q);
		if(!$query){
			echo mysqli_error($connection);
		}
	}
?>

<form action="" method="post">
	First Name: <input type="text" name="firstname" value=""><br /><br />
	Last Name: <input type="text" name="lastname" value=""><br /><br />
	Gender: <input type="radio" name="gender" value="male"> male <input type="radio" name="gender" value="famale"> famale <br /><br />
	E-mail: <input type="text" name="email" value=""><br /><br />
	Phone: <input type="text" name="phone" value=""><br /><br />
	Address: <input type="text" name="address"><br /><br />
	<input type="submit" name="submit">
</form>


<?php

$results = mysqli_query($connection, 'select * from people');

if($results){
	echo mysqli_error($connection);
}
echo "<table border='1' cellpadding='10'>"; 
echo "<tr> <th> First Name </th> <th> Last Name </th>  <th> Gender </th> <th> Email </th> <th> Phone</th> <th> Address </th> <th> Action Edit </th> <th> Action Delete </th></tr>";
	while ($test = mysqli_fetch_array($results)) {
		$id = $test['id'];
		echo "<tr align='center'>";	
		echo"<td><font color='black'>" .$test['first_name']."</font></td>";
		echo"<td><font color='black'>" .$test['last_name']."</font></td>";
		echo"<td><font color='black'>". $test['gender']. "</font></td>";
		echo"<td><font color='black'>". $test['email']. "</font></td>";
		echo"<td><font color='black'>". $test['phone_number']. "</font></td>";
		echo"<td><font color='black'>". $test['address']. "</font></td>";	
		echo"<td> <a href ='edit.php?id=$id'>Edit</a>";
		echo"<td> <a href ='delete.php?id=$id'><center>Delete</center></a>";
		echo "</tr>";
	}
echo "</table>";
?>
