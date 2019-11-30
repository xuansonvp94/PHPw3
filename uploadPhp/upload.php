<?php
    $target_dir = "clientFiles/";

    //basename: lấy về phần cuối cùng của đường dẫn. VD: $_FILES['file']['name'] -> test.txt  -> test.txt là phần cuối cùng
    $target_file =$target_dir.basename($_FILES['file']['name']);
    $uploadOK = 1;

    //pathinfo: lấy thông tin đường dẫn truyển vào, option: PATHINFO_EXTENTION: LẤY PHẦN MỞ RỘNG CỦA ĐƯỜNG DẪN
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST['upload'])) {
        $checkImg = getimagesize($_FILES["file"]["tmp_name"]); //kiểm tra sự tồn tại của ảnh
        if ($checkImg !== false) {
            echo "File is an image ".$checkImg['mime']; //mime: loại ảnh
            $uploadOK = 1;
        } else {
            echo "File is not an image";
            $uploadOK = 0;
        }
    }

    // Check if file already exists:  file_exits
   if(file_exists($target_file)) {
        echo "File already exists";
        $uploadOK = 0;
   }

   //Check file size. If size of file is larger than 500KB. an error messenger is displayed
    if ($_FILES['file']['size'] > 500000) {
        echo "Sorry, Your file is too large";
        $uploadOK = 0;
    }

    // Allow certain file formats. Only allowes upload JPG, JPEG, GIF, PNG file.
    if ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only PG, JPEG, GIF, PNG files are allowed";
        $uploadOK = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOK == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
