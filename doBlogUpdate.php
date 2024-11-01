<?php
require_once("conn.php");
require_once("./utilities.php");

if (!isset($_POST["id"])) {
  echo "請從正常管道進入";
  exit;
}

$id = (int)$_POST["id"];
$name =  htmlspecialchars($_POST["name"]);
$content =  replaceScript($_POST["content"]);
$category =  isset($_POST["category"]) ? (int)$_POST["category"] : NULL;

if ($name === "") {
  alertAndClickBack("標題沒有填~");
}

if ($content === "") {
  alertAndBack("內容沒有填~");
  exit;
}

if ($category === NULL) {
  alertAndBack("分類沒有選~");
  exit;
}

$sql = "UPDATE `blogs` SET 
    `name` = '$name', 
    `categoryId` = $category, 
    `content` = '$content', 
    `lastUpdatedTime` = CURRENT_TIMESTAMP 
  WHERE `blogs`.`id` = $id;";

// try {
//   $conn->query($sql);
//   echo "修改資料成功";
//   echo '<script>
//         setTimeout(function() {
//         window.location.href = "./blogs.php";
//         }, 3000);
//         </script>';
// } catch (mysqli_sql_exception $e) {
//   echo "修改資料錯誤" . $e->getMessage();
//   exit;
// }

// $conn->close();

try {

  $stmt = $conn->prepare($sql);
  $stmt->execute();

  
  echo "修改資料成功";
  echo '<script>
      setTimeout(function() {
      window.location.href = "./blogs.php";
      }, 3000);
      </script>';
} catch (PDOException $e) {
  
  echo "修改資料錯誤：" . $e->getMessage();
  exit;
}

$conn = null; 