<html>
<head>
  <?php
  require_once("mysql.inc.php");
  require_once("page.inc.php");
  ?>

</head>
<body>
  <?php

  $page = new Page("Mentor Sign-up");
  $db = new myConnectDB();          # Connect to MySQL

  if ((isset($_POST['password'])) && (isset($_POST['confirmpassword'])) && ($_POST['password'] == $_POST['confirmpassword'])){
    $query = "INSERT INTO Mentor (Email, Password, PermissionType, FirstName, LastName, OfficeNum, Phone, Department) VALUES (?, ?, 'notAdmin',?, ?, ?, ?, ?)";

    $email = $_POST["email"];
    $password = $_POST["password"];
  //  $confirmpassword = $_POST["confirmpassword"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $officenumber = $_POST["officenumber"];
    $phonenumber = $_POST["phonenumber"];
    $department = $_POST["department"];

    $stmt = $db->stmt_init();
    $stmt->prepare($query);

    $stmt->bind_param('sssssss', $email, $password, $firstname, $lastname, $officenumber, $phonenumber, $department);

    $success = $stmt->execute();

    if (!$success || $db->affected_rows == 0) {
      echo "<h5>ERROR: " . $db->error . " for query *$query*</h5><hr>";
    }
    echo "Account successfully created!";
    $stmt->close();
  }
  ?>
  <div>
    <form action='newmentor.php' method = 'post'>
      <table>
        <tr>
          <td>
            Email:
          </td>
          <td>
            <input type="email" name="email" required
            pattern="[a-zA-Z0-9.-_]{1,}@usna.edu"><br>
          </td>
        </tr>
        <tr>
          <td>
            Password:
          </td>
          <td>
            <input type="password" name="password" required><br>
          </td>
        </tr>
        <tr>
          <td>
            Confirm Password:
          </td>
          <td>
            <input type="password" name="confirmpassword" required><br>
          </td>
        </tr>
        <tr>
          <td>
            First Name:
          </td>
          <td>
            <input type="text" name="firstname" required><br />
          </td>
        </tr>
        <tr>
          <td>
            Last Name:
          </td>
          <td>
            <input type="text" name="lastname" required><br />
          </td>
        </tr>
        <tr>
          <td>
            Office Number:
          </td>
          <td>
            <input type="text" name="officenumber" required><br />
          </td>
        </tr>
        <tr>
          <td>
            Phone Number:
          </td>
          <td>
            <input type="tel" name="phonenumber" required><br />
          </td>
        </tr>
        <tr>
          <td>
            Department:
          </td>
          <td>
            <input type="text" name="department" required><br />
          </td>
        </tr>
      </table>

      <input type="submit" value="Submit" name = "submit">

    </form>
  </div>
    <div>
      <p> Done? <a href="mentor_login.php">Go to sign in</a></p>
    </div>
</body>
</html>
