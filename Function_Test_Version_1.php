<?php 

  $r = True;
  $first_name = $_POST['f_name'];
  $last_name = $_POST['l_name'];
  $states = $_POST['state'];
  $city = $_POST['city'];
  $borough = $_POST['borough'];
  $username = $_POST['username'];
  $password = $_POST['psw'];

  function Post_Account ($first_name , $last_name, $states, $city, $borough, $username, $password, $r){
      $db = mysqli_connect("127.0.0.1", "root", "f7aaa8re9s", "subways");
	
	    $v = mysqli_query($db, "Create table Profile( first_name varchar(20),last_name varchar(20),states varchar(20),city varchar(20),
      borough varchar(20),username varchar(50),password varchar(50)");
    
	    $s = mysqli_query($db, "SELECT * FROM Profile");
   

	    foreach ($s as $s1){
		    if ($password == $s1['password'] && $username == $s1['username'] ){
    	?>
    	<div class = "img">
				<img src="Unknown.jpg" alt="MTA">
			</div>
      
			<?php
    		echo "Error. Account Found. Try Again";
    		$r = False;
    	?>
      
	<meta http-equiv="refresh" content="5; url='CreateAccount.php'" />
	<?php
         }
	    }
	
	    if ($r == TRUE){
          $values = mysqli_query($db, "INSERT INTO Profile(first_name, last_name, states, city,borough,username, password)
	                  VALUES ('$first_name','$last_name', '$states', '$city', '$borough', '$username', '$password')" );
	
	        echo "Success";
		      header("Location:UserLogin.php");
	    }
 
   }
?>
