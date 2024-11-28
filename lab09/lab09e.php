<?php include("./dbconnect.php")?>
<?php 
  $sql = "SELECT COUNT(*) AS count FROM photos";
  $result = mysqli_query($connect, $sql);
  $total_rows = mysqli_fetch_assoc($result);
  $total = $total_rows["count"];

  $sql = "SELECT * FROM photos ORDER BY RAND() LIMIT 1";
  $result = mysqli_query($connect, $sql);
  $random = mysqli_fetch_assoc($result);


  echo '
  <style>
    .problem-3 {
      margin-top: 100px;
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
    }
    .image-container {
      font-family: helvetica;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 1px;
    }
    .subject-caption {
      font-weight: bold;
      color: green;
    }  
    .location-caption {
      font-weight: bold;
      color: red;
    }   
    img {
      height: 300px;
    }
  </style>';

  if ($random) {
    echo '<div class="problem-3">';
      echo '<div class="image-container">
      <img src="'.$random['picture_url'].'">
      <p class="subject-caption">'. $random['subject'].' - <span style="color: red;"> '. $random['location']. ' </span></p>
      <p> there are a total of: <b>'. $total .'</b> images in the database </p>
      </div>';
    echo '</div>';
  } else {
    echo '<p style="color:red; font-weight: bold;"> There are no entries to choose a random one from </p>';
  }

?>
