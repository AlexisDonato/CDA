<?php
// On se connecte à la BDD via notre fichier db.php :
require "db.php";
$artists = fetchDisc();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Discs</title>
</head>

<body>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-9 ml-0 p-0">
                <h1>Discs list(<?php echo count($artists)?>)</h1>
            </div>
            <div class="col-3">
                <a href="disc_new.php"><button class="btn btn-primary btn-sm">Add disc</button></a>
                <input type="button" class="btn btn-primary btn-sm" value="Back" onclick="history.back()">
            </div>
        </div>

        <?php 
      $col = 1;
      foreach ($artists as $artist) {
        if ($col == 1)
            echo '<div class="row mb-2">';
        
        displayDisc($artist);

        if ($col == 2) {
          echo '</div>';
          $col = 1;
        }
        else $col++;
      }
      ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>