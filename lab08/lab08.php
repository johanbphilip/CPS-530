<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 08</title>
</head>
<body style="display:flex; flex-direction:column;">
  <?php
    $hour = (int) date("H");
    if ($hour >= 5 && $hour <= 13) {
      $background = "morning_sky.jpg";
      $greeting = 'Good Morning';
      $header = "<h1 style='font-weight: bold; font-size: 30px; text-align: center; black: white; font-family:system-ui, -apple-system;'> $greeting</h1>";

    } elseif ($hour > 13 && $hour <= 17) {
      $background = "afternoon.jpg";
      $greeting = "Good Afternoon";
      $header = "<h1 style='font-weight: bold; font-size: 30px; text-align: center; color: white; font-family:system-ui, -apple-system;'> $greeting</h1>";

    } elseif ($hour > 17 && $hour <= 19) {
      $background = "evening.jpg";
      $greeting = "Good Evening";
      $header = "<h1 style='font-weight: bold; font-size: 30px; text-align: center; color: white; font-family:system-ui, -apple-system;'> $greeting</h1>";

    } else {
      $background = "night_sky.jpg";
      $greeting = 'Good Night';
      $header = "<h1 style='font-weight: bold; font-size: 30px; text-align: center; color: white; font-family:system-ui, -apple-system;'> $greeting</h1>";
    }
  ?>
    <h1 style="font-weight: bold; font-size: 30px; text-align: center; color: black; font-family:system-ui, -apple-system;">Problem 1</h1>
  <div style="height: 500px; width: full; background: url('assets/<?= $background?>') center center; padding: 10px;">
    <?= $header ?>
  </div>



  <div style="display:flex; flex-direction: column; gap: 10px; align-items:center ;">
    <h1 style="font-weight: bold; font-size: 30px; text-align: center; color: black; font-family:system-ui, -apple-system;">Problem 2</h1>
    <form action="problem2.php" method="post" style="display:flex; flex-direction: column; gap: 10px; width: 75%;">
      <div style="display:flex; gap:50px; justify-content: center;">
        <div style="display:flex; flex-direction: column; gap: 10px;">
          <label for="row">Enter the number for the Row</label>
          <input name="row" id="row" type="number">
        </div>
        <div style="display:flex; flex-direction: column; gap: 10px;">
          <label for="column">Enter the number for the Column</label>
          <input name="column" id="column" type="number">
        </div>
      </div>
      <button type="submit"> Submit</button>
    </form>
  </div>


  <div>
    <?php

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image'])) {

        setcookie('favorite_image', $_POST['image'], time() + 86400, "/");
        header("Location: " . $_SERVER['PHP_SELF']); 

        exit();
      }

      $selectedImage = isset($_COOKIE['favorite_image']) ? $_COOKIE['favorite_image'] : null;
    ?>

    <style>
      img {
        width: 300px;
      }
      h1{
        font-weight: bold; font-size: 30px; text-align: center; color: black; font-family:system-ui, -apple-system;
      }
      .top-right {
        position: fixed;
        top: 10px;
        right: 10px;
        display: flex;
        flex-direction: column;
        gap: 0px;
      }
      .selected-image {
        opacity: 75%;
      }
      .image-name {
        font-weight: bold;
        font-size: 32px;
        background-color: white;
        text-align: center;
      }
    </style>
    <h1>Problem 3</h1>
    <?php if ($selectedImage): ?>
      <div class="top-right">
        <img src='p3/<?php echo htmlspecialchars($selectedImage); ?>' class="selected-image">
        <p class="image-name"><?php echo htmlspecialchars($selectedImage); ?></p>
      </div>
    <?php else: ?>
      <p class="image-name">No image has been selected</p>
    <?php endif; ?>
    <form method='post'>
      <p>Please choose a picture to store in cookie:</p>
      <div>
        <input type='radio' name='image' value='thanks2.gif'>
        <img src='p3/thanks2.gif'></img>
      </div>
      <div >
        <input type='radio' name='image' value='disney.gif'>
        <img src='p3/disney.gif'></img>
      </div>
      <div >
        <input type='radio' name='image' value='family1.gif'>
        <img src='p3/family1.gif'></img>
      </div>
      <div >
        <input type='radio' name='image' value='tday.gif'>
        <img src='p3/tday.gif'></img>
      </div>
      <div >
        <input type='radio' name='image' value='turkey2.gif'>
        <img src='p3/turkey2.gif'></img>
      </div>
      <button type="submit">Submit</button>
    </form>
    
    

</body>
</html>