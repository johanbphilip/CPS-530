<?php include("./dbconnect.php")?>


<?php 
echo '<form action="lab09d.php" method="POST" style="display: flex; justify-content: center; gap: 20px; font-family: helvetica;">
<label for="location" >Location:</label>
<select name="location" id="location">
    <option value="">--Select Location--</option> ';
    $location_query = "SELECT DISTINCT location FROM photos";
    $result_location = mysqli_query($connect, $location_query);

    if (mysqli_num_rows($result_location) > 0) {
        while ($row = mysqli_fetch_assoc($result_location)) {
            echo "<option value='" . $row['location'] . "'>" . $row['location'] . "</option>";
        }
    }
echo '</select>

<label for="year">Year:</label>
<select name="year" id="year">
    <option value="">--Select Year--</option>';
    
    $year_query = "SELECT DISTINCT YEAR(date_taken) AS year FROM photos ORDER BY year DESC";
    $result_year = mysqli_query($connect, $year_query);

    if (mysqli_num_rows($result_year) > 0) {
        while ($row = mysqli_fetch_assoc($result_year)) {
            echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
        }
    }
echo '</select>

<button type="submit" name="submit">Search</button>
</form>';






if (isset($_POST['submit'])) {
  $location = mysqli_real_escape_string($connect, $_POST['location']);
  $year = mysqli_real_escape_string($connect, $_POST['year']);

  $sql = "SELECT * from photos WHERE 1=1";
  if (!empty($location)) {
    $sql .= " AND location = '$location'";
  }
  if (!empty($year)) {
    $sql .= " AND YEAR(date_taken) = '$year'";
  }
  $sql .= " ORDER BY date_taken DESC";

  $result = mysqli_query($connect, $sql);


  echo '
  <style>
    .problem-3 {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      gap: 20px;
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

  if ( mysqli_num_rows( $result ) > 0) {
    echo '<div class="problem-3">';
    while ( $row = mysqli_fetch_assoc( $result ) ) {
      echo '<div class="image-container">
      <img src="'.$row['picture_url'].'">
      <p class="subject-caption">'. $row['subject'].'</p>
      <p class="location-caption">' . $row['location']. ' - '. $year .'</p>
      </div>';
    }
    echo '</div>';
  } else {
    echo '<p style="color:red; font-weight: bold;"> There are no photos that are taken in '.$location. ' during '. $year .'</p>';
  }
}
?>
