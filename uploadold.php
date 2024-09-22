<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
require_once 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["files"]) && isset($_FILES["thumbnail"])) { // Check if files are uploaded
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $category = $_POST['category'];
        
        // Establish database connection
        $conn = new mysqli("localhost", "root", "", "portfolio");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handle thumbnail upload
        $thumbnailFile = $_FILES["thumbnail"]["name"];
        $thumbnailTmpName = $_FILES["thumbnail"]["tmp_name"];
        $thumbnailTarget = "uploads/" . basename($thumbnailFile);

        // Validate thumbnail file type and size
        $allowedThumbnailTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $thumbnailFileType = strtolower(pathinfo($thumbnailTarget, PATHINFO_EXTENSION));

        if (in_array($thumbnailFileType, $allowedThumbnailTypes) && $_FILES["thumbnail"]["size"] <= 5000000) { // 5MB limit
            // Move the uploaded thumbnail to the target directory
            if (move_uploaded_file($thumbnailTmpName, $thumbnailTarget)) {
                // Insert project info into 'projects' table
                $sql_project = "INSERT INTO projects (title, subtitle, category, thumbnail) VALUES (?, ?, ?, ?)";
                $stmt_project = $conn->prepare($sql_project);
                $stmt_project->bind_param("ssss", $title, $subtitle, $category, $thumbnailTarget);
                
                if ($stmt_project->execute()) {
                    $project_id = $stmt_project->insert_id; // Get the project ID for the media table
                    $stmt_project->close();
                    
                    $target_dir = "uploads/";

                    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                        $mediaFile = $_FILES["files"]["name"][$key];
                        $target_file = $target_dir . basename($mediaFile);
                        $mediaFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        // Define allowed file types
                        $allowedImageTypes = ['jpg', 'jpeg', 'png', 'gif'];
                        $allowedVideoTypes = ['mp4', 'avi', 'mov'];
                        $allowedTypes = array_merge($allowedImageTypes, $allowedVideoTypes);

                        if (in_array($mediaFileType, $allowedTypes)) {
                            if ($_FILES["files"]["size"][$key] <= 50000000) { // Check file size
                                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $target_file)) {
                                    // Insert each file into the media table
                                    $sql_media = "INSERT INTO media (project_id, media_file, media_type, position) VALUES (?, ?, ?, ?)";
                                    $stmt_media = $conn->prepare($sql_media);
                                    $stmt_media->bind_param("issi", $project_id, $target_file, $mediaFileType, $key);

                                    if (!$stmt_media->execute()) {
                                        echo "Error inserting media: " . $conn->error;
                                    }
                                    $stmt_media->close();
                                }
                            } else {
                                echo "File is too large.";
                            }
                        } else {
                            echo "Invalid file type.";
                        }
                    }
                } else {
                    echo "Error inserting project: " . $conn->error;
                }
                
                $conn->close();
            } else {
                echo "Error moving uploaded thumbnail.";
            }
        } else {
            echo "Invalid thumbnail file type or size.";
        }
    } else {
        echo "No files were uploaded.";
    }
}

?>
