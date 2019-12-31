<?php include "templates/header.php"; ?>
    <h3>inventory</h3>
    <table>
      <thead>
<tr>
  <th>#</th>
  <th>Thumbnail</th>
  <th>Item Name</th>
  <th>Price</th>
  <th>Status</th>
  <th>Link</th>
</tr>
      </thead>
      <tbody>


<?php
$db_conn = pg_connect("host=localhost dbname=shop user=shopadmin password=velvet_admin");
$query = "SELECT * FROM products";
$rs = pg_query($db_conn, $query) or die("Cannot execute query: $query\n");
?>

<?php while ($row = pg_fetch_row($rs)) { ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["name"]); ?></td>
<td><?php echo escape($row["price"]); ?></td>
<td><?php echo escape($row["instock"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
<?php include "templates/footer.php"; ?>