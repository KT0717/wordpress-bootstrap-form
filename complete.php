<?php
session_start();
/* Template Name: complete */

if (isset($_SESSION['your-submit'])) {

    // DB登録ここから
    $name = $_SESSION['your-name'];
    $gender = $_SESSION['your-gender'];
    $email = $_SESSION['your-email'];
    $address = $_SESSION['your-address'];
    $members = $_SESSION['your-members'];
    $tel = $_SESSION['your-tel'];
    $level = $_SESSION['your-level'];

    $name = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
    $gender = htmlspecialchars($gender, ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($email, ENT_QUOTES, "UTF-8");
    $address = htmlspecialchars($address, ENT_QUOTES, "UTF-8");
    $members = htmlspecialchars($members, ENT_QUOTES, "UTF-8");
    $tel = htmlspecialchars($tel, ENT_QUOTES, "UTF-8");
    $level = htmlspecialchars($level, ENT_QUOTES, "UTF-8");

    $dsn = 'mysql:dbname=local; host=localhost; charset=utf8';
    $user = 'root';
    $pass = 'root';
    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'insert into wp_test_form(name, gender, email, address, members, tel, level)values(?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $name;
    $data[] = $gender;
    $data[] = $email;
    $data[] = $address;
    $data[] = $members;
    $data[] = $tel;
    $data[] = $level;
    $stmt->execute($data);

    $dbh = null;

    // メールセクションここから
    // 管理者へ送信ここから
    $to = 'ffffff@gmail.com';
    $subject = $_SESSION['your-name']."さんからお申し込みがありました";
    $content = "お申し込み内容".
    "\n".
    "-----------------".
    "\n".
    "【お名前】： ".$_SESSION['your-name'].
    "\n".
    "【性別】： ".$_SESSION['your-gender'].
    "\n".
    "【メールアドレス】： ".$_SESSION['your-email'].
    "\n".
    "【お住まいの地域】： ".$_SESSION['your-address'].
    "\n".
    "【参加人数】： ".$_SESSION['your-members'].
    "\n".
    "【電話番号】： ".$_SESSION['your-tel'].
    "\n".
    "【過去の実績や経験年数】： ".$_SESSION['your-level'].
    "\n".
    "-----------------";
    mb_send_mail($to, $subject, $content);
    // 申込者へ送信ここから
    $to = $_SESSION['your-email'];
    $subject = "申し込みを受け付けました";
    $content = "お申し込み内容".
    "\n".
    "-----------------".
    "\n".
    "【お名前】： ".$_SESSION['your-name'].
    "\n".
    "【性別】： ".$_SESSION['your-gender'].
    "\n".
    "【メールアドレス】： ".$_SESSION['your-email'].
    "\n".
    "【お住まいの地域】： ".$_SESSION['your-address'].
    "\n".
    "【参加人数】： ".$_SESSION['your-members'].
    "\n".
    "【電話番号】： ".$_SESSION['your-tel'].
    "\n".
    "【過去の実績や経験年数】： ".$_SESSION['your-level'].
    "\n".
    "-----------------";
    mb_send_mail($to, $subject, $content);
    session_destroy();
}
?>
<?php get_header(); ?>
<div class="container">
  <div class="row justify-content-center">
      <div class="mt-5">
        <p class="h4 mb-5">お申し込みを受付しました</p>
        <div class="text-left mx-auto mb-4">
          <p class="small text-secondary mb-2">自動返信にて登録内容が返信されます。</p>
          <p class="small text-secondary">メールが届かない場合は、迷惑メールフォルダやゴミ箱に自動的に振り分けられている可能性がありますので、一度ご確認頂きますようお願い致します。</p>
        </div>
        <a href="<?php echo get_permalink(get_page_by_title('front-page')); ?>" class="btn btn-link btn-sm p-0">トップへ戻る</a>
    </div>
  </div>
</div>
<style>
  .back-text-box {
    position: absolute !important;
    top: 25%;
    left: 50%;
    transform: translateX(-50%);
  }
</style>
<?php get_footer(); ?>
