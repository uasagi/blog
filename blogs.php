<?php
require_once("./conn.php");

$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$perPage = 10;
$pageStart = $perPage * ($page - 1);

$cid = isset($_GET["cid"]) ? (int)$_GET["cid"] : 0;
if ($cid === 0) {
  $cateSQL = "";
} else {
  $cateSQL = "WHERE `categoryId` = $cid";
}

$sql = "SELECT * FROM `blogs` $cateSQL ORDER BY `lastUpdatedTime` DESC LIMIT $pageStart, $perPage;";
$sqlAll = "SELECT * FROM `blogs` $cateSQL";
$sql2 = "SELECT * FROM `category`";

// try {
//   $result = $conn->query($sql);
//   $resultAll = $conn->query($sqlAll);
//   $result2 = $conn->query($sql2);
//   $msgCount = $resultAll->num_rows;
//   $rows = $result->fetch_all(MYSQLI_ASSOC);
//   $categoryRows = $result2->fetch_all(MYSQLI_ASSOC);
//   $totalPage = ceil($msgCount / $perPage);
// } catch (mysqli_sql_exception $exception) {
//   echo "資料讀取錯誤：" . $exception->getMessage();
//   $msgCount = -1;
// }
// $conn->close();

try {

  $stmt = $conn->query($sql);
  $stmtAll = $conn->query($sqlAll);
  $stmt2 = $conn->query($sql2);

  
  $msgCount = $stmtAll->rowCount();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $categoryRows = $stmt2->fetchAll(PDO::FETCH_ASSOC);


  $totalPage = ceil($msgCount / $perPage);
} catch (PDOException $exception) {
  echo "資料讀取錯誤：" . $exception->getMessage();
  $msgCount = -1;
}

$conn = null;?>
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
    /* .msg {
      display: flex;
    }

    .id {
      width: 60px;
    }

    .name {
      width: 180px;
    }

    .content {
      flex: 1;
    }

    .time {
      width: 180px;
    }

    .ctrls {
      width: 100px;
    }

    <style> */

    h1{
      text-align:center
    }
    
  .msg {
    display: flex;
    justify-content: space-between;
    padding: 0.2rem;
    background-color: ;
  }

  .msg {
    display: flex;
    justify-content: space-between;
    padding: 0.1rem;
    background-color: #ffffff; 
    background-image: none;    
}

  .msg .id, .msg .name, .msg .content, .msg .time, .msg .ctrls {
    padding: 0.1rem;
  }

</style>
  </style> 
</head>


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
  <h1 class="my-5 text-one">部落格列表</h1>
    <div class="my-2">
      <div class="my-2">
      </div>
      <div class="nav nav-tabs">
        <a class="nav-link <?= $cid === 0 ? "active" : "" ?>" href="./blogs.php">全部</a>
        <? foreach ($categoryRows as $categoryRow) : ?>
          <a class="nav-link <?= $cid === (int)$categoryRow["id"] ? "active" : "" ?>" href="./blogs.php?cid=<?= $categoryRow["id"] ?>"><?= $categoryRow["name"] ?></a>
        <? endforeach ?>
      </div>
    </div>
<div class="msg bg-white mb-1">
      <div class="id">編號</div>
      <div class="name">標題</div>
      <div class="content">內文</div>
      <div class="time d-none">時間</div>
      <div class="ctrls">按鈕</div>
    </div>
    <? if ($msgCount >= 0) : ?>
      <? foreach ($rows as $index => $row) : ?>
        <div class="msg mb-1 ps-2">
          <div class="id"><?= $row["id"] ?></div>
          <div class="name"><?= $row["name"] ?></div>
          <div class="content"><?= $row["content"] ?></div>
          <div class="time d-none"><?= $row["createTime"] ?></div>
          <div class="ctrls"> 
            <div class="btn btn-two text-one"  idn="<?= $row["id"] ?>">刪除</div>
            <a class="btn btn btn-one" href="./edit-blog.php?id=<?= $row["id"] ?>">修改</a>
          </div>
        </div>
      <? endforeach; ?>
    <? endif; ?>
    <div aria-label="...">
      <ul class="pagination pagination-sm justify-content-center">
        <? for ($i = 1; $i <= $totalPage; $i++) : ?>
          <li class="page-item <?= $page === $i ? "active" : "" ?>" aria-current="page">
            <a href="?page=<?= $i ?><?= $cid > 0 ? "&cid=$cid" : "" ?>" class="page-link"><?= $i ?></a>
          </li>
        <? endfor; ?>
      </ul>
      <span class="me-auto">目前共 <?= $msgCount ?> 筆資料</span>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    const btnDels = document.querySelectorAll(".btn-two");
    btnDels.forEach(btnDel => {
      // btnDel.addEventListener("click", function(){
      //     let id = this.getAttribute("idn");
      //     alert(id)
      // })
      btnDel.addEventListener("click", e => {
        let id = e.target.getAttribute("idn");
        if (confirm("確定要刪除嗎") === true) {
          window.location.href = `doDelete02.php?id=${id}`;
        }
      })
    });

const btnSearch = document.querySelector("searchType1");
const input = document.querySelector("searchType2");
btnSearch.addEventListener("click", function(e){
  let queryType = document.querySelector("input[name=searchType]:checked").value;
  let query = document.querySelector("input[name=search]").value;
  window.location.href = `./blog.php?search=${query}&qtype=${queryType}`;
})
  </script>
</body>

</html>