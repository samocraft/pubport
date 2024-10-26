
<?php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
include 'connection.php'; // Include your database connection file
=======
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
=======
>>>>>>> parent of 0140e45 (video view/upload lts)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                <?php if (isset($row['id'])): ?>
                    <a href="#" class="open-overlay" data-project-id="<?php echo $row['id']; ?>">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <div class="img-wrapper" style="background-image: url('<?php echo htmlspecialchars($row['thumbnail']); ?>');"></div>
                        </figure>
                        <h3 class="project-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p class="project-category"><?php echo htmlspecialchars($row['subtitle']); ?></p>
                    </a>
                <?php else: ?>
                    <p>Project data is incomplete.</p>
                <?php endif; ?>
=======
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
                <a href="#" class="project-link" data-image-url="<?php echo htmlspecialchars($row['picture']); ?>" data-title="<?php echo htmlspecialchars($row['title']); ?>" data-subtitle="<?php echo htmlspecialchars($row['subtitle']); ?>">
                    <figure class="project-img">
                        <div class="project-item-icon-box">
                            <ion-icon name="eye-outline"></ion-icon>
                        </div>
                        <div class="img-wrapper" style="background-image: url('<?php echo htmlspecialchars($row['picture']); ?>');"></div>
                    </figure>
                    <h3 class="project-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p class="project-category"><?php echo htmlspecialchars($row['subtitle']); ?></p>
                </a>
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> parent of 0140e45 (video view/upload lts)
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No projects found.</li>
    <?php endif; ?>
</ul>

</section>

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<!-- modalover Container -->
<div class="modalover-container" id="modaloverContainer">
    <div class="testimonials-modalover">
        <button class="modalover-close-btn" id="closemodalover">&times;</button>
        <div class="modalover-content">
            <!-- Content will be injected here via JavaScript -->
        </div>
    </div>
    <div class="overlaypage" id="overlaypage"></div>
=======
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
<!-- Modal for displaying images -->
<div class="modal-container1" data-modal-container>
  <div class="overlay1" data-overlay></div>

  <section class="modal1">
    <button class="modal-close-btn1" data-modal-close-btn>
      <ion-icon name="close-outline"></ion-icon>
    </button>

    <div class="modal-img-wrapper1">
      <img src="" alt="Portfolio Image" data-modal-img>
    </div>

    <div class="modal-content1">
      <h4 class="h3 modal-title" data-modal-title></h4>
      <p data-modal-description></p>
    </div>
  </section>
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> parent of 0140e45 (video view/upload lts)
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
</div>










<script>
// Filter functionality for projects
document.addEventListener('DOMContentLoaded', function () {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
=======
>>>>>>> parent of 0140e45 (video view/upload lts)
  const projectItems = document.querySelectorAll('.project-item');
  const modalContainer = document.querySelector('[data-modal-container]');
  const modalImg = document.querySelector('[data-modal-img]');
  const modalTitle = document.querySelector('[data-modal-title]');
  const modalDescription = document.querySelector('[data-modal-description]');
  const closeModalBtn = document.querySelector('[data-modal-close-btn]');
  const overlay = document.querySelector('[data-overlay]');

  projectItems.forEach(item => {
    item.addEventListener('click', function (e) {
      e.preventDefault();
      const imgSrc = item.querySelector('.img-wrapper').style.backgroundImage.replace(/^url\(['"](.+)['"]\)/, '$1');
      const title = item.querySelector('.project-title').textContent;
      const description = item.querySelector('.project-category').textContent;

      modalImg.src = imgSrc;
      modalTitle.textContent = title;
      modalDescription.textContent = description;

      modalContainer.classList.add('active');
      overlay.classList.add('active');
    });
  });

  closeModalBtn.addEventListener('click', function () {
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

/**
 * Portfolio Modal Style (Dark Theme with Original Colors)
 */

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
  z-index: 20;
  pointer-events: none;
  visibility: hidden;
  overscroll-behavior: contain;
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
  background: hsl(0, 0%, 5%); /* Dark background */
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  z-index: 1;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}

.overlay1.active {
  opacity: 0.85;
  visibility: visible;
  pointer-events: all;
}

.modal1 {
  background: var(--eerie-black-2, #1b1b1b); /* Same background as the testimonials modal */
  padding: 20px;
  margin: 20px;
  border: 1px solid var(--jet, #333); /* Respecting the darker border */
  border-radius: 14px;
  max-width: 90%;
  width: 600px;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.4); /* Darker shadow for depth */
  transform: scale(0.9);
  opacity: 0;
  transition: transform 0.3s ease, opacity 0.3s ease;
  z-index: 2;
}

.modal-container1.active .modal1 {
  transform: scale(1);
  opacity: 1;
}

.modal-close-btn1 {
  position: absolute;
  top: 10px;
  right: 10px;
  background: var(--onyx, #353535); /* Onyx background */
  border: none;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  color: var(--white-2, #fff); /* White color for the close icon */
  font-size: 18px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: background-color 0.3s ease;
}

.modal-close-btn1:hover {
  background: #444; /* Slightly lighter on hover */
}

.modal-img-wrapper1 {
  text-align: center;
  margin-bottom: 20px;
}

.modal-img-wrapper1 img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  box-shadow: var(--shadow-2, 0 2px 8px rgba(0, 0, 0, 0.4)); /* Dark shadow */
}

.modal-content1 h4 {
  font-size: 1.5rem;
  margin-bottom: 10px;
  color: var(--white-2, #fff); /* Title in white */
}

.modal-content1 p {
  font-size: 1rem;
  color: var(--light-gray, #b3b3b3); /* Light gray for description */
  line-height: 1.5;
  margin-bottom: 0;
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
