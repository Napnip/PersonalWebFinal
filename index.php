<?php

include 'config.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
    <nav>
      <div class="logo">
        <img src="Logo.png" alt="Logo" />
      </div>
      <div class="nav-items">
        <a href="./pwnr/home.html">Home</a> <a href="./pwnr/projects.html">Projects</a> <a href="./pwnr/skill.html">Skill</a> <a href="index.php">Contact</a>
      </div>
    </nav>
    <section class="bg">
      <div class="bg-container">
        <div class="column-left">
          <div class="button-container">
            <input type="button" value="Login" onclick="window.location.href='index2.php';" style="background-color: #8B4513; color: #fff;">
          </div>
        </div>

        <div class="column-right">
          <!-- Text in the upper middle -->
          <div class="contact-text">
            <h2>Contact Me:</h2>
          </div>
          <div class="social-icons">
            <div class="social-icon">
              <i class='bx bxl-facebook-square'></i>
              <span>facebook.com/TheListlessOne/</span>
            </div>
            <div class="social-icon">
              <i class='bx bxl-linkedin-square'></i>
              <span>linkedin.com/in/archie-verania-72a89a288</span>
            </div>
            <div class="social-icon">
              <i class='bx bxl-twitter'></i>
              <span>twitter.com/Chachii1130</span>
            </div>
            <div class="social-icon">
              <i class='bx bxl-github'></i>
              <span>github.com/Napnip</span>
            </div>
            <!-- Add more social media icons and text as needed -->
          </div>
        </div>
        
    </section>
  </body>
</html>
