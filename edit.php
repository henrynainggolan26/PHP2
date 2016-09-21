<?php
	$connection = mysqli_connect("localhost", "root", "ssmaju", "test_wordpress");
	$idnew = $_REQUEST['id'];
	$result = mysqli_query($connection, 'SELECT * FROM people WHERE id  ='.$idnew.'');
	$test = mysqli_fetch_array($result);
	if (!$result) 
		{
		die("Error: Data not found..");
		}
				$firstname=$test['first_name'] ;
				$lastname= $test['last_name'] ;					
				$gender=$test['gender'] ;
				$email=$test['email'] ;
				$phonenumber=$test['phone_number'] ;
				$address=$test['address'] ;

if(isset($_POST['save']))
{	
	$firstname=$_POST['firstname'] ;
				$lastname= $_POST['lastname'] ;					
				$gender=$_POST['gender'] ;
				$email=$_POST['email'] ;
				$phonenumber=$_POST['phone'] ;
				$address=$_POST['address'] ;

	mysqli_query($connection,"UPDATE people SET first_name ='".$firstname."', last_name ='".$lastname."',
		 gender ='".$gender."',email ='".$email."',phone_number ='".$phonenumber."',address ='".$address."' WHERE id = '".$idnew."'")
				or die(mysqli_error()); 
	echo "Saved!";
	
	header("Location: people_view.php");			
}
mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
<title>phptaab.blogspot.in</title>
</head>

<body>
<form action="" method="post">
First Name: <input type="text" name="firstname" value="<?php echo $firstname ?>"><br /><br />
Last Name: <input type="text" name="lastname" value="<?php echo $lastname ?>"><br /><br />
Gender: <input type="radio" name="gender" value="male"  <?php echo $gender == 'male' ? 'checked="checked"' : ''; ?>> male <input type="radio" name="gender" value="famale" <?php echo $gender == 'famale' ? 'checked="checked"' : ''; ?>> famale <br /><br />
E-mail: <input type="text" name="email" value="<?php echo $email ?>"><br /><br />
Phone: <input type="text" name="phone" value="<?php echo $phonenumber ?>"><br /><br />
Address: <input type="text" name="address" value="<?php echo $address ?>"><br /><br />
<input type="submit" name="save" value="save">
</form>

</body>
</html>