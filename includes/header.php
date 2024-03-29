<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/inc/load.php';
if(checkLogin()) {
    $render = getInfoCurrentUser();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?=isset($customTitle) ? $customTitle : $config['site_title']?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/assets/main.css?v=<?=time()?>" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/805c912558.js" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-dark navbar-expand-lg fixed-top main__nav">
    <div class="container">
      <a class="navbar-brand" href="/"><b><i class="fas fa-dice-d20"></i> GMC 2023</b> <sup><small>Aircraft!</small></sup></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="/dvut"><i class="fas fa-gamepad"></i> Danh sách Game</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/dvut"><i class="fas fa-info"></i> Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/dvut"><i class="fas fa-rss"></i> Tin tức</a>
            </li>
        <?php if(checkLogin()): ?>
          <li class="nav-item">
            <a class="nav-link<?=$root=="main" ? " active": ""?>" href="/"><i class="fas fa-info-circle"></i> Xếp loại Đoàn viên</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?=$root=="dvut" ? " active": ""?>" href="/dvut"><i class="fas fa-poll"></i> Bình xét DVUT</a>
          </li>
          <?php if(in_array($render['code'], $config['bch'])): ?>
            <li class="nav-item">
              <a class="nav-link<?=$root=="unvoted" ? " active": ""?>" href="/unvoted"><i class="fas fa-exclamation"></i> Chưa bình xét DVUT</a>
            </li>
          <?php endif ?>
        <?php endif ?>
        </ul>
        <ul class="navbar-nav ml-auto">
          <?php if(!checkLogin()): ?>
            <li class="nav-item">
                <a class="nav-link active" href="/login"> Đăng nhập</a>
            </li>
            <button class="btn btn-success btn__signup" type="submit">Đăng ký tham gia</button>
          <?php else: ?>
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle"></i> Xin chào, <?=$render['name'] . ' ' . $render['code']?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
              </ul>
            </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>
  <?php if($root == 'main'): ?>
  <img src="/assets/img/banner.png" class="img-fluid w-100" />
  <?php endif ?>
  <div class="container-fluid">
    <div class="row">