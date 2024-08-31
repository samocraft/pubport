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
            </li>
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
</div>










<script>
document.addEventListener('DOMContentLoaded', function () {
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
