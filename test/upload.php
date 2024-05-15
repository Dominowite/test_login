<?php
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["excelFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is an Excel file
    if($fileType != "xlsx" && $fileType != "xls") {
        echo "Only Excel files are allowed.";
        $uploadOk = 0;
    }

    // Upload file
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["excelFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["excelFile"]["name"]). " has been uploaded.";
            // เพิ่มการดำเนินการเพื่ออ่านและประมวลผลข้อมูล Excel ต่อไป
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
