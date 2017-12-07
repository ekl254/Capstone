<?php
require_once("mysql.inc.php");
require_once("page.inc.php");
session_start();
$page = new Page("MIDS INFO");
$db = new myConnectDB();          # Connect to MySQL


$user = $_SESSION['current'];
$user = substr($user, 1);

if(isset($_POST["alpha"])){
  $alpha = $_POST["alpha"];

  $query = "SELECT *
  FROM Midshipman where Alpha = $alpha";

  $stmt = $db->stmt_init();
  $stmt->prepare($query);



  $success = $stmt->execute();

  if (!$success || $db->affected_rows == 0) {
    echo "<h5>ERROR: " . $db->error . " for query *$query*</h5><hr>";
  }
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

// $alphaarray = array();
// $firstnamearray = array();
// $lastnamearray = array();
// $roomarray = array();
// $phonearray = array();
// $genderarray = array();
// $majorarray = array();
// $companyarray = array();
?>
<form method="post" action="midsinfo_mentors.php">
  Alpha: <input type="text" name="alpha"/>
  <input type="submit" value="Submit" name = "submit">

</form>
<?php

$stmt->bind_result($alpha, $firstName, $lastName, $room, $phone, $gender, $major, $company);
while ($row = $stmt->fetch()) {
  echo "<tr><td>$alpha</td><td>$firstName</td><td>$lastName</td><td>$room</td>
  <td>$phone</td><td>$gender</td><td>$major</td><td>$company</td></tr>";
  // $alphaarray[] = $alpha;
  // $firstnamearray[] = $firstname;
  // $roomarray[] = $room;
  // $phonearray[] = $phone;
  // $genderarray[] = $gender;
  // $majorarray[]= $major;
  // $companyarray[] = $company;

}
// $data = array();
// $data[] = $alphaarray;
// echo '<pre>'; print_r($data); echo '</pre>';
echo "</tbody></table>";

$stmt->close();
$page->display();
?>
