<?php 

session_start();

?>

<?php 
            require('mysqli_connect.php');

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(empty($_POST['firstname'])){
                    echo '<p>First Name cannot be empty!</p>';
                }

                if(empty($_POST['lastname'])){
                    echo '<p>Last Name cannot be empty!</p>';
                }

                if(empty($_POST['payment'])){
                    echo '<p>Payment Method cannot be empty!</p>';
                }

                

                

                if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['payment'])){
                    echo "hello";
                    $sql = "INSERT INTO bookinventoryorder(firstname, lastname, payment, BookID) VALUES('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['payment']."', '".$_SESSION['bookid']."')"; 
            
                    if ($dbc->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $dbc->error;
                    }

                    $q = "UPDATE bookinventory SET quantity = quantity-1 WHERE bookid=".$_SESSION['bookid'];
                    if ($dbc->query($q) === TRUE) {
                        echo "quantity updated";
                    } else {
                        echo "Error: " . $q . "<br>" . $dbc->error;
                    }
                }
                
            }
            

        


            
                
            

            mysqli_close($dbc);

        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 40%;
        margin: auto;
    }

    td,
    th {

        text-align: right;
        padding: 8px;
    }
    </style>

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

            

        ?>

        <form action="checkout.php" method="post">
            <table>
                <tr class="form-group">
                    <th class="control-label">First Name:</th>
                    <td></td>
                    <td><input type="text" name="firstname" class="form-control" required></td>
                </tr>
                <tr class="form-group">
                    <th class="control-label">Last Name:</th>
                    <td></td>
                    <td><input type="text" name="lastname" class="form-control" required></td>
                </tr>
                <tr class="form-group">
                    <th class="control-label">Payment Method:</th>
                    <td></td>
                    <td> <input list="payment_methods" name="payment" class="form-control" required>
                        <datalist id="payment_methods">
                            <option value="Debit" class="form-control">
                            <option value="visa" class="form-control">
                            <option value="mastercard" class="form-control">
                        </datalist>
                    </td>
                </tr>
                <tr class="form-group">
                    <td></td>
                    <td><input type="Submit" value="Place Order" class="btn btn-primary" target="blank"></td>
                    <td></td>
                </tr>
            </table>
        </form>

        

    </main>

</body>

</html>