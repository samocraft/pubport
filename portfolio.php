<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connection.php';

$sql = "SELECT * FROM projects";
$all_data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

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
            <li class="project-item active" data-filter-item data-category="<?php echo htmlspecialchars($row['category']); ?>">
                <a href="#" data-modal-open>
                    <figure class="project-img">
                        <div class="project-item-icon-box">
                            <ion-icon name="eye-outline"></ion-icon>
                        </div>


                        <?php //var_dump($row);?>
                        <?php if (strpos($row['file_type'], 'mp4') !== false): ?>
                            <!-- Display thumbnail for videos -->
                            <div class="img-wrapper" style="background-image: url('<?php echo htmlspecialchars($row['file_name']); ?>');"></div>

                        <?php else: ?>
                            <!-- Display image -->
                            <div class="img-wrapper" style="background-image: url('<?php echo htmlspecialchars($row['thumbnail']); ?>');"></div>
                        <?php endif; ?>
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
    const filterButtons = document.querySelectorAll('[data-filter-btn]');
    const projectItems = document.querySelectorAll('.project-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const filterCategory = this.textContent.toLowerCase().trim();
            console.log("Filter clicked: ", filterCategory); // Check which filter is clicked

            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            projectItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category').toLowerCase().trim();
                console.log("Item Category: ", itemCategory); // Check item category
                
                if (filterCategory === 'all' || itemCategory === filterCategory) {
                    item.style.display = 'block';  // Show the item
                } else {
                    item.style.display = 'none';  // Hide the item
                }
            });
        });
    });
});

    </script>
