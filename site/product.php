<?php include "templates/header.php"; ?>
<h2>Product Information </h2>
<a href="inventory.php">Back to inventory</a>
<br>

<?php
$db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin");
$name = $_GET['name'];
$query = 'SELECT * FROM products WHERE name = '.$name.' LIMIT 1';
$result = pg_query($db_conn, $query);
$row = pg_fetch_all($result)[0];
$impath = "\"images/products/" . $row["name"] .".jpg\"";
echo "<h3> " . $row["name"] . "</h3>";
echo "<img src=" . $impath . " alt=\"" . $row["name"] . "\" border=3 </img>";
echo "<br>";
echo "<h4> " . $row["price"] . "</h4>";
echo "<br>";
echo "<p> " . $row['description'] . "</p>";
echo "<br>";
if ($row["instock"] == "t"){
    echo '<font size="5" color="green">In Stock!</font><br>';
    $purchlink = "purchase.php?prid='" . $row["id"] . "'";
    echo '<a href="' . $purchlink . '"><img src="images/buy-now.png" alt="" border=1 height=50 width=250></img></a>'
  }else { echo '<font size="5" color="red">Out of Stock!</font><br>';
    echo '<img src="images/buy-now-gr.png" alt="" border=1 height=50 width=250</img>';
  }

echo "<br>";
echo '<a href="inventory.php">Back to inventory</a>';


?>

<?php include "templates/footer.php"; ?>