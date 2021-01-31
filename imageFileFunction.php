<?php

//for IMAGE file uploading
//append file name if file exits
function file_newname($path, $filename) {
    if ($pos = strrpos($filename, '.')) {
        $name = substr($filename, 0, $pos);
        $ext = substr($filename, $pos);
    } else {
        $name = $filename;
    }

    $newpath = $path . '/' . $filename;
    $newname = $filename;
    $counter = 0;
    while (file_exists($newpath)) {
        $newname = $name . '_' . $counter . $ext;
        $newpath = $path . '/' . $newname;
        $counter++;
    }
    return $newname;
}

$target_dir_img = "uploadFile/img/";
$target_image_name = basename($_FILES["img_File"]["name"]);
$target_new_name_img = file_newname($target_dir_img, htmlspecialchars($target_image_name));
$target_file_img = $target_dir_img . $target_new_name_img;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file_img, PATHINFO_EXTENSION));
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    header("location:registation.php");
    exit;
} else {
    if (move_uploaded_file($_FILES["img_File"]["tmp_name"], $target_file_img)) {
        echo "The file " . $target_new_name_img . " has been uploaded. <br/>";
        $uploadOk = 1;
    } else {
        echo "Sorry, there was an error uploading your file.<br/>";
    }
}
//for image end
//for PDF
$target_dir_pdf = "uploadFile/pdf/";
$target_pdf_name = basename($_FILES["upload_File"]["name"]);
$target_new_name_pdf = file_newname($target_dir_pdf, htmlspecialchars($target_pdf_name));
$target_file_pdf = $target_dir_pdf . $target_new_name_pdf;
$uploadPDFOk = 1;
$pdfFileType = strtolower(pathinfo($target_file_pdf, PATHINFO_EXTENSION));
if ($pdfFileType != "pdf") {
    echo "Sorry, only PDF allowed.";
    $uploadPDFOk = 0;
}
if ($uploadPDFOk == 0) {
    echo "Sorry, your file was not uploaded.";
    header("location:registation.php");
    exit;
} else {
    if (move_uploaded_file($_FILES["upload_File"]["tmp_name"], $target_file_pdf)) {
        echo "The file " . $target_new_name_pdf . " has been uploaded.<br/>";
        $uploadPDFOk = 1;
    } else {
        echo "Sorry, there was an error uploading your file.<br/>";
    }
}


