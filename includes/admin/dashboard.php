<?php
include('../includes/db.php');
$result = $conn->query("SELECT * FROM registrations");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
</head>
<body>
  <h2>Registered Users</h2>
  <table border="1">
    <tr>
      <th>Name</th><th>Email</th><th>Phone</th><th>Event</th><th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['name'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td><?= $row['event'] ?></td>
      <td><a href="delete.php?id=<?= $row['id'] ?>">Delete</a></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
