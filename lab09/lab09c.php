<?php include("./dbconnect.php")?>

<?php
$sql = 'SELECT * FROM photos WHERE location = "Ontario"';
$result = mysqli_query( $connect, $sql );

echo '
  <style>
    .problem-3 {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
      gap:10px;
    }
    .image-container {
      font-family: helvetica;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
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
      height: 250px;
    }
  </style>';
  if ( mysqli_num_rows( $result ) > 0) {
    echo '<div class="problem-3">';
    while ( $row = mysqli_fetch_assoc( $result ) ) {
      echo '<div class="image-container">
      <img src="'.$row['picture_url'].'">
      <p class="subject-caption">'. $row['subject'].'</p>
      <p class="location-caption">' . $row['location'].'</p>
      </div>';
    }
    echo '</div>';
} else {
  echo '<p style="color:red; font-weight: bold;"> There are no photos taken in Ontario</p>';
}
mysqli_close( $connect );
?>