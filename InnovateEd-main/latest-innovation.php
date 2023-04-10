<?php
  include_once("includes/sql.php");
      // prepare and bind
    $stmt = $conn->prepare("SELECT * FROM innovation_cards ORDER BY RAND()   ");
   // $stmt->bind_param("s", $userEmailToVerify);
    $stmt->execute();
    //fetch the results
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();

    


?>  
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="assets/style/Untitled.css">
  <link rel="stylesheet" href="assets/style/card-style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Bevan&amp;display=swap" rel="stylesheet">
  <link rel="manifest" href="manifest.json">
<script src="myscript.js"></script>
  <style type="text/css">
    .overlay-class {
      background-image: linear-gradient(rgba(0, 0, 0, 0.49), rgba(0, 0, 0, 0.49)), url("assets/images/809883.jpg");
    }

    .searchbar {
      background-color: rgb(226 222 222 / 42%);
      border-color: #000 !important;
    }

    .searchbar form-control text-white {
      color: white;
    }

    .nav-item {
      font-family: Bevan;
    }
  </style>
</head>

<body style=" border-top-right-radius: 15px;  border-bottom-right-radius: 15px;">
<?php include_once("includes/header.php");
include_once("includes/searchbar.php"); 
echo searchbar("Latest Innovation");
 ?>

  <div class="py-1" style="">
    <div class="container-fluid">
      <div class="row">
        <div class="masonry">

            <?php
            while ($fetchedArray= $result->fetch_assoc()) {
              echo <<< card
                  <div class="item">
                  <img src="${fetchedArray["image"]}">
                  <div class="header">
                    <h2>${fetchedArray["title"]}</h2>
                  </div>
                  <div class="para">
                    <p>${fetchedArray["description"]}</p>
                  </div>
                  <div class="footer">
                    <button class="padding:6px; width:auto;">${fetchedArray["category"]}</button>
                  </div>
                </div>
              card;
              
            }
            ?>  

        </div>
      </div>
    </div>
  </div>
<?php include_once("includes/footer.php"); ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>