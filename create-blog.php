<?php
require_once("./conn.php");
$sql = "SELECT * FROM `category`";
// try {
//   $result = $conn->query($sql);
//   $msgCount = $result->num_rows;
//   $rows = $result->fetch_all(MYSQLI_ASSOC);
// } catch (mysqli_sql_exception $exception) {
//   echo "資料讀取錯誤：" . $exception->getMessage();
//   $msgCount = -1;
// }

try {
  
  $stmt = $conn->query($sql);

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $msgCount = count($rows);
} catch (PDOException $exception) {
  echo "資料讀取錯誤：" . $exception->getMessage();
  $msgCount = -1;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog</title>
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Castoro:ital@0;1&family=Noto+Sans+TC:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/customBS.css" />
    <link rel="stylesheet" href="../css/pageDashboard3.css" />
<style>
  body{
    background:#AEE4FF;
  }

  .btn-info{
    background:;
    text-decoration: none;

  }

  button a {
    text-decoration: none; 
  
}
</style>
</head>
<body>
<body class="bg-three d-flex">
  
  <nav class="d-flex sticky-top h100vh rounded-end-4">
    <!-- 綠色欄位 -->
    <div class="w280px h-100 bg-one position-relative rounded-end-5">
      <div
      class="green-area-icon h-100 w80px d-flex flex-column align-items-center"
      >
      <!-- 在自己的<div>上加2個class: bg-white shadow -->
      <!-- 將<i>上的原本的class: text-white 改成 text-one -->
      <!-- 會員 -->
        <div
          class="menu-btn mt-4 w50px h50px d-flex justify-content-center align-items-center rounded-4 mb-3 btn1 "
        >
          <a href="../member/index.php"
            ><i class="fa-solid fa-user-group text-white fs-4"></i
          ></a>
        </div>
        <!-- 商品 -->
        <div
          class="menu-btn w50px h50px d-flex justify-content-center align-items-center rounded-4 mb-3 btn2"
        >
          <a href="../product/index.php"><i class="fa-solid fa-store text-white fs-4"></i></a>
        </div>
        <!-- 課程 -->
        <div
          class="menu-btn w50px h50px d-flex justify-content-center align-items-center rounded-4 mb-3 btn3"
        >
          <a href="../lesson/index.php"
            ><i class="fa-regular fa-calendar text-white fs-4"></i
          ></a>
        </div>
        <!-- 部落格 -->
        <div
          class="bg-white shadow menu-btn w50px h50px d-flex justify-content-center align-items-center rounded-4 mb-3 btn4"
        >
          <a href="../blog/blogs.php"><i class="fa-brands fa-blogger text-one fs-5"></i></a>
        </div>
        <!-- 潛點地圖 -->
        <div
          class="menu-btn w50px h50px d-flex justify-content-center align-items-center rounded-4 mb-3 btn5"
        >
          <a href="../DSite/dsList.php"><i class="fa-regular fa-map text-white fs-4"></i></a>
        </div>
        <!-- 媒體庫 -->
        <div
          class="menu-btn w50px h50px d-flex justify-content-center align-items-center rounded-4 mb-3 btn6"
        >
          <a href="../media/mediaLibrary.php"><i class="fa-regular fa-image text-white fs-4"></i></a>
        </div>
        <!-- 員工 -->
        <div
          class="menu-btn w50px h50px d-flex justify-content-center align-items-center rounded-4 mb-2 mt-auto btn7"
        >
          <a href="../employee/index.php"
            ><i class="fa-solid fa-address-card text-white fs-5"></i
          ></a>
        </div>
        <div
          class="w50px h50px d-flex justify-content-center align-items-center rounded-4 mb-4"
        >
          <a href="#"
            ><i class="fa-solid fa-right-from-bracket text-white fs-5"></i
          ></a>
        </div>
      </div>
    </div>
    <!-- 白色欄位 -->
    <div
      class="w200px h-100 d-flex flex-column justify-content-center bg-white card rounded-4 position-absolute white-area"
    >
      <!-- logo區 -->
      <div class="logobox container my-5 d-flex justify-content-center">
        <img
          src="../84901e5e1a173e3324e4ba59bf3b9b9f.png"
          alt=""
          class="logo"
        />
      </div>
      <!-- 新增按鈕，在a上放自己新增一筆的連結 -->
      <div class="addBtnBox container text-center mb-5 mt-4">
        <a href="./create-blog.php">
          <button class="btn btn-one"><i class="fa-solid fa-square-plus"></i><span class="px-3">create new</span>
          </button>
        </a>
      </div>
      <!-- 目錄區(手風琴) -->
      <div>
        <div cla>
          <div class="accordion-title">
            <!-- 放上icon跟分類名稱 -->
            <button class="accordion-button text-one ms-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa-brands fa-blogger text-one fs-5"></i><span class="menu-icon"></span><span class="menu-title">文章管理</span></button>
          </div>
          <div>
            <div class="accordion-body mt-4">
              <!-- 放上子項目名稱&連結 -->
              <li class=""><a href="#######" class="ms-1">文章列表</a></li>
            </div>
          </div>
        </div>
      </div>
      <!-- 其他功能 -->
      <div class="container mb-3 mt-auto ms-4">
        <div class="ps-3 text-four">
          <i class="fa-solid fa-share-nodes"></i>
          <span class="ps-2">share</span>
        </div>
      </div>
      <div class="container mb-3 ms-4">
        <div class="ps-3 text-four">
          <i class="fa-solid fa-clock"></i>
          <span class="ps-2">recent</span>
        </div>
      </div>
      <div class="container mb-3 ms-4">
        <div class="ps-3 text-four">
          <i class="fa-solid fa-star"></i>
          <span class="ps-2">favorite</span>
        </div>
      </div>
      <div class="container mb-5 ms-4">
        <div class="ps-3 text-four">
          <i class="fa-solid fa-trash-can"></i>
          <span class="ps-2">delete</span>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <form action="./doBlogInsert.php" method="post" enctype="multipart/form-data">
      <div class="content-area">
        <div class="input-group">
          <span class="input-group-text">我是標題~</span>
          <input name="name[]" type="text" class="form-control" placeholder="">
        </div>
        <div class="input-group ">
          <span class="input-group-text">我是內容~</span>
          <textarea name="content[]" class="form-control"></textarea>
        </div>
        <div class="input-group ">
          <span class="input-group-text">分類在這~</span>
          <select name="category[]" class="form-select">
            <option value="XX" selected disabled>請選擇</option>
            <? foreach ($rows as $row) : ?>
              <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
            <? endforeach ?>
          </select>
        </div>
        <!-- <div class="input-group mb-3">
          <input class="form-control" type="file" name="myFile[]" accept="image/*">
        </div>
      </div> -->

      <div class="text-end">
        <button type="submit" class="btn btn-one">送出</button>
        <button type="submit" class="btn btn-light"><a href="./blogs.php">資料列表</a></button>

        
        <!-- <button type="submit" class="btn btn-info btn-add">增加一組</button> -->
        <!-- <a button type="submit" class="btn btn-primary btn-add" href="./blogs.php">資料列表</a> -->
      </div>
    </form>
    <template id="inputs">
      <div class="input-group">
        <span class="input-group-text">偶是標題~</span>
        <input name="name[]" type="text" class="form-control" placeholder="">
      </div>
      <div class="input-group">
        <span class="input-group-text">偶是內容~</span>
        <textarea name="content[]" class="form-control"></textarea>
      </div>
      <div class="input-group">
        <span class="input-group-text">偶是分類~</span>
        <select name="category[]" class="form-select">
          <option value="XX" selected disabled>請選擇</option>
          <? foreach ($rows as $row) : ?>
            <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
          <? endforeach ?>
        </select>
      </div>
      <!-- <div class="input-group mb-3">
        <input class="form-control" type="file" name="myFile[]" accept="image/*">
      </div> -->
    </template>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    const btnAdd = document.querySelector(".btn-add");
    const contentArea = document.querySelector(".content-area");
    const template = document.querySelector("#inputs");
    btnAdd.addEventListener("click", e => {
      e.preventDefault();

      const node = template.content.cloneNode(true);
      contentArea.append(node);
    });
  </script>
</body>

</html>