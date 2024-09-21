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
    
    <!-- Use your existing CSS -->
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
                    <!-- Check if 'id' exists to avoid the error -->
                    <?php if (isset($row['id'])): ?>
                        <a href="overlay.php?id=<?php echo $row['id']; ?>">
                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>
                                <!-- Conditional display of media -->
                                <div class="img-wrapper" style="background-image: url('<?php echo htmlspecialchars($row['thumbnail']); ?>');"></div>
                            </figure>
                            <h3 class="project-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                            <p class="project-category"><?php echo htmlspecialchars($row['subtitle']); ?></p>
                        </a>
                    <?php else: ?>
                        <!-- Handle case where 'id' is missing -->
                        <p>Project data is incomplete.</p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No projects found.</li>
        <?php endif; ?>
    </ul>

</section>

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

</body>
</html>
