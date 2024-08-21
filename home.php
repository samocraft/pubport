<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connection.php';

$sql = "SELECT * FROM projects";
$all_data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oussama seddiki</title>

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

    <!--
      - #SIDEBAR
    -->

    <aside class="sidebar" data-sidebar>

      <div class="sidebar-info">

        <figure class="avatar-box">
          <img src="./assets/images/my-avatar.png" alt="Seddiki Oussama" width="80">
        </figure>

        <div class="info-content">
          <h1 class="name" title="Seddiki Oussama">Seddiki Oussama</h1>

          <p class="title">Artistic director</p>
        </div>

        <button class="info_more-btn" data-sidebar-btn>
          <span>Show Contacts</span>

          <ion-icon name="chevron-down"></ion-icon>
        </button>

      </div>

      <div class="sidebar-info_more">

        <div class="separator"></div>

        <ul class="contacts-list">

          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Email</p>

              <a href="sdioussama2@gmail.com" class="contact-link">sdioussama2@gmail.com</a>
            </div>

          </li>

          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="phone-portrait-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Phone</p>

              <a href="tel:+12133522795" class="contact-link">+213 779972316</a>
            </div>

          </li>


          <li class="contact-item">

            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Location</p>

              <address>Algiers algeria</address>
            </div>

          </li>

        </ul>

        <div class="separator"></div>

        <ul class="social-list">

          <li class="social-item">
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li class="social-item">
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li class="social-item">
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

    </aside>





    <!--
      - #main-content
    -->

    <div class="main-content">

      <!--
        - #NAVBAR
      -->

      <nav class="navbar">

        <ul class="navbar-list">

          <li class="navbar-item">
            <button class="navbar-link  active" data-nav-link>About</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Resume</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Portfolio</button>
          </li>

           <!--<li class="navbar-item">
            <button class="navbar-link" data-nav-link>Blog</button>
          </li>-->

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Contact</button>
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
          <h2 class="h2 article-title">About me</h2>
        </header>

        <section class="about-text">
          <p>
            I'm Creative Director and UI/UX Designer from Algiers, Algeria, working in 2D 3D art and print media.
            I enjoy turning complex problems into simple, beautiful and intuitive designs.
          </p>

          <p>
            My job is to put life in your ideas so that it is more understandable and user-friendly but at the same time attractive.
            Moreover, I
            add personal touch to your product and make sure that is eye-catching and easy to use. My aim is to bring
            across your
            message and identity in the most creative way. 
          </p>
        </section>


        <!--
          - service
        -->

        <section class="service">

          <h3 class="h3 service-title">What i'm doing</h3>

          <ul class="service-list">

            <li class="service-item">

              <div class="service-icon-box">
                <img src="./assets/images/icon-design.svg
                " alt="design icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">Web design</h4>

                <p class="service-item-text">
                  The most modern and high-quality design made at a professional and luxurious level.
                </p>
              </div>

            </li>

            <li class="service-item">

              <div class="service-icon-box">
                <img src="./assets/images/icon-app.svg" alt="mobile app icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">App Design</h4>

                <p class="service-item-text">
                  you can get the result of many years of experience in creating 
                  android / IOS apps design for many companies and ALOT of startups.
                </p>
              </div>

            </li>


            <li class="service-item">

              <div class="service-icon-box">
                <img src="./assets/images/icon-Branding.svg" alt="camera icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">Branding</h4>

                <p class="service-item-text">
                  whatever your field is i will make your brand Unbelievably unforgotten.
                </p>
              </div>

            </li>

            <li class="service-item">

              <div class="service-icon-box">
                <img src="./assets/images/icon-video.svg
                " alt="design icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">Video editing / Motion graphics</h4>

                <p class="service-item-text">
                  The most modern and high-quality design made at a professional and luxurious level.
                </p>
              </div>

            </li>

            <li class="service-item">

              <div class="service-icon-box">
                <img src="./assets/images/icon-3D.svg
                " alt="design icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">3D Art / Animation</h4>

                <p class="service-item-text">
                  from all my experience in making 3d animation and vfx for VR experiences, games and advertisement videos i can provide 
                  a well done 3d aniamtions to impress your targeted audience.
                </p>
              </div>

            </li>

            <li class="service-item">

              <div class="service-icon-box">
                <img src="./assets/images/icon-marketing.svg
                " alt="design icon" width="40">
              </div>

              <div class="service-content-box">
                <h4 class="h4 service-item-title">Marketing and business developement</h4>

                <p class="service-item-text">
                  after deep research in psychology and community managment and the art of negociations i am able 
                  to create marketing strategies and negociating deals within the teams i work with and potential clients.
                </p>
              </div>

            </li>

          </ul>

        </section>


        <!--
          - testimonials
        -->

        <section class="testimonials">

          <h3 class="h3 testimonials-title">Testimonials</h3>

          <ul class="testimonials-list has-scrollbar">

            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>

                <figure class="testimonials-avatar-box">
                  <img src="./assets/images/avatar-1.png" alt="Daniel lewis" width="60" data-testimonials-avatar>
                </figure>

                <h4 class="h4 testimonials-item-title" data-testimonials-title>Richard kroft</h4>

                <div class="testimonials-text" data-testimonials-text>
                  <p>
                    Oussama was hired to create a multipple creative design propositions for mobile apps
                    and web apps he never had a problem showing his creative side to the company nor to  their clients
                  </p>
                </div>

              </div>
            </li>

            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>

                <figure class="testimonials-avatar-box">
                  <img src="./assets/images/avatar-06.png" alt="Jessica miller" width="60" data-testimonials-avatar>
                </figure>

                <h4 class="h4 testimonials-item-title" data-testimonials-title>Chafik Gasmi</h4>

                <div class="testimonials-text" data-testimonials-text>
                  <p>
                    oussama is a suiss knife can adapt to situations and his humain skills make him able to overcome situations.
                  </p>
                </div>

              </div>
            </li>

            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>

                <figure class="testimonials-avatar-box">
                  <img src="./assets/images/avatar-3.png" alt="Emily evans" width="60" data-testimonials-avatar>
                </figure>

                <h4 class="h4 testimonials-item-title" data-testimonials-title>Amina samail</h4>

                <div class="testimonials-text" data-testimonials-text>
                  <p>
                    we hired oussama because we saw in him what most young men lack, consistancy and commitment.
                  </p>
                </div>

              </div>
            </li>

            <li class="testimonials-item">
              <div class="content-card" data-testimonials-item>

                <figure class="testimonials-avatar-box">
                  <img src="./assets/images/avatar-4.png" alt="Henry william" width="60" data-testimonials-avatar>
                </figure>

                <h4 class="h4 testimonials-item-title" data-testimonials-title>Ramon goumzak</h4>

                <div class="testimonials-text" data-testimonials-text>
                  <p>
                    as a startup we faced many problems that has been solved, and the commun thing about those problems 
                    is oussama because he always knew how to solve those problems in a way where they never re surface again.
                  </p>
                </div>

              </div>
            </li>

          </ul>

        </section>


        <!--
          - testimonials modal
        -->

        <div class="modal-container" data-modal-container>

          <div class="overlay" data-overlay></div>

          <section class="testimonials-modal">

            <button class="modal-close-btn" data-modal-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

            <div class="modal-img-wrapper">
              <figure class="modal-avatar-box">
                <img src="./assets/images/avatar-1.png" alt="Daniel lewis" width="80" data-modal-img>
              </figure>

              <img src="./assets/images/icon-quote.svg" alt="quote icon">
            </div>

            <div class="modal-content">

              <h4 class="h3 modal-title" data-modal-title>Daniel lewis</h4>

              <time datetime="2021-06-14">14 June, 2021</time>

              <div data-modal-text>
                <p>
                  Richard was hired to create a corporate identity. We were very pleased with the work done. She has a
                  lot of experience
                  and is very concerned about the needs of client. Lorem ipsum dolor sit amet, ullamcous cididt
                  consectetur adipiscing
                  elit, seds do et eiusmod tempor incididunt ut laborels dolore magnarels alia.
                </p>
              </div>

            </div>

          </section>

        </div>


        <!--
          - clients
        

        <section class="clients">

          <h3 class="h3 clients-title">Clients</h3>

          <ul class="clients-list has-scrollbar">

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-1-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-2-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-3-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-4-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-5-color.png" alt="client logo">
              </a>
            </li>

            <li class="clients-item">
              <a href="#">
                <img src="./assets/images/logo-6-color.png" alt="client logo">
              </a>
            </li>

          </ul>

        </section>
-->
      </article>





      <!--
        - #RESUME
      -->

      <article class="resume" data-page="resume">

        <header>
          <h2 class="h2 article-title">Resume</h2>
        </header>

        <section class="timeline">

          <ol class="timeline-list">

            

        </section>

        
          <section class="service">

            <h3 class="h3 service-title">My Skills</h3>
  
            <ul class="service-list">
  
              <li class="service-item">
  
                <div class="service-icon-box">
                  <img src="./assets/images/Illustrator.svg
                  " alt="design icon" width="40">
                </div>
  
                <div class="service-content-box">
                  <h4 class="h4 service-item-title">Senior level with Adobe illustrator</h4>
  
                  
                </div>
  
              </li>
  
              <li class="service-item">
  
                <div class="service-icon-box">
                  <img src="./assets/images/Photoshop.svg" alt="mobile app icon" width="40">
                </div>
  
                <div class="service-content-box">
                  <h4 class="h4 service-item-title">Senior level with Adobe photoshop</h4>
  
                
                </div>
  
              </li>
  
  
              <li class="service-item">
  
                <div class="service-icon-box">
                  <img src="./assets/images/Adobe Premiere Pro.svg" alt="camera icon" width="40">
                </div>
  
                <div class="service-content-box">
                  <h4 class="h4 service-item-title">Senior level with Adobe Premiere pro</h4>
  
                 
                </div>
  
              </li>
  
              <li class="service-item">
  
                <div class="service-icon-box">
                  <img src="./assets/images/Adobe Xd.svg
                  " alt="design icon" width="40">
                </div>
  
                <div class="service-content-box">
                  <h4 class="h4 service-item-title">Senior level with Adobe XD</h4>
  
                  
                </div>
  
              </li>
  
              <li class="service-item">
  
                <div class="service-icon-box">
                  <img src="./assets/images/Adobe After Effects.svg
                  " alt="design icon" width="50">
                </div>
  
                <div class="service-content-box">
                  <h4 class="h4 service-item-title">Junior level with Adobe After effects</h4>
  
                  
                </div>
  
              </li>
  
              <li class="service-item">
  
                <div class="service-icon-box">
                  <img src="./assets/images/unreal engine.svg
                  " alt="design icon" width="40">
                </div>
  
                <div class="service-content-box">
                  <h4 class="h4 service-item-title">intermediate level with Unreal engine 5</h4>
  
                  
                </div>
  
              </li>

              <li class="service-item">
  
                <div class="service-icon-box">
                  <img src="./assets/images/cinema4d 1.svg
                  " alt="design icon" width="40">
                </div>
  
                <div class="service-content-box">
                  <h4 class="h4 service-item-title">Senior level with Cinema 4D</h4>
  
                 
                </div>
  
              </li>

              <li class="service-item">
  
                <div class="service-icon-box">
                  <img src="./assets/images/Blender.svg
                  " alt="design icon" width="40">
                </div>
  
                <div class="service-content-box">
                  <h4 class="h4 service-item-title">intermediate level with blender</h4>
  
                 
                </div>
  
              </li>
  
            </ul>
  
          </section>
      
 <!--
        - #fin card skill
      -->

      <section class="timeline">

        <div class="title-wrapper">
          <div class="icon-box">
            <ion-icon name="book-outline"></ion-icon>
          </div>

          <h3 class="h3">Experience</h3>
        </div>

        <ol class="timeline-list">

          <li class="timeline-item">

            <h4 class="h4 timeline-item-title">Graphic designer & project manager at Chafik studio</h4>

            <span>2023-2024</span>

            <p class="timeline-text">
              creation of various types of graphic materials such as illustrations,UI/UX experiences, 3D modeling, optimization for VR games 
              creating materials and VFX 
            </p>

          </li>

          <li class="timeline-item">

            <h4 class="h4 timeline-item-title">3D artist at inspiration tuts</h4>

            <span>2022 — 2023</span>

            <p class="timeline-text">
              testing products from major 3D industries and creating articles and repport about the experience while
              creatimg some scenes using those tools.
            </p>

          </li>

          <li class="timeline-item">

            <h4 class="h4 timeline-item-title">graphic designer and community manager at AZ motivation</h4>

            <span>June 2022 —  october 2022</span>

            <p class="timeline-text">
              refining the brand book and fixing all identity problems while replacing the old one with new refined one and 
              doubling the reach with digital marketing strategies 
            </p>

          </li>
          <li class="timeline-item">

            <h4 class="h4 timeline-item-title">creative manager for hubforward,Mandis and abu dhabi reaserch center</h4>

            <span>mars 2022-june 2022</span>

            <p class="timeline-text">
              creating presentations, logos, UI/UX experiences and infographics for 3 major clients of a business where i had to come up 
              with creative ways to transform ideas to reality 
            </p>

          </li>

          <li class="timeline-item">

            <h4 class="h4 timeline-item-title">graphic designer and community manager at Kaiztech </h4>

            <span>2021-2022</span>

            <p class="timeline-text">
              a startup studio need a creative mind to put life to his ideas and that is exactly my job. 
              i created various type of designs for mobile apps, web apps, logos, brand books, presentations, motion graphic video ads,
              digital marketing strategies and many other accomplishments that made me a share holder at kaiztech 
            </p>

          </li>

          <li class="timeline-item">

            <h4 class="h4 timeline-item-title">graphic designer & community manager at SBS algeria</h4>

            <span>2021 — 2020</span>

            <p class="timeline-text">
              sbs is a multi solution provider that works on various fronts and as heir creative side i had to keep up 
              with theire technical side and present it in an apealing way to promot those services from engineering to ecommerce to maintenance services.
            </p>

          </li>
          <li class="timeline-item">

            <h4 class="h4 timeline-item-title">graphic designer at Digital solutions </h4>

            <span>2019 — 2020</span>

            <p class="timeline-text">
              creation of various types of graphic materials such as
illustrations, posts, teasers, video presentations and
marketing strategies for international companies such
as HippiTounsy Errachma Oilybia and others.
            </p>

          </li>

          <br>
        </ol>

      </article>





      <!--
        - #PORTFOLIO
      -->

      <article class="portfolio" data-page="portfolio">

        <header>
          <h2 class="h2 article-title">Portfolio</h2>
        </header>

        <section class="projects">

          <ul class="filter-list">

            <li class="filter-item">
              <button class="active" data-filter-btn>All</button>
            </li>

            <li class="filter-item">
              <button data-filter-btn>web/mobile app</button>
            </li>
            
            <li class="filter-item">
              <button data-filter-btn>Infographics</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn>Video editing</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn>motion graphics</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn>3D art</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn>3D animations/VFX</button>
            </li>
          </ul>

          <div class="filter-select-box">

            <button class="filter-select" data-select>

              <div class="select-value" data-selecct-value>Select category</div>

              <div class="select-icon">
                <ion-icon name="chevron-down"></ion-icon>
              </div>

            </button>

            <ul class="select-list">

              <li class="select-item">
                <button data-select-item>All</button>
              </li>

              <li class="select-item">
                <button data-select-item>web/mobile app</button>
              </li>

              <li class="select-item">
                <button data-select-item>Infographics</button>
              </li>

              <li class="select-item">
                <button data-select-item>Video editing</button>
              </li>

              <li class="select-item">
                <button data-select-item>motion graphics</button>
              </li>

              <li class="select-item">
                <button data-select-item>3D art</button>
              </li>

              <li class="select-item">
                <button data-select-item>3D animations/VFX</button>
              </li>

            </ul>

          </div>
          
          
          <ul class="project-list">
          <?php if ($all_data): ?>
            <?php foreach ($all_data as $row): ?>
          <li class="project-item  active" data-filter-item data-category="<?php echo htmlspecialchars($row['category']); ?>">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('<?php echo htmlspecialchars($row['picture']); ?>');"></div>
                </figure>

                <h3 class="project-title"><?php echo htmlspecialchars($row['title']); ?></h3>

                <p class="project-category"><?php echo htmlspecialchars($row['subtitle']); ?></p>

              </a>
            </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No projects found.</li>
        <?php endif; ?>
    </ul>

    </script>

<!--
          rest of projects
        
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="./assets/images/project-2.png" alt="orizon" loading="lazy">
                </figure>

                <h3 class="project-title">Orizon</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="./assets/images/project-3.jpg" alt="fundo" loading="lazy">
                </figure>

                <h3 class="project-title">Fundo</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="./assets/images/project-4.png" alt="brawlhalla" loading="lazy">
                </figure>

                <h3 class="project-title">Brawlhalla</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="./assets/images/project-5.png" alt="dsm." loading="lazy">
                </figure>

                <h3 class="project-title">DSM.</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="./assets/images/project-6.png" alt="metaspark" loading="lazy">
                </figure>

                <h3 class="project-title">MetaSpark</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="./assets/images/project-7.png" alt="summary" loading="lazy">
                </figure>

                <h3 class="project-title">Summary</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>

                  <img src="./assets/images/project-8.jpg" alt="task manager" loading="lazy">
                </figure>

                <h3 class="project-title">Task Manager</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>

            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/pr1.png');"></div>
                </figure>

                <h3 class="project-title">WAZA APP</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/image_processing20211023-13911-z2hg33.png');"></div>
                </figure>

                <h3 class="project-title">Black friday theme</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/image_processing20211023-25337-vz5s49.png');"></div>
                </figure>

                <h3 class="project-title">social network app</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/image_processing20220221-1157-1coftl5.png');"></div>
                </figure>

                <h3 class="project-title">E-commerce app</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/image_processing20220224-11249-1sf1hh9.png');"></div>
                </figure>

                <h3 class="project-title"><Textarea:rows></Textarea:rows>ransportation app</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/image_processing20220224-8787-15nouy3.png');"></div>
                </figure>

                <h3 class="project-title">Dark theme networking app</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/image_processing20220224-13929-1bqonui.png');"></div>
                </figure>

                <h3 class="project-title">Light theme networking app</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/image_processing20220224-31283-jsme3w.png');"></div>
                </figure>

                <h3 class="project-title">Modern E-commerce app</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/image_processing20211023-17247-1ctp2b2.png');"></div>
                </figure>

                <h3 class="project-title">Clothing store app</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="web/mobile app">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/image_processing20230203-21800-aefpir.png');"></div>
                </figure>

                <h3 class="project-title">Giftshop app</h3>

                <p class="project-category">UI/UX design</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/pr3.png');"></div>
                </figure>

                <h3 class="project-title">Retro logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/pr9.png');"></div>
                </figure>

                <h3 class="project-title">Epic style logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/pr11.png');"></div>
                </figure>

                <h3 class="project-title">Business logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/pr13.png');"></div>
                </figure>

                <h3 class="project-title">Corporate logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/Screenshot 2024-07-15 185357.png');"></div>
                </figure>

                <h3 class="project-title">Startup logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/AI Designer-Outdoor street construction site fence wall logo mockup.jpeg');"></div>
                </figure>

                <h3 class="project-title">Pink october logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/AI Designer-Indoor wall carpet logo mockup .jpeg');"></div>
                </figure>

                <h3 class="project-title">Marketing agency logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" style="background-image: url('./assets/images/portfolio/AI Designer-Outdoor wall painting wall logo mockup.jpeg');"></div>
                </figure>

                <h3 class="project-title">summer tools logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/AI Designer-Round billboard mockup .jpeg');"></div>
                </figure>

                <h3 class="project-title">shop logo</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/pr2.png');"></div>
                </figure>

                <h3 class="project-title">Event banner</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/pr4.png');"></div>
                </figure>

                <h3 class="project-title">Retro showcase </h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/pr5.png');"></div>
                </figure>

                <h3 class="project-title">Business card</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/pr14.png');"></div>
                </figure>

                <h3 class="project-title">Branding</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/Screenshot 2024-07-11 124425.png');"></div>
                </figure>

                <h3 class="project-title">Social media post style</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
            <li class="project-item  active" data-filter-item data-category="infographics">
              <a href="#">

                <figure class="project-img">
                  <div class="project-item-icon-box">
                    <ion-icon name="eye-outline"></ion-icon>
                  </div>
                  <div class="img-wrapper" 
                  style="background-image: url('./assets/images/portfolio/Screenshot 2024-07-11 124442.png');"></div>
                </figure>

                <h3 class="project-title">Business showcase</h3>

                <p class="project-category">Infographics</p>

              </a>
            </li>
-->
          </ul>

        </section>

      </article>





      <!--
        - #BLOG
      -->

      <article class="blog" data-page="blog">

        <header>
          <h2 class="h2 article-title">Blog</h2>
        </header>

        <section class="blog-posts">

          <ul class="blog-posts-list">

            <li class="blog-post-item">
              <a href="#">

                <figure class="blog-banner-box">
                  <img src="./assets/images/blog-1.jpg" alt="Design conferences in 2022" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Design</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fab 23, 2022</time>
                  </div>

                  <h3 class="h3 blog-item-title">Design conferences in 2022</h3>

                  <p class="blog-text">
                    Veritatis et quasi architecto beatae vitae dicta sunt, explicabo.
                  </p>

                </div>

              </a>
            </li>

            <li class="blog-post-item">
              <a href="#">

                <figure class="blog-banner-box">
                  <img src="./assets/images/blog-2.jpg" alt="Best fonts every designer" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Design</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fab 23, 2022</time>
                  </div>

                  <h3 class="h3 blog-item-title">Best fonts every designer</h3>

                  <p class="blog-text">
                    Sed ut perspiciatis, nam libero tempore, cum soluta nobis est eligendi.
                  </p>

                </div>

              </a>
            </li>

            <li class="blog-post-item">
              <a href="#">

                <figure class="blog-banner-box">
                  <img src="./assets/images/blog-3.jpg" alt="Design digest #80" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Design</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fab 23, 2022</time>
                  </div>

                  <h3 class="h3 blog-item-title">Design digest #80</h3>

                  <p class="blog-text">
                    Excepteur sint occaecat cupidatat no proident, quis nostrum exercitationem ullam corporis suscipit.
                  </p>

                </div>

              </a>
            </li>

            <li class="blog-post-item">
              <a href="#">

                <figure class="blog-banner-box">
                  <img src="./assets/images/blog-4.jpg" alt="UI interactions of the week" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Design</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fab 23, 2022</time>
                  </div>

                  <h3 class="h3 blog-item-title">UI interactions of the week</h3>

                  <p class="blog-text">
                    Enim ad minim veniam, consectetur adipiscing elit, quis nostrud exercitation ullamco laboris nisi.
                  </p>

                </div>

              </a>
            </li>

            <li class="blog-post-item">
              <a href="#">

                <figure class="blog-banner-box">
                  <img src="./assets/images/blog-5.jpg" alt="The forgotten art of spacing" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Design</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fab 23, 2022</time>
                  </div>

                  <h3 class="h3 blog-item-title">The forgotten art of spacing</h3>

                  <p class="blog-text">
                    Maxime placeat, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </p>

                </div>

              </a>
            </li>

            <li class="blog-post-item">
              <a href="#">

                <figure class="blog-banner-box">
                  <img src="./assets/images/blog-6.jpg" alt="Design digest #79" loading="lazy">
                </figure>

                <div class="blog-content">

                  <div class="blog-meta">
                    <p class="blog-category">Design</p>

                    <span class="dot"></span>

                    <time datetime="2022-02-23">Fab 23, 2022</time>
                  </div>

                  <h3 class="h3 blog-item-title">Design digest #79</h3>

                  <p class="blog-text">
                    Optio cumque nihil impedit uo minus quod maxime placeat, velit esse cillum.
                  </p>

                </div>

              </a>
            </li>

          </ul>

        </section>

      </article>





      <!--
        - #CONTACT
      -->

      <article class="contact" data-page="contact">

        <header>
          <h2 class="h2 article-title">Contact</h2>
        </header>

        <section class="mapbox" data-mapbox>
          <figure>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d199666.5651251294!2d-121.58334177520186!3d38.56165006739519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809ac672b28397f9%3A0x921f6aaa74197fdb!2sSacramento%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1647608789441!5m2!1sen!2sbd"
              width="400" height="300" loading="lazy"></iframe>
          </figure>
        </section>

        <section class="contact-form">

          <h3 class="h3 form-title">Contact Form</h3>

          <form action="#" class="form" data-form>

            <div class="input-wrapper">
              <input type="text" name="fullname" class="form-input" placeholder="Full name" required data-form-input>

              <input type="email" name="email" class="form-input" placeholder="Email address" required data-form-input>
            </div>

            <textarea name="message" class="form-input" placeholder="Your Message" required data-form-input></textarea>

            <button class="form-btn" type="submit" disabled data-form-btn>
              <ion-icon name="paper-plane"></ion-icon>
              <span>Send Message</span>
            </button>

          </form>

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