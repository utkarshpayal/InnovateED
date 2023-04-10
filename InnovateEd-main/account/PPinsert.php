<?php
if (isset($_POST['server'])) {
  // variables to store the value of databse options
  $server = $_POST['server'];
  $dbname = $_POST['dbname'];
  $dbuser = $_POST['dbuser'];
  $dbpass = $_POST['dbpass'];
  // Verify if the given info is correct
  $conn = new mysqli($server, $dbuser, $dbpass, $dbname);
  // Check connection
  if (!($conn->connect_error)) {
    //Set a var if the connection was successful
    $sql = True;
    //Create a table for BigPP
    $stmt = $conn->prepare("
        CREATE TABLE ph_BigPP (  
        userID int NOT NULL  AUTO_INCREMENT,
        userName varchar(50) NULL UNIQUE,
        userEmail varchar(50) NOT NULL UNIQUE,
        userPassword VARCHAR(256)NOT NULL,
        joinDate DATE NULL,
        PRIMARY KEY (userID)
        )
      ");
    $stmt->execute();
    //Close the connection now
    $stmt->close();
    $conn->close();

    //Creating the mysql config file sql.php 
    $sqlPHPData = '<?php
                    //set this file accordingly
                    $servername = "'.$server.'";
                    $username = "'.$dbuser.'";
                    $password = "'.$dbpass.'";
                    $dbname = "'.$dbname.'";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }
                    ';
    file_put_contents($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."includes/sql.php", $sqlPHPData);
    header("Location: login.php");
    die();
  }else{
    $sql = False;
  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
  <div class="py-5 text-center" style="">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h1 class="mb-4">Configure BigPP</h1>
          <?php
            if (isset($_POST['server']) && $sql != True) {
              // Display error paragraph
              echo "<p style='color:red;'>Connection failed. Please recheck your details.</p>";
              echo "<p>".$conn->connect_error."</p>";
            }


          ?>
          <form action="" method="post">
            <div class="form-group"><label style="opacity: 0.5;">Address of your database Server</label> <input type="text" class="form-control" placeholder="Server Address" id="form9" name="server" required value="localhost"> </div>
            <div class="form-group mb-3"><label style="opacity: 0.5;">Name of the Database that you want to use with BigPP</label> <input type="text" class="form-control" placeholder="Databse Name" id="form10" name="dbname" required> <small class="form-text text-muted text-right"><br></small>
              <div class="form-group"><label style="opacity: 0.5;">Mysql username</label><input type="text" class="form-control" id="form10" placeholder="User" name="dbuser" required>
                <div class="form-group"><label style="opacity: 0.5;">Your Mysql password</label><input type="password" class="form-control" placeholder="Password" id="form10" name="dbpass" required></div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>