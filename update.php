<?php
  include 'con_db.php';

// * Menu No 가져오기
  $sql = "SELECT MAX(menuno) AS max_no FROM foodlist";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $max_menuno = $row["max_no"];
      $max_menuno = $max_menuno + 1;
    }
  }else {
    $max_menuno = 1;
  }

// * 값 넘겨받아서 저장하기 ----------------------------
  $title = $_POST[title];
  $description = $_POST[description];
  $ins_date = date("y.m.d");
  $ins_time = date("h:i:s");

  // $user_id = $_SERVER["AUTH_USER"];
  $user_id = getenv('USERDOMAIN');

  $mod_date = date("y.m.d");
  $mod_time = date("h:i:s");


  $sql = "INSERT INTO foodlist (menuno, title, description, ins_date, ins_time, user_id, mod_date, mod_time)
  VALUES ('".$max_menuno."', '".$title."', '".$description."', '".$ins_date."', '".$ins_time."', '".$user_id."', '".$mod_date."', '".$mod_time."')";

  if ($conn->query($sql) === TRUE) {
// * 확인창 띄우기 ------------------------
      echo "<script LANGUAGE='JavaScript'> window.alert('Update Completed !');<script>";

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

// * D/B Disconnection -------------------
  $conn->close();

// * 최초 화면으로 이동하기 ----------------
  $url = "index.html";
  header("Location: $url");

?>
