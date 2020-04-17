<?php
// Start the session
session_start();
require('mysqli_connect.php');
$q="select bookid, bookname from bookinventory";
$r = @mysqli_query($dbc, $q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 30%;
        margin: auto;
    }

   
    </style>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>

    
    <nav class="navbar navbar-expand-sm bg-light">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="store.php">Store</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Checkout</a>
    </li>
  </ul>

</nav>
    <main>
        <?php 

echo "<table><tr> <th>Book Name</th> </tr>";
if (!$dbc) { die('Could Not Connect: ' . mysqli_error($dbc) . mysqli_errno($dbc)); }
$chkRow = mysqli_num_rows($r); 
if($chkRow>0){
while($row = mysqli_fetch_array($r)) {
    
echo '<tr><td><a href="?r='.$row['bookid'].'">'.$row['bookname']."</a></td></tr>";


}
    
}
echo "</table>";

if(isset($_GET['r'])){
    $id=$_GET['r'];
    sessionFunc($id);
}
function sessionFunc($sessionvar){
    $_SESSION["bookid"]=$sessionvar;
    header("Location: checkout.php");
}

mysqli_close($dbc);
?>

        <?php 
        
        



?>

    </main>

</body>

</html>