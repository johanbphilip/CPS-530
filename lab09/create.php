<?php include("../webdev/dbconnect.php")?>

<div style="font-size:28px; color:red; font-family:helvetica">
  <?php 
    $sql = "CREATE TABLE IF NOT EXISTS photos (
      picture_number INT AUTO_INCREMENT PRIMARY KEY,
      subject VARCHAR(255),
      location VARCHAR(255), 
      date_taken DATE,
      picture_url  VARCHAR(255)
    );";

    if (mysqli_query($connect, $sql)) {
      echo "New photos table created successfully.<br>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
  ?>
</div>