<?php include "templates/header.php"; ?>
<center>
<?php
if (isset($_POST['submit'])) {
      $db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin") or die("Cannot connect to DB.");
      $valstr = "('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['prodid'] . "', '" . $_POST['ccnum'] . "', 
      '" . $_POST['cvv'] . "')";
      $query = "INSERT INTO orders (firstname, lastname, email, prodid, ccnum, cvv) VALUES " . $valstr . " RETURNING id;";
      $res = pg_query($db_conn, $query);
      $row = pg_fetch_row($res);
      $new_id = $row['0'];
      echo "<h3>Order Successfully placed! </h3>";
      echo "<h4>Thank you for shopping with Velvet Highway!</h4>";
      echo "<h4>Your order number is: " . $new_id . ", please retain this information for your records. </h4>";
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
    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>
</center>
    <?php include "templates/footer.php"; ?>