<?php
  require_once('../../../config.php');

  $twitterLogin = new MyApp\TwitterLogin();
  $user = new MyApp\User();
  $postClass = new MyApp\Post();
  $stamp = new MyApp\Stamp();

  if ($twitterLogin->isLoggedIn()) {
    $me = $_SESSION['me'];
    $juggler = $user->getUserFromId($me->id);
    $posts = $postClass->getPosts($me->id);
    $info = $postClass->getInfoFromId($me->id);
  }
 ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jugloop! | ジャグラーのための練習時間記録アプリケーション</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../stamps.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7014251046948920",
        enable_page_level_ads: true
      });
    </script>
  </head>
  <body>
    <?php include_once('../../navbar.php') ?>
    <div class="main">
      <ul class="breadcrumb">
        <li><a href="/">Top</a></li>
        <li><a href="/stamp">Stamp</a></li>
        <li><a href="/stamp/cigar">Cigarbox</a></li>
        <li class="active">Update</li>
      </ul>
      <?= h($stamp->getCigarTrick($_POST['trick_id'])->trick_name); ?> の LEVEL
      <?= h($_POST['level']); ?>
      <?php if($_POST['options'] != 0): ?>
        オプション:有
      <?php endif; ?>
       を 未達成 にしますか？

      <form action="action" method="post">
        <input type="hidden" name="status" value="delete">
        <input type="hidden" name="user_id" value="<?= h($me->id); ?>">
        <input type="hidden" name="trick_id" value="<?= h($_POST['trick_id']); ?>">
        <input type="hidden" name="options" value="<?= h($_POST['options']); ?>">
        <input type="hidden" name="level" value="<?= h($_POST['level']); ?>">
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
        <button type="submit" class="btn btn-primary">更新</button>
      </form>
  </div><!--main_n -->
      <?php if ($twitterLogin->isLoggedIn()): ?>
      <?php endif; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
