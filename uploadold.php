<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
require_once 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD
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
=======
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $category = $_POST['category'];

    // File upload handling
    $target_dir = "uploads/"; // Directory where uploaded files will be stored
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["picture"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            // File uploaded successfully, now insert data into database
            
            // Establish database connection
            $conn = new mysqli("localhost", "root", "", "portfolio");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement and bind parameters
            $sql = "INSERT INTO projects (title, subtitle, category, picture) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $title, $subtitle, $category, $target_file); // Assuming $target_file is the path

            // Execute the statement
            if ($stmt->execute()) {
                echo "Project information uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
>>>>>>> parent of 0140e45 (video view/upload lts)
    }
}

?>
