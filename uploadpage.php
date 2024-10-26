<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
// Logout yaaaaaaanemi
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("Location: login.html");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Project Information</title>

    <style>
        .project-list {
            list-style-type: none;
            padding: 0;
        }
        .project-item {
            margin: 10px 0;
        }
        .project-img img {
            max-width: 100%;
            height: auto;
            max-height: 200px; /* Set maximum height for consistency */
            width: auto; /* Ensure images scale proportionally */
        }
        .project-title {
            font-size: 1.5em;
            margin: 0.5em 0;
        }
        .project-subtitle {
            font-size: 1.2em;
            color: #777;
            margin: 0.3em 0;
        }
        .project-category {
            color: #666;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }
        .modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 90%;
        }
        .modal-content img {
            width: 100%;
            height: auto;
        }
        .modal-caption {
            margin: auto;
            display: block;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }
        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        /* Radio buttons styling */
        .category-options {
            display: flex;
            flex-direction: column;
        }
        .category-options label {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            cursor: pointer;
        }
        .category-options input[type="radio"] {
            display: none;
        }
        .category-options .custom-radio {
            display: inline-block;
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            user-select: none;
            font-size: 1em;
        }
        .category-options .custom-radio::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 20px;
            width: 20px;
            background-color: #f1f1f1;
            border: 2px solid #ddd;
            border-radius: 50%;
        }
        .category-options input[type="radio"]:checked + .custom-radio::before {
            background-color: #4CAF50; /* Default checked color */
            border-color: #4CAF50; /* Default checked color */
        }
        .category-options input[type="radio"]:checked + .custom-radio.custom-primary::before {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }
        .category-options input[type="radio"]:checked + .custom-radio.custom-secondary::before {
            background-color: #FF9800;
            border-color: #FF9800;
        }
        .category-options input[type="radio"]:checked + .custom-radio.custom-tertiary::before {
            background-color: #03A9F4;
            border-color: #03A9F4;
        }
        .category-options input[type="radio"]:checked + .custom-radio.custom-quaternary::before {
            background-color: #E91E63;
            border-color: #E91E63;
        }
        .category-options input[type="radio"]:checked + .custom-radio.custom-quinary::before {
            background-color: #9C27B0;
            border-color: #9C27B0;
        }
        .category-options input[type="radio"]:checked + .custom-radio.custom-senary::before {
            background-color: #009688;
            border-color: #009688;
        }
    </style>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/Screenshot 2024-07-15 185357.png" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  
  

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

    <!--
      - #MAIN
    -->
  
    <main>
  
      
  
      <div class="main-content">
  
        <!--
          - #NAVBAR
        -->
  
        <nav class="navbar">
  
          <ul class="navbar-list">
  
            <li class="navbar-item">
              <button class="navbar-link  active" data-nav-link>add project</button>
            </li>
  
          </ul>
  
        </nav>
  
  
  
  
  
        <!--
          - #ABOUT
        -->
  
        <article class="about  active" data-page="about">
          <br>
          <br>
  
  
          <header>
            <h2 class="articletitlenext article-title">add project</h2>
          </header>
  
          <section class="contact-form">
      
            
      
          
                 <!-- Updated Form -->
                 <form action="uploadold.php" class="form" method="POST" enctype="multipart/form-data">
    <div class="input-wrapper">
        <input type="text" id="title" name="title" required class="form-input" placeholder="title">
        <input type="text" id="subtitle" name="subtitle" class="form-input" placeholder="subtitle">

        <label for="images">Upload Images</label>
        <input type="file" id="images" name="images[]" accept="image/*" multiple required class="form-input">

        <label for="videos">Upload Videos</label>
        <input type="file" id="videos" name="videos[]" accept="video/*" multiple required class="form-input">

        <label for="thumbnail">Select Thumbnail</label>
        <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required class="form-input">

                        <!-- Category Options (unchanged) -->
                        <div class="category-options">
                    <label for="web_mobile_app" style="color: #ffffff;">
                        <input type="radio" id="web_mobile_app" name="category" value="web/mobile app" required>
                        <span class="custom-radio custom-primary">Web/Mobile App</span>
                    </label>
                    <label for="infographics" style="color: #ffffff;">
                        <input type="radio" id="infographics" name="category" value="infographics" required>
                        <span class="custom-radio custom-secondary">infographics</span>
                    </label>
                    <label for="video_editing" style="color: #ffffff;">
                        <input type="radio" id="video_editing" name="category" value="video editing" required>
                        <span class="custom-radio custom-tertiary">Video editing</span>
                    </label>
                    <label for="motion_graphics" style="color: #ffffff;">
                        <input type="radio" id="motion_graphics" name="category" value="motion graphics" required>
                        <span class="custom-radio custom-quaternary">Motion Graphics</span>
                    </label>
                    <label for="3d_art" style="color: #ffffff;">
                        <input type="radio" id="3d_art" name="category" value="3d art" required>
                        <span class="custom-radio custom-quinary">3d Art</span>
                    </label>
                    <label for="3d_animations_vfx" style="color: #ffffff;">
                        <input type="radio" id="3d_animations_vfx" name="category" value="3d animations/vfx" required>
                        <span class="custom-radio custom-senary">3d animations/vfx</span>
                    </label>
                </div>
                        <br><br>

                        <!-- Submission button -->
                        <div style="display: flex; justify-content: center; align-items: center;">
                        <button class="form-btn" type="submit">
            <ion-icon name="paper-plane"></ion-icon>
            <span>Upload</span>
        </button>
                        </div>
                    </div>
                </form>

              
            

              <button class="form-btn" type="submit" value="Logout" style="display: flex; justify-content: center; align-items: center;">
              <ion-icon name="exit-outline"></ion-icon>
                <span>logout</span>
              </button>
              <br>
              

              <a href="index.php" class="nav-button">
  <button type="button" class="form-btn">
    <ion-icon name="home-outline"></ion-icon>
    <span>Home</span>
  </button>
</a>

              
              
             

      
          </section>
        </article>
  
      </div>
  
    </main>
  
  
    <!--
      - custom js link
    -->
    <script src="./assets/js/script.js"></script>
  
    <!--
      - ionicon link
    -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
  </body>
  
  </html>