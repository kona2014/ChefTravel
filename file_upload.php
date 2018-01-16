<?php
  $target_dir = "Images/";
  $target_file = basename($_FILES["upload"][name]);
  $target_fullname = $target_dir . $target_file;

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_fullname,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["upload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "<script>alert('File is not an image.');</script>;";
          $uploadOk = 0;
          exit;
      }
  }

  // Check if file already exists
  if (file_exists($target_fullname)) {
      echo "<script>alert('Sorry, file already exists.');</script>;";
      $uploadOk = 0;
      exit;
  }

  // Check file size
  if ($_FILES["upload"]["size"] > 500000) {
      echo "<script>alert('Sorry, your file is too large.');</script>;";
      // echo "Sorry, your file is too large.";
      $uploadOk = 0;
      exit;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>;";
    $uploadOk = 0;
    exit;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $message = "<script>alert('Sorry, your file was not uploaded.');</script>;";
    echo "<script>alert('".$message."');</script>;";
    exit;
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_fullname)) {
      $message = "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
      echo "<script>alert('".$message."');</script>;";
    } else {
      $message = "Sorry, there was an error uploading your file.";
      echo "<script>alert('".$message."');</script>;";
      exit;
    }
  }

  // 업로드 된 파일을 에디터에 바로 보여준다.
  echo "<script> window.parent.CKEDITOR.tools.callFunction({$_GET['CKEditorFuncNum']}, '".$http.$target_dir."$target_file');</script>;";
?>
