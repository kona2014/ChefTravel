<?php
  include 'con_db.php';

  $sql = "SELECT * FROM foodlist";
  $result = $conn->query($sql);

  if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {

// $row[description] 값이 너무 길면 줄여야 함.

      echo "<div class='List__contents__menu'>";
      echo "  <a href='detail.html' class='List__contents__card'>";

      echo "    <div class='List__contents__column'>";
      echo "      <img src='Images/001/sum001.jpg'>";
      echo "    </div>";

      echo "    <div class='List__contents__column'>";
      echo "      <div class='List__contents__row'>";
      echo "        <p>".$row[title]."</p>";
      echo "      </div>";
      echo "      <div class='List__contents__row'>";
      echo "        <p>".$row[description]."</p>";
      echo "      </div>";
      echo "      <div class='List__contents__row'>";
      echo "        <p>Cooked by ".$row[user_id]."</p>";
      echo "      </div>";
      echo "    </div>";

      echo "    <div class='List__contents__column'>";
      echo "      <div class='List__contents__row'>";
      echo "        <p></p>";
      echo "      </div>";
      echo "      <div class='List__contents__row'>";
      echo "        <p></p>";
      echo "      </div>";
      echo "      <div class='List__contents__row'>";
      echo "        <span class='timestamp'>2 days, 15 hours ago</span>";
      echo "      </div>";
      echo "    </div>";

      echo "  </a>";
      echo "</div>";
    }
  }else {

  }
?>
