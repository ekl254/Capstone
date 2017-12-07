<html lang="en">
<head>
  <meta charset="utf-8">
  <style>
  body{background: #d5d5d5;  top center repeat-x #fff;}
  </style>
  <?php
  session_start();

  require_once("mysql.inc.php");
  require_once("page.inc.php");
  $page = new Page("Mentor Login");
  $db = new myConnectDB();
  //$data = read_csv('21.csv',True,True,",");
  //$_SESSION["nonce"] = "8974564654654564";
  ?>
  <script src="sha256.js" type="text/javascript"></script>

</head>
<body>
  <title>
    Login -- ASATS
  </title>

  <div style= "text-align:center;"><image height="150" width="500" src="./ASATS.png"></div>
    <div class="row">
      <div class="col-md-4">
        <center>
          <div
          <h2>Please sign in</h2>

          <form action='' method = 'post'>
            <!-- <input type="text" name="login" placeholder="Username" required autofocus> <br> -->
            <input type="text" name="username" id = "user"><br>
            <!-- <input type="password" name="password" placeholder="Password" required> -->
            <input type="password" name="password" id = "pass"><br />
            <br>
            <br>
            <input type="submit" value="Login" name = "submit">
          </form>
          <?php
          if(isset($_POST['submit'])){
            $username = "";//$_POST["username"];
            $password = "";//$_POST["password"];

            $query = "SELECT Email, Password FROM Mentor";

            $stmt = $db->stmt_init();
            $stmt->prepare($query);

            $success = $stmt->execute();

            if (!$success || $db->affected_rows == 0) {
              echo "<h5>ERROR: " . $db->error . " for query *$query*</h5><hr>";
            }
            $stmt->bind_result($username, $password);
            while ($row = $stmt->fetch()) {
              // echo $username;
              // echo $password;
              // echo $_POST["username"];
              // echo $_POST["password"];
            }

            if($password == "" || $username == ""){
              echo "\nInvalid Login!";
              $_SESSION["current"] = "";
            }
            else if($username == $_POST["username"]&& $password == $_POST["password"]){
              echo "Logged in!";
              $_SESSION["usersLoggedIn"][] = $_POST["username"];
              $_SESSION["current"] = $_POST["username"];
              header('Location:mentor_template.php');
            }
            else{
              echo "\nInvalid Login!!!";
              $_SESSION["current"] = "";
            }
          }
          ?>
          <br>
          <p> Need access? <a href="newmentor.php">Request Account</a></p>
        </div>
      </center>
    </div>
    <br>
    <br>
    <br>
    <div class="col-md-8">
      <div class="jumbotron">
        <p> <center> <div style = "display: inline-block; text-align: left;">
          <b>You are accessing a U.S. Government (USG) Information System (IS) <br>
            that is provided for USG-authorized use only.
          </b>
          <br>
          <br>
          By using this IS (which includes any device attached to this IS), <br>
          you consent to the following conditions:
          <ol>
            <li>The USG routinely intercepts and monitors communications on this IS for <br>
              purposes including, but not limited to, penetration testing, COMSEC monitoring, <br>
              network operations and defense, personnel misconduct (PM), law enforcement (LE), <br>
              and counterintelligence (CI) investigations.</li>

              <li>At any time, the USG may inspect and seize data stored on this IS.</li>

              <li>Communications using, or data stored on, this IS are not private, are <br>
                subject to routine monitoring, interception, and search, and may be disclosed or <br>
                used for any USG-authorized purpose.</li>

                <li>This IS includes security measures (e.g., authentication and access controls) <br>
                  to protect USG interests--not for your personal benefit or privacy.</li>

                  <li>Notwithstanding the above, using this IS does not constitute consent to PM, <br>
                    LE or CI investigative searching or monitoring of the content of privileged <br>
                    communications, or work product, related to personal representation or services <br>
                    by attorneys, psychotherapists, or clergy, and their assistants. Such <br>
                    communications and work product are private and confidential. See User Agreement <br>
                    for details.</li>
                  </ol> </center>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    <?php
     // echo '<pre>'; print_r($_SESSION); echo '</pre>';
     ?>

    <script type="text/javascript">
    function getNonce() {
      var ar = <?php echo json_encode($_SESSION['nonce']) ?>;
      return ar;
    }
    function computeHashed() {
      var enteredPassword = document.getElementById('pass');
      var results = Sha256.hash(enteredPassword.value+getNonce());
      document.getElementById("pass").value = results;
    }

    </script>
    </html>
