  <?php include "templates/header.php"; ?>
  <center>
      <h3>Item Inventory</h3>


<form method="post">
  <input type="text" id="nmsrch" name="nmsrch">
  <input type="submit" name="search" value="Search">
</form>

  <?php
  if (isset($_POST['search'])) {
    $db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin") or die("Cannot connect to DB.");
    $query = "SELECT * FROM products WHERE lower(name) LIKE lower('%" . $_POST['nmsrch'] . "%')";
    $rs = pg_query($db_conn, $query) or die("Cannot execute query: $query\n");
  $result = pg_fetch_all($rs);
  echo "<p> Showing search results for '" . $_POST['nmsrch'] . "'...</p>";
  echo "<br>";
  echo '<a href="inventory.php">Clear Search</a>';
  echo "<table>\n<thead>\n<tr>\n<th>ID</th>\n<th>Thumbnail</th>\n<th>Name</th>\n<th>Price</th>\n<th>Status</th>\n<th>Link</th>\n</tr>\n</thead>\n<tbody>\n";
  foreach ($result as $row){
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    $impath = "\"images/products/" . $row["name"] .".jpg\"";
    echo "<td> <img src=" . $impath . " alt=\"" . $row["name"] . "\" border=3 height=100 width=100></img></td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    if ($row["instock"] == "t"){
    echo "<td> In Stock </td>";
  }else { echo "<td> Out of Stock </td>";
  }
    $namelink = "?name='" . $row["name"] . "'";
    str_replace(" ", "+", $namelink);
    echo '<td> <a href="product.php' . $namelink . '">More Info</a> </td>';
    echo "</tr>";
  }
  echo "</tbody> </table>";
  } else {
  $db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin") or die("Cannot connect to DB.");
  $query = "SELECT * FROM products";
  $rs = pg_query($db_conn, $query) or die("Cannot execute query: $query\n");
  $result = pg_fetch_all($rs);

  echo "<table>\n<thead>\n<tr>\n<th>ID</th>\n<th>Thumbnail</th>\n<th>Name</th>\n<th>Price</th>\n<th>Status</th>\n<th>Link</th>\n</tr>\n</thead>\n<tbody>\n";
  foreach ($result as $row){
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    $impath = "\"images/products/" . $row["name"] .".jpg\"";
    echo "<td> <img src=" . $impath . " alt=\"" . $row["name"] . "\" border=3 height=100 width=100></img></td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    if ($row["instock"] == "t"){
    echo "<td> In Stock </td>";
  }else { echo "<td> Out of Stock </td>";
  }
    $namelink = "?name='" . $row["name"] . "'";
    str_replace(" ", "+", $namelink);
    echo '<td> <a href="product.php' . $namelink . '">More Info</a> </td>';
    echo "</tr>";
  }
  echo "</tbody> </table>";
}
  ?>

</center>
  <?php include "templates/footer.php"; ?>