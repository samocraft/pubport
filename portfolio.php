<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connection.php'; // Ensure 'connection.php' uses PDO or mysqli consistently

// Fetch all projects with their media files
$sql = "SELECT p.id, p.title, p.subtitle, p.category, m.media_file, m.media_type, m.thumbnail 
        FROM projects p
        LEFT JOIN media m ON p.id = m.project_id";
$all_data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
            <li class="select-item"><button data-select-item>All</button></li>
            <li class="select-item"><button data-select-item>web/mobile app</button></li>
            <li class="select-item"><button data-select-item>Infographics</button></li>
            <li class="select-item"><button data-select-item>Video editing</button></li>
            <li class="select-item"><button data-select-item>motion graphics</button></li>
            <li class="select-item"><button data-select-item>3D art</button></li>
            <li class="select-item"><button data-select-item>3D animations/VFX</button></li>
        </ul>
    </div>

    <!-- List of projects -->
    <ul class="project-list">
        <?php if ($all_data): ?>
            <?php foreach ($all_data as $row): ?>
    <li class="project-item active" data-filter-item data-category="<?php echo htmlspecialchars($row['category']); ?>">
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
    </li>
<?php endforeach; ?>

        <?php else: ?>
            <li>No projects found.</li>
        <?php endif; ?>
    </ul>

</section>

<!-- modalover Container -->
<div class="modalover-container" id="modaloverContainer">
    <div class="testimonials-modalover">
        <button class="modalover-close-btn" id="closemodalover">&times;</button>
        <div class="modalover-content">
            <!-- Content will be injected here via JavaScript -->
        </div>
    </div>
    <div class="overlaypage" id="overlaypage"></div>
</div>


<script>
// Filter functionality for projects
document.addEventListener('DOMContentLoaded', function () {
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
