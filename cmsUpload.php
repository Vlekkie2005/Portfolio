<?php
ob_start();
session_start();

if (isset($_SESSION['session_token']) && isset($_POST['submit'])) {
    include 'includes/db/connect.php';

    // Sanitize and validate user input
    $projectName = htmlspecialchars(trim($_POST['projectName']));
    $shortDescription = htmlspecialchars(trim($_POST['shortDescription']));
    $description = $_POST['Description'];

    $usedPrograms = !isset($_GET['project']) ? htmlspecialchars($_POST['usedPrograms']) : null;

    $projectId = isset($_GET['project']) ? intval($_GET['project']) : null;

    // Check if file is uploaded and is an image
    if (isset($_FILES['projectImage']) && is_uploaded_file($_FILES['projectImage']['tmp_name'])) {
        $fileTmpPath = $_FILES['projectImage']['tmp_name'];
        $fileName = basename($_FILES['projectImage']['name']);
        $mimeType = mime_content_type($fileTmpPath);

        if (strpos($mimeType, 'image/') !== 0) {
            die('Uploaded file is not an image.');
        }

        $random_number = rand(1000, 9999);
        $uploadDir = 'images/projects/';
        $pathProjectImage = $uploadDir . $random_number . "_" . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (!move_uploaded_file($fileTmpPath, $pathProjectImage)) {
            die('Error uploading the file. Please try again.');
        }
    }

    if ($projectId) {
        $stmt = $conn->prepare("UPDATE projects SET projectName = ?, shortDesc = ?, description = ? WHERE id = ?");
        if ($stmt === false) {
            die('Database statement preparation failed: ' . $conn->error);
        }
        $stmt->bind_param("sssi", $projectName, $shortDescription, $description, $projectId);
    } else {
        $stmt = $conn->prepare("INSERT INTO projects (projectName, shortDesc, description, projectImage, usedPrograms) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die('Database statement preparation failed: ' . $conn->error);
        }
        $stmt->bind_param("sssss", $projectName, $shortDescription, $description, $pathProjectImage, $usedPrograms);
    }

    if (!$stmt->execute()) {
        die('Database operation failed: ' . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    header('Location: cms.php');
    exit;
} else {
    header('Location: cms.php');
    exit;
}
?>
