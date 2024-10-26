<?php
include 'connection.php'; // Include your database connection file

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
    
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/images/Screenshot 2024-07-15 185357.png" type="image/x-icon">
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <style>
       
        /* Responsive filter styles */
        .filter-select-box {
            position: relative;
            margin-bottom: 25px;
            display: none; /* Default hidden, shown only on mobile */
        }

        .filter-select {
            background: var(--eerie-black-2);
            color: var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--jet);
            border-radius: 14px;
            font-size: var(--fs-6);
            font-weight: var(--fw-300);
            cursor: pointer;
        }

        .filter-select.active .select-icon {
            transform: rotate(0.5turn);
        }

        .select-list {
            background: var(--eerie-black-2);
            position: absolute;
            top: calc(100% + 6px);
            width: 100%;
            padding: 6px;
            border: 1px solid var(--jet);
            border-radius: 14px;
            z-index: 2;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.15s ease-in-out, visibility 0.15s ease-in-out;
        }

        .filter-select.active + .select-list {
            opacity: 1;
            visibility: visible;
            pointer-events: all;
        }

        .select-item button {
            background: var(--eerie-black-2);
            color: var(--light-gray);
            font-size: var(--fs-6);
            font-weight: var(--fw-300);
            text-transform: capitalize;
            width: 100%;
            padding: 8px 10px;
            border-radius: 8px;
            cursor: pointer;
        }

        .select-item button:hover {
            background: hsl(240, 2%, 20%);
        }

        /* Filter list for larger screens */
        .filter-list {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 25px;
            padding-left: 5px;
            margin-bottom: 30px;
        }

        .filter-item button {
            color: var(--light-gray);
            font-size: var(--fs-5);
            transition: color 0.3s;
            cursor: pointer;
            border: none;
            background: none;
        }

        .filter-item button:hover {
            color: var(--light-gray-70);
        }

        .filter-item button.active {
            color: var(--orange-yellow-crayola);
        }

        /* Responsive layout for mobile */
        @media (max-width: 768px) {
            .filter-list {
                display: none;
            }

            .filter-select-box {
                display: block;
            }
        }
    </style>
</head>
<body>

<header>
    <h2 class="articletitlenext article-title">Portfolio</h2>
</header>

<!-- Filter list for larger screens -->
<ul class="filter-list">
        <li class="filter-item"><button class="active" data-filter="all">All</button></li>
        <li class="filter-item"><button data-filter="web/mobile app">Web/Mobile App</button></li>
        <li class="filter-item"><button data-filter="infographics">Infographics</button></li>
        <li class="filter-item"><button data-filter="video editing">Video Editing</button></li>
        <li class="filter-item"><button data-filter="motion graphics">Motion Graphics</button></li>
        <li class="filter-item"><button data-filter="3d art">3D Art</button></li>
        <li class="filter-item"><button data-filter="3d animations/vfx">3D Animations/VFX</button></li>
    </ul>

    <!-- Filter select for mobile/responsive design -->
    <div class="filter-select-box">
        <div class="filter-select" data-select>
            <span class="select-value">Select Category</span>
            <ion-icon name="chevron-down"></ion-icon>
        </div>
        <ul class="select-list">
            <li class="select-item"><button data-filter="all">All</button></li>
            <li class="select-item"><button data-filter="web/mobile app">Web/Mobile App</button></li>
            <li class="select-item"><button data-filter="infographics">Infographics</button></li>
            <li class="select-item"><button data-filter="video editing">Video Editing</button></li>
            <li class="select-item"><button data-filter="motion graphics">Motion Graphics</button></li>
            <li class="select-item"><button data-filter="3d art">3D Art</button></li>
            <li class="select-item"><button data-filter="3d animations/vfx">3D Animations/VFX</button></li>
        </ul>
    </div>


<section class="projects">

    <!-- List of projects -->
    <ul class="project-list">
    <?php if ($all_data): ?>
        <?php foreach ($all_data as $row): ?>
            <li class="project-item active" data-category="<?php echo htmlspecialchars($row['category']); ?>">
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
document.addEventListener('DOMContentLoaded', function() {
    const projectLinks = document.querySelectorAll('.open-overlay');
    const modaloverContainer = document.getElementById('modaloverContainer');
    const overlaypage = document.getElementById('overlaypage');
    const closemodaloverButton = document.getElementById('closemodalover');
    const filterButtons = document.querySelectorAll('.filter-list button');
    const dropdownButtons = document.querySelectorAll('.select-item button');
    const projectItems = document.querySelectorAll('.project-item');
    const selectBox = document.querySelector('.filter-select');
    const selectList = document.querySelector('.select-list');
    const selectValue = document.querySelector('.select-value');

    // Function to apply filter
    function applyFilter(category) {
        projectItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category').toLowerCase();
            item.style.display = (category === 'all' || itemCategory === category) ? 'block' : 'none';
        });
    }

    // Set active button styles
    function setActiveButton(buttons, category) {
        buttons.forEach(button => {
            button.classList.toggle('active', button.getAttribute('data-filter') === category);
        });
    }

    // Desktop filter click event
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-filter');
            applyFilter(category);
            setActiveButton(filterButtons, category);
        });
    });

    // Mobile dropdown filter click events
    dropdownButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-filter');
            applyFilter(category);
            setActiveButton(dropdownButtons, category);
            selectValue.textContent = this.textContent; // Update the selected value in the dropdown
            selectBox.classList.remove('active'); // Close the dropdown
        });
    });

    // Toggle dropdown visibility on mobile
    selectBox.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent the click from bubbling to document
        selectBox.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!selectBox.contains(event.target)) {
            selectBox.classList.remove('active');
        }
    });

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
