<?php
require "database.php";



if (isset($_FILES["fileToUpload"])) {

if (isset($_POST["Xemanh"])) {
    $sql = "SELECT *from images";
     $result = $db->query($sql)->fetch_all();
for ($i=0; $i <count($result) ; $i++) { 
    ?>
    <img src="<?php echo $result[$i][1]?>">
    <?php
    # code...
}
    # code...
}

    

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submits"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        $link= $_FILES["fileToUpload"]["name"];
        $sql="INSERT INTO `images`(`link`) VALUES("."'"."upload/".$link."'".")";
        $db->query($sql);

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    # code...
}



?>
<!DOCTYPE html>
<html>
<body style=" width: 400px; height: 200px; justify-content: center;align-items: center;">

<form action="" method="post" enctype="multipart/form-data" style="display: flex;flex-direction: column;" 
>   
    <input type="file" name="fileToUpload" id="fileToUpload">
    
   
    <button name="submits">Upload</button>
     <button name="Xemanh">Xemanh</button>
    
</form>



</body>
</html>