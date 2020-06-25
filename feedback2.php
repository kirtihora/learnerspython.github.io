<!DOCTYPE html>
<html>
<head>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 


   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 .jumbotron {
		padding-top:0px;
		padding-bottom:0px;
		background-color:cyan
		
		
	}
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

 
</style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0" >
  <h1>Learners Python <i> @ XI & XII</i></h1>
  <p><i><b>Learning Python Is Fun....Lets do it together!!</b></i></p>
</div>

<?php
$error=0;
// define variables and set to empty values
$nameErr = $emailErr =  "" ;
$name = $email = $comment = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
$error=1;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
$error=1;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
$error=1;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
$error=1;
    }
  }
    
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2></h2>


<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p><B>KIRTI HORA</B></p>
    <p><B>PGT INFORMATICS PRACTICES</B></p>
  </div>
  <div class="row">
    <div class="column">
      <img src="k1.jpg" style="width:100%">
<br>
	<P><center>This website is meant to get you started in Python Programming.<br>
This Python website is mainly created for the Learners of  CS and IP (CBSE) grade XI and XII . The Notes and Assignments will surely help you to strong your concept of the language. 
This website and its content may be used freely and without charge, and it will always be free.
For any comments and suggestions, please send your feedback to 
kirtihora@gmail.com</center> </p>

    </div>
    <div class="column">

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <b>Name:</b> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  <b>E-mail:</b> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br> 
  <b>Comment:</b> <textarea name="comment" rows="4" cols="40" style="height:150px"><?php echo $comment;?></textarea>
  <br>
  <input type="submit" name="submit" value="Submit">  

</form>
<br>
<br>
<?php
if (isset($_POST["submit"]) && $error==0)
{ 
	if(isset($_POST['submit'])) 
	{
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'student';
	    $dbname='test';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
             
            if(!$conn) {
               die('Could not connect: ' . mysqli_error());
            }	
	else { echo "connected succcessfully"; }

$sql = "INSERT INTO site(name, email, comment) VALUES
('$name','$email','$comment')";

if(mysqli_query($conn,$sql))
{ echo "Thanks for the Feedback Dear"."   ".$name;
	 header("Location: feedback2.php");
}
  


else{ echo "not entered";}

}}

?>

    
<tr>
<center><td><h4 align="middle">Email Us</h4></center>

<center>Email: kirtihora@gmail.com</center>
</td>

</table>
<hr>



<br><br>
<a href="index.php"> <h2><font color="black">BACK</font></h2> </a> </th>
</body>
</html>