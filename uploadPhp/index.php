<?php
/*  đơn giản
$target_dir = "clientFiles/";
    if(isset($_POST["upload"])) {  //kiem tra xem click Upload chua
        if( isset($_FILES["file"]) && !$_FILES["file"]["error"] ) {
            //cop file binary được gửi lên từ tmp_name sang destination: dường dẫn/tên file -> để chuyển thành file như client gửi lên
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$_FILES['file']['name']);
            echo "upload thanh cong";
        } else {
            echo "error";
        }
    }
*/?>

<html>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload
            <input type="file" name="file"> <!--du lieu cua type=file khong nam trong $_POST ma nam trong $_FILES-->
            <input type="submit" name="upload" value="Upload File">
        </form>
    </body>
</html>


