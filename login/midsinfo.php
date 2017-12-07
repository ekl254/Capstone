<?php
require_once("mysql.inc.php");
require_once("page.inc.php");
session_start();
$page = new Page("MIDS INFO");
$db = new myConnectDB();          # Connect to MySQL

$user = $_SESSION['current'];
$user = substr($user, 1);

$query = "SELECT Alpha, FirstName, LastName, Room, Phone, Gender, Major, Company
FROM Midshipman WHERE Alpha = $user";

$stmt = $db->stmt_init();
$stmt->prepare($query);

$success = $stmt->execute();

if (!$success || $db->affected_rows == 0) {
  echo "<h5>ERROR: " . $db->error . " for query *$query*</h5><hr>";
}

echo "<table border=1>
<thead>
<tr><th>Alpha</th>
<th>FirstName</th>
<th>LastName</th>
<th>Room</th>
<th>Phone</th>
<th>Gender</th>
<th>Major</th>
<th>Company</th>
</tr>
</thead>
<tbody>";

$stmt->bind_result($alpha, $firstName, $lastName, $room, $phone, $gender, $major, $company);
while ($row = $stmt->fetch()) {
  echo "<tr><td>$alpha</td><td>$firstName</td><td>$lastName</td><td>$room</td>
  <td>$phone</td><td>$gender</td><td>$major</td><td>$company</td></tr>";
}
echo "</tbody></table>";

$stmt->close();
$page->display();
?>
