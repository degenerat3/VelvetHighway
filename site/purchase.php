<?php include "templates/header.php"; ?>
<center>
<?php
if (isset($_POST['submit'])) {
      $db_conn = mysqli_connect("localhost", "shopadmin", "velvet_admin", "shop");
      if (!$db_conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
      }
      $valstr = "('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['prodid'] . "', '" . $_POST['ccnum'] . "', 
      '" . $_POST['cvv'] . "')";
      
      $query = "INSERT INTO orders (firstname, lastname, email, prodid, ccnum, cvv) VALUES " . $valstr . ";";
      $res = mysqli_query($db_conn, $query);
      $query = "SELECT LAST_INSERT_ID();";
      $res = mysqli_query($db_conn, $query);
      $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
      $a = $row[0];
      $new_id = $a['LAST_INSERT_ID()'];
      echo "<h3>Order Successfully placed! </h3>";
      echo "<h4>Thank you for shopping with Velvet Highway!</h4>";
      echo "<h4>Your order number is: </h4>";
      echo '<h4 id="newordernumber">' . $new_id . '</h4>';
      echo '<h4> Please retain this information for your records. </h4>';
}
?>

<h3>Create a new purchase order</h3>

    <form method="post">
    	<label for="firstname">First Name</label>
    	<input type="text" name="firstname" id="firstname">
        <br><br>
    	<label for="lastname">Last Name</label>
    	<input type="text" name="lastname" id="lastname">
        <br><br>
    	<label for="email">Email Address</label>
    	<input type="text" name="email" id="email">
        <br><br>
        <label for="prodid">Product ID</label>
        <?php 
        $prid = $_GET['prid'];
        echo '<input type="text" name="prodid" id="prodid" value=' . $prid . '>';
        ?>
        <br><br>
    	<label for="ccnum">Credit Card Number</label>
    	<input type="text" name="ccnum" id="ccnum">
        <br><br>
        <label for="cvv">CVV/CVC</label>
    	<input type="text" name="cvv" id="cvv">
        <br><br><br>
    	<input type="submit" name="submit" id="submit" value="Submit">
    </form>

</center>
    <?php include "templates/footer.php"; ?>