<?php
if (isset($_POST['submit'])) {
    include("connection.php");
    $file = $_FILES['file'];

    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $filenameNew = uniqid('', true) . "." . $fileActualExt;
                $filedestination = 'upload/' . $filenameNew;
                move_uploaded_file($fileTmpName, $filedestination);
                header("Location: registration.php?success");
            } else {
                echo "Your File is too Big!";
            }
        } else {
            echo "There was an Error!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}
