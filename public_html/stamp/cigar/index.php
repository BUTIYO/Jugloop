<?php
  require_once('../../../config.php');

  $twitterLogin = new MyApp\TwitterLogin();
  $user = new MyApp\User();
  $postClass = new MyApp\Post();
  $stamp = new MyApp\Stamp();

  if ($twitterLogin->isLoggedIn()) {
    $me = $_SESSION['me'];
    $juggler = $user->getUserFromId($me->id);
    $info = $postClass->getInfoFromId($me->id);
    $stamps = $stamp->getCigarStatus($me->id);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['tool']) {
      case 1: header('Location: ../ball');
              break;
      case 2: header('Location: ../club');
              break;
      case 3: header('Location: ../ring');
              break;
      case 4: header('Location: ../dia');
              break;
      case 5: header('Location: ../devil');
              break;
      case 6: header('Location: ../flower');
              break;
      case 7: header('Location: ../cigar');
              break;
      case 8: header('Location: ../contact');
              break;
      case 9: header('Location: ../kendama');
              break;
      case 10: header('Location: ../poi-staff');
               break;
      case 11: header('Location: ../yo-yo-');
               break;
      case 12: header('Location: ../others');
               break;
    }
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
        <li class="active">Cigarbox</li>
      </ul>
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="top_imgbox">
            <img src="../../img/test.png" width="100" class="right-fixed"/>
          </div>
          <div class="top_infobox">
            <div class="text-primary js12">シガーボックスポイント</div>
            <div class="bold js24"><?= h($stamp->getCigarScore($me->id));?>pt</div>
            <div class="text-primary js12">次の段位まで</div>
            <div class="bold js24"><?= h($info['lefttime'])?></div>
            <div class="infotool js12">
          </div>
          </div>
        </div>
      </div>

      <form method="post">
      <div class="form-group">
        <div class="col-xs-8">
          <select class="form-control" name="tool">
            <option value="1">ボール</option>
            <option value="2">クラブ</option>
            <option value="3">リング</option>
            <option value="4">ディアボロ</option>
            <option value="5">デビルスティック</option>
            <option value="6">フラワースティック</option>
            <option value="7" selected>シガーボックス</option>
            <option value="8">コンタクトボール</option>
            <option value="9">けん玉</option>
            <option value="10">ポイ・スタッフ</option>
            <option value="11">ヨーヨー</option>
            <option value="12">その他</option>
          </select>
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          <div class="col-xs-2">
          <button type="submit" class="btn btn-primary">道具を変更</button>
        </div>
        </div>
      </div>
    </form>

<br>
    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">中抜き</div>
          <div class="trick_intro js14">シガーボックスの最も基本となる技</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 1)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="1"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">外抜き</div>
          <div class="trick_intro js14">中抜きと合わせて練習したい基礎技</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 2)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="2"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">両抜き</div>
          <div class="trick_intro js14">外抜きができたらチャレンジ</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 3)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="3"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">大回転</div>
          <div class="trick_intro js14">これができればシガーボックス入門者卒業</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 4)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="4"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">世界一周</div>
          <div class="trick_intro js14">迫力満点</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 5)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="5"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">背面大回転</div>
          <div class="trick_intro js14">安定して決めたい技</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 6)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="6"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">ポップコーン</div>
          <div class="trick_intro js14">ひっつけを意識するのがコツ</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 7)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="7"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">レインボーループ</div>
          <div class="trick_intro js14">数をこなすには体力も必要</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 8)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="8"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">カスケード</div>
          <div class="trick_intro js14">綺麗な軌道を意識して</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 9)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="9"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">ミルズメスチェーン</div>
          <div class="trick_intro js14">派生技も豊富</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 10)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="10"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">ダイヤモンドループ</div>
          <div class="trick_intro js14">4シガーの王道</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 11)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="11"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>

    <div class="trick-box">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <div class="trick_title text-success js24">ダンシーズループ</div>
          <div class="trick_intro js14">4シガーの華</div><br><br>
        </div>
        <div class="trick_bar"><div class="progress progress-striped active">
        <div class="progress-bar progress-bar-primary" style="width:<?= h($stamp->getCigarProgress($me->id, 12)); ?>%"></div></div></div>
        <div class="float_r">
          <a href="12"><button type="submit" class="btn btn-warning">チャレンジ</button></a>
        </div>
      </div>
    </div>
    </div>
    <!-- <?php var_dump($stamps); ?> -->
  </div><!--main_n -->
      <?php if ($twitterLogin->isLoggedIn()): ?>
      <?php endif; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
