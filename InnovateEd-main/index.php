<?php
  include_once("includes/sql.php");
      // prepare and bind
    $stmt = $conn->prepare("SELECT * FROM innovation_cards  WHERE LENGTH(description) BETWEEN  140 and 160 ORDER BY RAND() LIMIT 4");
   // $stmt->bind_param("s", $userEmailToVerify);
    $stmt->execute();
    //fetch the results
    $result = $stmt->get_result();
    $stmt->close();
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
echo searchbar(" ");
?>

  <div class="py-3" style="background-image: linear-gradient(rgb(207, 239, 234), rgb(207, 239, 234)); background-position: left top; background-size: 100%; background-repeat: repeat;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="p-4" style="font-family:bevan">Unlock Innovation with our Byte Sized Information Cards</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="" style=""><img class="img-fluid d-block" src="assets/images/brain_pink_background-removebg-preview.png" width="80px"></div>
        <div class="col-md-3">
          <h4 class="mb-0" style="font-family:Open Sans; font-weight:600">Byte Size Cards</h4>
          <p style="" class="mb-0">We present science and technology information in byte sized cards that are easy to understand.</p>
        </div>
        <div class="" style=""><img class="img-fluid d-block" src="assets/images/brain_pink_background-removebg-preview.png" width="80px"></div>
        <div class="col-md-3 mb-0" style="">
          <h4 class="mb-0" style="font-family:Open Sans; font-weight:600">To Draw Inspiration</h4>
          <p style="" class="mb-0">Draw inspiration for your innovations by looking at what other people are building.</p>
        </div>
        <div class="" style=""><img class="img-fluid d-block" src="assets/images/brain_pink_background-removebg-preview.png" style="" width="80px"></div>
        <div class="col-md-3" style="">
          <h4 class="mb-0" style="font-family:Open Sans; font-weight:600">For STEM Learning</h4>
          <p class="mb-0">Cards Stimulates students interest, developing their problem-solving ability and critical thinking skills.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1" style="">
    <div class="container-fluid">
      <div class="col-md-12 text-center">
        <h1 class="mb-0" style="font-family:Bevan; padding:12px ">Latest Innovation</h1>
      </div>
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
  <div class="py-2" style=" background-image: linear-gradient(to bottom, #cfefea, #cfefea); background-position: top left;  background-size: 100%;  background-repeat: repeat;">
    <div class="py-1" style="">
      <div class="container-fluid">
        <div class="col-md-12 text-center">
          <h1 class="mb-0" style="font-family:Bevan; padding:12px ">Popular Innovation</h1>
        </div>
        <div class="row">
          <div class="masonry">


<?php

    $stmt = $conn->prepare("SELECT * FROM innovation_cards where NOT category='Artificial Intelligence' LIMIT 4 ");
   // $stmt->bind_param("s", $userEmailToVerify);
    $stmt->execute();
    //fetch the results
    $result = $stmt->get_result();
    $stmt->close();

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
  </div>
  <div class="" style="">
    <div class="py-1" style="">
      <div class="container-fluid">
        <div class="col-md-12 text-center">
          <h1 class="mb-0" style="font-family:Bevan; padding:12px ">AI Innovation</h1>
        </div>
        <div class="row">
          <div class="masonry">



<?php

    $stmt = $conn->prepare("SELECT * FROM innovation_cards where category='Artificial Intelligence' LIMIT 4 ");
   // $stmt->bind_param("s", $userEmailToVerify);
    $stmt->execute();
    //fetch the results
    $result = $stmt->get_result();
    $stmt->close();

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
  </div>
<?php include_once("includes/footer.php"); ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>