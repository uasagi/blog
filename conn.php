<?php
$servername = "localhost";
$username = "rain";
$password = "12345";
// $dbname = "testphp";
$dbname = "diving";
$port = 3306;

// try {
//     $conn = new mysqli($servername, $username, $password, $dbname, $port);
// } catch (mysqli_sql_exception $exception) {
//     die("連線失敗：" . $exception->getMessage());
// }

// echo "連線成功";

try{
    $conn = new PDO(
    "mysql:host={$servername};
    dbname={$dbname};
    port={$port};
    charset=utf8", 
    $username, 
    $password);
}catch(PDOException $e){
    echo "資料庫連線失敗<br>";
    echo "Error: " .$e->getMessage() ."<br>";
    exit;
}
// echo "連線成功";

?>