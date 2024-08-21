
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
require_once 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"])) { // Check if the file input is set
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $category = $_POST['category'];

        // File upload handling
        $target_dir = "uploads/"; // Directory where uploaded files will be stored
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an image or video
        $allowedImageTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $allowedVideoTypes = ['mp4', 'avi', 'mov'];
        $allowedTypes = array_merge($allowedImageTypes, $allowedVideoTypes);

        if (in_array($fileType, $allowedTypes)) {
            $uploadOk = 1;
        } else {
            echo "Sorry, only JPG, JPEG, PNG, GIF, MP4, AVI, and MOV files are allowed.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > 50000000) { // Increased size limit for videos
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            // Check for upload errors
            if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {
                switch ($_FILES["file"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "The uploaded file was only partially uploaded.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "No file was uploaded.";
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        echo "Missing a temporary folder.";
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        echo "Failed to write file to disk.";
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        echo "A PHP extension stopped the file upload.";
                        break;
                    default:
                        echo "Unknown upload error.";
                        break;
                }
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    // File uploaded successfully, now insert data into database
                    
                    // Establish database connection
                    $conn = new mysqli("localhost", "root", "", "portfolio");

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Prepare SQL statement and bind parameters
                    $sql = "INSERT INTO projects (title, subtitle, category, file_name, file_type) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssss", $title, $subtitle, $category, $target_file, $fileType); // Added fileType

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
                    echo "Sorry, there was an error moving your file.";
                }
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}

?>
