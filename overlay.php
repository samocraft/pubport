<?php

// Display errors for debugging

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



// Include the database connection

require_once 'connection.php'; // Assuming this file sets up $pdo



// Check if 'id' is passed in the query string

if (isset($_GET['id'])) {

    $id = intval($_GET['id']); // Sanitize the ID



    // Prepare and execute the query to fetch project details by ID

    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = :id");

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();



    // Fetch the project data

    $project = $stmt->fetch(PDO::FETCH_ASSOC);



    if (!$project) {

        echo "Project not found.";

        exit;

    }



    // Fetch the associated media for the project

    $mediaStmt = $pdo->prepare("SELECT media_file, media_type, position FROM media WHERE project_id = :project_id ORDER BY position ASC");

    $mediaStmt->bindParam(':project_id', $id, PDO::PARAM_INT);

    $mediaStmt->execute();

    $mediaItems = $mediaStmt->fetchAll(PDO::FETCH_ASSOC);



    // Fetch similar projects based on category or other criteria

    $similarStmt = $pdo->prepare("SELECT * FROM projects WHERE category = :category AND id != :id LIMIT 3");

    $similarStmt->bindParam(':category', $project['category'], PDO::PARAM_STR);

    $similarStmt->bindParam(':id', $id, PDO::PARAM_INT);

    $similarStmt->execute();

    $similarProjects = $similarStmt->fetchAll(PDO::FETCH_ASSOC);



} else {

    echo "No project ID specified.";

    exit;

}



// Function to safely escape values or return an empty string if null

function safe_escape($value) {

    return $value !== null ? htmlspecialchars($value) : '';

}

?>





<div >

    <div class="project-details">

      <div class="h2" style="display: flex;

          justify-content: center;

          align-items: center;">

        <h1 style="padding-top: 30px;" ><?php echo safe_escape($project['title']); ?></h1>

      </div>



      <div style="display: flex;

          justify-content: center;

          align-items: center;">

          <p style="padding-bottom: 20px;" class="project-category"><?php echo safe_escape($project['subtitle']); ?></p>

          </div>

        

    </div>



    <!-- Project gallery (images/videos) -->

    <div class="project-gallery">

        <?php foreach ($mediaItems as $media): ?>

            <?php 

            $fileExtension = pathinfo($media['media_file'], PATHINFO_EXTENSION);

            $isVideo = in_array($fileExtension, ['mp4', 'avi', 'mkv', 'mov']); 

            ?>

            <?php if ($isVideo): ?>

                <video controls>

                    <source src="<?php echo safe_escape($media['media_file']); ?>" type="video/<?php echo $fileExtension; ?>">

                    Your browser does not support the video tag.

                </video>

            <?php else: ?>

                <img src="<?php echo safe_escape($media['media_file']); ?>" alt="Project Media">

            <?php endif; ?>

        <?php endforeach; ?>

    </div>
    <script>
    function openFullScreen(image) {
        // Check if the device is in mobile view
        if (window.innerWidth <= 768) { 
            if (image.requestFullscreen) {
                image.requestFullscreen();
            } else if (image.webkitRequestFullscreen) { // Safari compatibility
                image.webkitRequestFullscreen();
            } else if (image.msRequestFullscreen) { // IE11 compatibility
                image.msRequestFullscreen();
            }
        }
    }
</script>

    <br><br>

    <!-- Similar Projects -->
    <div class="h2" style="display: flex; justify-content: left; align-items: center;">
        <h1 style="padding-bottom: 10px;">Similar Projects</h1>
    </div>
    
    <ul class="project-list">
        <?php if (!empty($similarProjects)): ?>
            <?php foreach ($similarProjects as $similar): ?>
                <li class="project-item active" data-filter-item data-category="<?php echo htmlspecialchars($similar['category'] ?? ''); ?>">
                    <a href="#" class="open-overlay" data-project-id="<?php echo htmlspecialchars($similar['id']); ?>">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <div class="img-wrapper" style="background-image: url('<?php echo htmlspecialchars($similar['thumbnail']); ?>');"></div>
                        </figure>
                        <h3 class="project-title"><?php echo htmlspecialchars($similar['title']); ?></h3>
                        <p class="project-category"><?php echo htmlspecialchars($similar['subtitle'] ?? ''); ?></p>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No similar projects found.</li>
        <?php endif; ?>
    </ul>
</div>



<script>
document.querySelectorAll('.open-overlay').forEach(item => {
    item.addEventListener('click', function(event) {
        event.preventDefault();
        const projectId = this.getAttribute('data-project-id');
        
        // Fetch new project details using AJAX
        fetch(`overlay.php?id=${projectId}`)
            .then(response => response.text())
            .then(data => {
                // Replace modal content with the new project data
                document.querySelector('.testimonials-modalover .modalover-content').innerHTML = data;
                
                // Reinitialize event listeners for the new similar projects
                initSimilarProjectListeners();
            })
            .catch(error => console.error('Error fetching project:', error));
    });
});

// Function to reinitialize listeners
function initSimilarProjectListeners() {
    document.querySelectorAll('.open-overlay').forEach(item => {
        item.removeEventListener('click', function(event) {
            // Reattach event listener code here as needed
        });
    });
}
</script>






</div>



<!-- Your CSS for the overlaypage -->

<style>

        

        .modalover-container {

            position: fixed;

          top: 0;

          left: 0;

          width: 100%;

          height: 100%;

          display: flex;

          justify-content: center;

          align-items: center;

          z-index: 20;

          pointer-events: none;

          visibility: hidden;

          overflow-y: auto;

          

        }

        

        .modalover-container.active {

          pointer-events: all;

          visibility: visible;

        }

        

        .overlaypage {

            position: fixed;

          top: 0;

          left: 0;

          width: 100%;

          height: 100vh;

          backdrop-filter: blur(10px); /* Blur the background */

          background: rgba(0, 0, 0, 0.3); /* Darken the background */

          opacity: 1;

          visibility: hidden;

          pointer-events: none;

          z-index: 1;

          transition: var(--transition-1);

        }

        

        .overlaypage.active {

          visibility: visible;

          pointer-events: all;

        }

        

        .testimonials-modalover {

            background: var(--eerie-black-2);

          position: relative;

          padding: 1%;

          border: 1px solid var(--jet);

          border-radius: 14px;

          box-shadow: var(--shadow-5);

          transform: scale(1.2);

          opacity: 0;

          transition: var(--transition-1);

          z-index: 2;

          width: 90%; /* Fixed width */

          max-width: 1500px; /* Limit max width */

          max-height: 90%; /* Keep the modal within viewport */

         

          overflow-y: auto; /* Enable internal scrolling */

          

          

        }

        

        .modalover-container.active .testimonials-modalover {

          transform: scale(1);

          opacity: 1;

        }

        

        .modalover-close-btn {

          position: absolute;

          top: 1%;

          right: 15px;

          background: var(--onyx);

          border-radius: 8px;

          width: 32px;

          height: 32px;

          display: flex;

          justify-content: center;

          align-items: center;

          color: var(--white-2);

          font-size: 18px;

          opacity: 0.7;

        }

        

        .modalover-close-btn:hover,

        .modalover-close-btn:focus {

          opacity: 1;

        }

        

        .modalover-close-btn ion-icon {

          --ionicon-stroke-width: 50px;

        }

        

        .modalover-title {

          margin-bottom: 4px;

        }

        

        /* Set consistent width for all media (images and videos) */

.project-gallery img,

.project-gallery video {

  width: 100%; /* This ensures all media takes up the full width of the container */

  height: auto; /* Maintains aspect ratio */

  display: block;

  margin: 0 auto; /* Center the media horizontally */

  max-width: 100%; /* Optionally, set a maximum width */

}


            </style>

