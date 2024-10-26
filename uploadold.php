<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if files and thumbnail are uploaded
    if (isset($_FILES["files"]) && count($_FILES["files"]["name"]) > 0 && isset($_FILES["thumbnail"]["name"]) && !empty($_FILES["thumbnail"]["name"])) {
        echo "Files and thumbnail detected.<br>"; // Debug message
        $title = $_POST['title'] ?? '';
        $subtitle = $_POST['subtitle'] ?? '';
        $category = $_POST['category'] ?? '';

        // Check if all necessary fields are present
        if (empty($title) || empty($category)) {
            echo "Missing title or category.<br>";
            exit;
        }

        // Database connection
        $conn = new mysqli("localhost", "root", "", "portfolio");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Thumbnail upload
        $thumbnailFile = $_FILES["thumbnail"]["name"];
        $thumbnailTmpName = $_FILES["thumbnail"]["tmp_name"];
        $thumbnailTarget = "uploads/" . basename($thumbnailFile);

        $allowedThumbnailTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $thumbnailFileType = strtolower(pathinfo($thumbnailTarget, PATHINFO_EXTENSION));

        if (in_array($thumbnailFileType, $allowedThumbnailTypes) && $_FILES["thumbnail"]["size"] <= 5000000) { // 5MB limit
            if (move_uploaded_file($thumbnailTmpName, $thumbnailTarget)) {
                echo "Thumbnail uploaded successfully.<br>"; // Debug message

                $sql_project = "INSERT INTO projects (title, subtitle, category, thumbnail) VALUES (?, ?, ?, ?)";
                $stmt_project = $conn->prepare($sql_project);
                $stmt_project->bind_param("ssss", $title, $subtitle, $category, $thumbnailTarget);

                if ($stmt_project->execute()) {
                    $project_id = $stmt_project->insert_id; // Get project ID
                    $stmt_project->close();
                    echo "Project inserted with ID: $project_id<br>"; // Debug message

                    $target_dir = "uploads/";

                    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                        if (!empty($tmp_name)) {
                            $mediaFile = $_FILES["files"]["name"][$key];
                            $target_file = $target_dir . basename($mediaFile);
                            $mediaFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'avi', 'mov'];

                            if (in_array($mediaFileType, $allowedTypes)) {
                                if ($_FILES["files"]["size"][$key] <= 50000000) { // 50MB limit
                                    if (move_uploaded_file($tmp_name, $target_file)) {
                                        echo "Media file '$mediaFile' uploaded successfully.<br>"; // Debug message

                                        $sql_media = "INSERT INTO media (project_id, media_file, media_type, position) VALUES (?, ?, ?, ?)";
                                        $stmt_media = $conn->prepare($sql_media);
                                        $stmt_media->bind_param("issi", $project_id, $target_file, $mediaFileType, $key);

                                        if (!$stmt_media->execute()) {
                                            echo "Error inserting media: " . $conn->error . "<br>";
                                        }
                                        $stmt_media->close();
                                    } else {
                                        echo "Error moving media file '$mediaFile'.<br>";
                                    }
                                } else {
                                    echo "Media file '$mediaFile' is too large.<br>";
                                }
                            } else {
                                echo "Invalid media file type for '$mediaFile'.<br>";
                            }
                        } else {
                            echo "Empty file entry detected.<br>";
                        }
                    }
                } else {
                    echo "Error inserting project: " . $conn->error . "<br>";
                }
            } else {
                echo "Error moving uploaded thumbnail.<br>";
            }
        } else {
            echo "Invalid thumbnail file type or size.<br>";
        }
    } else {
        echo "No files or thumbnail were uploaded.<br>";
    }
}
?>
