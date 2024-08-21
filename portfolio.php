
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
>>>>>>> parent of 0140e45 (video view/upload lts)

try {
    $stmt = $pdo->prepare("SELECT * FROM projects");
    $stmt->execute();
    $all_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    
    
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
          padding: 15px;
          border: 1px solid var(--jet);
          border-radius: 14px;
          box-shadow: var(--shadow-5);
          transform: scale(1.2);
          opacity: 0;
          transition: var(--transition-1);
          z-index: 2;
          width: 60%; /* Fixed width */
          max-width: 800px; /* Limit max width */
          max-height: 90vh; /* Keep the modal within viewport */
          margin: 10vh auto;
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
        
        .project-gallery img,
        .project-gallery video {
          max-width: 100%;
          justify-content: center;
          ;
        }
        
        .modalover-content {
          padding: 15px;
          justify-content: center;
        }
            </style>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/images/Screenshot 2024-07-15 185357.png" type="image/x-icon">
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

<header>
    <h2 class="h2 article-title">Portfolio</h2>
</header>

<section class="projects">

    <!-- Filter list for different project categories -->
    <ul class="filter-list">
        <li class="filter-item"><button class="active" data-filter-btn>All</button></li>
        <li class="filter-item"><button data-filter-btn>web/mobile app</button></li>
        <li class="filter-item"><button data-filter-btn>Infographics</button></li>
        <li class="filter-item"><button data-filter-btn>Video editing</button></li>
        <li class="filter-item"><button data-filter-btn>motion graphics</button></li>
        <li class="filter-item"><button data-filter-btn>3D art</button></li>
        <li class="filter-item"><button data-filter-btn>3D animations/VFX</button></li>
    </ul>

    <!-- Filter select for mobile/responsive design -->
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
                <button data-select-item>Web design</button>
              </li>

              <li class="select-item">
                <button data-select-item>Applications</button>
              </li>

              <li class="select-item">
                <button data-select-item>Web development</button>
              </li>

            </ul>

          </div>

          <script>
            document.addEventListener('DOMContentLoaded', function () {
  // Select all filter buttons and project items
  const filterButtons = document.querySelectorAll('[data-filter-btn]');
  const projectItems = document.querySelectorAll('[data-filter-item]');

  // Add click event to each filter button
  filterButtons.forEach(button => {
    button.addEventListener('click', function () {
      const category = this.textContent.toLowerCase(); // Get the category from button text

      // Remove 'active' class from all buttons, then add it to the clicked button
      filterButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');

      // Loop through each project item
      projectItems.forEach(item => {
        const itemCategory = item.getAttribute('data-category').toLowerCase();

        // If 'All' is clicked or item matches the category, display it
        if (category === 'all' || itemCategory === category) {
          item.style.display = 'block';
          item.classList.add('active');
        } else {
          // Hide items that don't match
          item.style.display = 'none';
          item.classList.remove('active');
        }
      });
    });
  });
});
          </script>



    <!-- List of projects -->
    <ul class="project-list">
    <?php if ($all_data): ?>
        <?php foreach ($all_data as $row): ?>
        <li class="project-item active" data-filter-item data-category="<?php echo htmlspecialchars($row['category']); ?>">
            <a href="#">

                <?php if (strpos($row['file_type'], 'video') !== false): ?>
                <figure class="project-img">
                    <div class="project-item-icon-box">
                        <ion-icon name="play-outline"></ion-icon>
                    </div>
                    <div class="img-wrapper">
                        <video src="<?php echo htmlspecialchars($row['file_name']); ?>" controls></video>
                    </div>
                </figure>
                <?php else: ?>
                <figure class="project-img">
                    <div class="project-item-icon-box">
                        <ion-icon name="image-outline"></ion-icon>
                    </div>
                    <div class="img-wrapper" style="background-image: url('<?php echo htmlspecialchars($row['file_name']); ?>');"></div>
                </figure>
                <?php endif; ?>

                <h3 class="project-title"><?php echo htmlspecialchars($row['title']); ?></h3>

                <p class="project-category"><?php echo htmlspecialchars($row['subtitle']); ?></p>

            </a>
        </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No projects found.</li>
    <?php endif; ?>
    </ul>


<!-- Modal for displaying media -->
<div class="modal-container1" data-modal-container>
    <div class="overlay1" data-overlay></div>
    <section class="modal1">
        <button class="modal-close-btn1" data-modal-close-btn>
            <ion-icon name="close-outline"></ion-icon>
        </button>
        <div class="modal-media-wrapper1">
            <!-- Media placeholders: image or video -->
            <img src="" alt="Portfolio Image" class="modal-media-img1" data-modal-img>
            <video src="" controls class="modal-media-video1" data-modal-video></video>
        </div>
        <div class="modal-content1">
            <h4 class="h3 modal-title1" data-modal-title></h4>
            <p data-modal-description></p>
        </div>
    </section>
</div>


<script>
// Filter functionality for projects
document.addEventListener('DOMContentLoaded', function () {
    const modalContainer = document.querySelector('[data-modal-container]');
    const modalImg = document.querySelector('[data-modal-img]');
    const modalVideo = document.querySelector('[data-modal-video]');
    const modalTitle = document.querySelector('[data-modal-title]');
    const modalDescription = document.querySelector('[data-modal-description]');
    const modalCloseBtn = document.querySelector('[data-modal-close-btn]');
    const overlay = document.querySelector('[data-overlay]');

    document.querySelectorAll('.project-item').forEach(item => {
        item.addEventListener('click', function () {
            const mediaSrc = this.querySelector('.img-wrapper').style.backgroundImage.slice(5, -2); // Get media URL
            const title = this.querySelector('.project-title').textContent;
            const description = this.querySelector('.project-category').textContent;
            const mediaType = this.getAttribute('data-media-type'); // Custom attribute to identify media type

            if (mediaSrc.endsWith('.mp4') || mediaSrc.endsWith('.avi') || mediaSrc.endsWith('.mov')) {
                modalVideo.src = mediaSrc;
                modalVideo.style.display = 'block';
                modalImg.style.display = 'none';
            } else {
                modalImg.src = mediaSrc;
                modalImg.style.display = 'block';
                modalVideo.style.display = 'none';
            }

            modalTitle.textContent = title;
            modalDescription.textContent = description;

            modalContainer.classList.add('active');
            overlay.classList.add('active');
        });
    });

    modalCloseBtn.addEventListener('click', function () {
        modalContainer.classList.remove('active');
        overlay.classList.remove('active');
    });

    overlay.addEventListener('click', function () {
        modalContainer.classList.remove('active');
        overlay.classList.remove('active');
    });
});

</script>





<style>

/* General modal styles */
.modal-container1 {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow-y: auto;
    overscroll-behavior: contain;
    z-index: 20;
    pointer-events: none;
    visibility: hidden;
}

.modal-container1.active {
    pointer-events: all;
    visibility: visible;
}

.overlay1 {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.8);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

.overlay1.active {
    opacity: 0.8;
    visibility: visible;
    pointer-events: all;
}

.modal1 {
    background: #333;
    position: relative;
    padding: 20px;
    margin: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 90%;
    max-height: 90%;
    overflow: auto;
}

.modal-close-btn1 {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #222;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-size: 18px;
}

.modal-media-wrapper1 {
    margin-bottom: 15px;
}

.modal-media-img1,
.modal-media-video1 {
    max-width: 100%;
    max-height: 60vh;
}

.modal-media-img1 {
    display: block;
}

.modal-media-video1 {
    display: none; /* Hidden by default */
}

.modal-title1 {
    color: #fff;
    margin-bottom: 8px;
}

.modal-content1 p {
    color: #ccc;
    line-height: 1.6;
}




</style>

 
    

        </section>

        

        
       <!-- Add the JavaScript code here -->
       <script>
        document.addEventListener('DOMContentLoaded', function () {
>>>>>>> parent of 0140e45 (video view/upload lts)
    const filterButtons = document.querySelectorAll('[data-filter-btn]');
    const projectItems = document.querySelectorAll('.project-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const filterCategory = this.textContent.toLowerCase().trim();

            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            projectItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category').toLowerCase().trim();
                if (filterCategory === 'all' || itemCategory === filterCategory) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const projectLinks = document.querySelectorAll('.open-overlay');
    const modaloverContainer = document.getElementById('modaloverContainer');
    const overlaypage = document.getElementById('overlaypage');
    const closemodaloverButton = document.getElementById('closemodalover');

    // Function to close the overlay
    function closemodalover() {
        modaloverContainer.classList.remove('active');
        overlaypage.classList.remove('active');
        document.body.style.overflow = ''; // Enable scrolling
        document.querySelector('.testimonials-modalover .modalover-content').innerHTML = ''; // Clear content
    }

    closemodaloverButton.addEventListener('click', closemodalover);
    overlaypage.addEventListener('click', closemodalover);

    // Function to open the overlay
    function openmodalover() {
        modaloverContainer.classList.add('active');
        overlaypage.classList.add('active');
        document.body.style.overflow = 'hidden'; // Disable scrolling
    }

    // Attach event listeners to project links
    projectLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const projectId = this.getAttribute('data-project-id');
            
            // Fetch project details using AJAX
            fetch(`overlay.php?id=${projectId}`)
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.testimonials-modalover .modalover-content').innerHTML = html;
                    openmodalover();
                })
                .catch(error => console.error('Error loading project details:', error));
        });
    });
});
</script>


</body>
</html>
