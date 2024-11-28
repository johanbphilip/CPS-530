<?php include("./dbconnect.php")?>

<?php
  $sql = "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('Profile Picture', 'Ontario', '2024-01-29', './images/picture1'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('GO Train Tracks at Union', 'Ontario', '2023-02-25', './images/picture2'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('LEGO Lamborghini', 'Ontario', '2023-02-25', './images/picture3'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('Formula 1 Car at Carshow', 'Ontario', '2023-02-25', './images/picture4'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('Downtown Toronto', 'Ontario', '2023-04-28', './images/picture5'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('Notre-Dame Basillica of Montreal', 'Quebec', '2023-07-11', './images/picture6'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('Funny sign at a Rudys BBQ', 'Texas', '2023-07-26', './images/picture7'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('Backyard pool', 'Texas', '2023-07-28', './images/picture8'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('Selfie in a Tux', 'Texas', '2023-07-29', './images/picture9'); ";
  $sql .= "INSERT INTO photos (subject, location, date_taken, picture_url) 
  VALUES ('Bride, Groom and friends', 'Texas', '2023-07-29', './images/picture10'); ";

  if (mysqli_multi_query($connect, $sql)) {
    echo "<p>The following entries were made succesfully: <br> <span style='color: red;'>". $sql ."</span></p>";
  } else {
    echo "<p>Error: ". $sql . "<br>" . mysqli_error($connect) . " </p>";
  }
  mysqli_close($connect);
?>
