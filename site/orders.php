<?php include "templates/header.php"; ?>
<center>
<body>
    <h3>Orders</h3>

<br>
<h5> Enter your oder number: </h5>
<form method="post">
  <input type="text" id="orderid" name="orderid">
  <input type="submit" name="search" id="search" value="Search Orders">
</form>
<?php
  if (isset($_POST['search'])) {
    #$db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin") or die("Cannot connect to DB.");
    $db_conn = mysqli_connect("localhost", "shopadmin", "velvet_admin", "shop") or die("Cannot connect to DB.");
    $ordid = $_POST['orderid'];
    $query = "SELECT * FROM orders WHERE id=" . $ordid;
    #$rs = pg_query($db_conn, $query) or die("Cannot execute query: $query\n");
    $rs = mysqli_query($db_conn, $query) or die("Cannot execute query: $query\n");
    #$result = pg_fetch_all($rs);
    $result = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    foreach ($result as $row){
    $q2 = "SELECT name FROM products WHERE id=" . $row['prodid'];
    #$rs2 = pg_query($db_conn, $q2) or die("Error: Order contains invalid product ID...");
    $rs2 = mysqli_query($db_conn, $q2) or die("Error: Order contains invalid product ID...");
    #$res2 = pg_fetch_all($rs2)[0];
    $res2 = mysqli_fetch_all($rs2, MYSQLI_ASSOC)[0];
    $prodname = $res2['name'];
    echo "<br>";
    echo "<br>";
    echo "<h4> Order Info </h4>";
    echo "<p>Order id: " . $row['id'] . "</p>";
    echo "<p>Name on order: " . $row['firstname'] . " " . $row['lastname'] . "</p>";
    echo "<p>Contact email: " . $row['email'] . "</p>";
    echo "<p>Product ID: " . $row['prodid'] . "</p>";
    echo "<p>Product Name: " . $prodname . "</p>";
    echo "<p>Credit Card Number: " . $row['ccnum'] . "</p>";
    echo "<p>CVV/CVC Number: " . $row['cvv'] . "</p>";
    if ($row['shipped'] == "t"){
      echo "<p>Shipment Status: Has shipped</p>";
    } else{
      echo "<p>Shipment Status: Not yet shipped</p>";
    }
  }
    
  }
?>
  </body>
</center>
<?php include "templates/footer.php"; ?>