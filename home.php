<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connection.php';

$sql = "SELECT * FROM projects";
$all_data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>


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