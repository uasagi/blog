<?php
require_once("conn.php");
require_once("./utilities.php");

if(!isset($_POST["name"])){
    echo "請從正常管道進入";
    exit;
}



$namesAry = $_POST["name"];
$contentsAry = $_POST["content"];
$categoryAry = isset($_POST["category"])?$_POST["category"]:[];
$length = count($namesAry);
$categoryLength = count($categoryAry);

$isNameEmpty = false;
for($i = 0; $i < $length; $i++){
    if($namesAry[$i] === ""){
        $isNameEmpty = true;
    }
}
if($isNameEmpty === true){
    alertAndBack("標題忘了喔~");
    exit;
}

$isContentEmpty = false;
for($i = 0; $i < $length; $i++){
    if($contentsAry[$i] === ""){
        $isContentEmpty = true;
    }
}
if($isContentEmpty === true){
    alertAndBack("內容沒有寫喔~");
    exit;
}

if($categoryLength != $length){
    alertAndBack("分類沒有填喔~");
    exit;
}

$sql = "";
for($i = 0;$i < $length;$i++){
    $name = $namesAry[$i];
    $content = $contentsAry[$i];
    $category = intval($categoryAry[$i]);
    $sql .= "INSERT INTO `blogs` 
    (`id`, `name`, `categoryId`, `content`, `createTime`, `lastUpdatedTime`) VALUES 
    (NULL, '$name', $category, '$content', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
}

// try{
//     $conn->multi_query($sql);
//     echo "建立資料成功";
//     echo '<script>
//         setTimeout(function() {
//         window.location.href = "./blogs.php";
//         }, 3000);
//         </script>';
// }catch(mysqli_sql_exception $e){
//     echo "建立資料錯誤" . $e->getMessage();
//     exit;
// }

try {
    $conn->beginTransaction(); 

    
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $conn->commit(); 
    echo "建立資料成功";
    echo '<script>
        setTimeout(function() {
        window.location.href = "./blogs.php";
        }, 3000);
        </script>';
} catch (PDOException $e) {
    $conn->rollBack(); 
    echo "建立資料錯誤：" . $e->getMessage();
    exit;
}

$conn = null; 

// $conn->close();
// sleep(3);
// header("location: ./pageMsgsList.php");
