<?php
session_start();
/* Template Name: confirm */

if (isset($_POST['your-submit'])) {
    $_SESSION['your-name'] = $_POST['your-name'];
    $_SESSION['your-gender'] = $_POST['your-gender'];
    $_SESSION['your-email'] = $_POST['your-email'];
    $_SESSION['your-address'] = $_POST['your-address'];
    $_SESSION['your-members'] = $_POST['your-members'];
    $_SESSION['your-tel'] = $_POST['your-tel'];
    if ($_POST['your-level'] != "") {
        $_SESSION['your-level'] = $_POST['your-level'];
    } else {
        $_SESSION['your-level'] = "記入なし";
    }
    $_SESSION['your-submit'] = $_POST['your-submit'];
}
?>
<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col mx-auto" style="max-width: 445px;">
      <div class="form-wrapper border rounded p-4 my-5">
        <h4 class="text-center font-weight-bold mb-4">お申し込み内容</h4>
        <div class="px-1 mb-4">
          <p class="small text-secondary ml-1 mb-1">お名前</p>
          <p class="bg-light rounded-sm p-2"><?php echo htmlspecialchars($_SESSION['your-name']); ?></p>
        </div>
        <div class="px-1 mb-4">
          <p class="small text-secondary ml-1 mb-1">性別</p>
          <p class="bg-light rounded-sm p-2"><?php echo htmlspecialchars($_SESSION['your-gender']); ?></p>
        </div>
        <div class="px-1 mb-4">
          <p class="small text-secondary ml-1 mb-1">メールアドレス</p>
          <p class="bg-light rounded-sm p-2"><?php echo htmlspecialchars($_SESSION['your-email']); ?></p>
        </div>
        <div class="px-1 mb-4">
          <p class="small text-secondary ml-1 mb-1">お住まいの地域</p>
          <p class="bg-light rounded-sm p-2"><?php echo htmlspecialchars($_SESSION['your-address']); ?></p>
        </div>
        <div class="px-1 mb-4">
          <p class="small text-secondary ml-1 mb-1">参加人数</p>
          <p class="bg-light rounded-sm p-2"><?php echo htmlspecialchars($_SESSION['your-members']); ?></p>
        </div>
        <div class="px-1 mb-4">
          <p class="small text-secondary ml-1 mb-1">電話番号</p>
          <p class="bg-light rounded-sm p-2"><?php echo htmlspecialchars($_SESSION['your-tel']); ?></p>
        </div>
        <div class="px-1 mb-4">
          <p class="small text-secondary ml-1 mb-1">過去の実績や経験年数</p>
          <p class="bg-light rounded-sm p-2">
            <?php $message = htmlspecialchars($_SESSION['your-level']); $message = str_replace(" ", "&ensp;", $message); $message = str_replace("　", "&emsp;", $message); echo nl2br($message); ?>
          </p>
        </div>
        <div class="px-1 mb-4">
          <div class="form-check text-center">
            <input class="form-check-input" type="checkbox" id="invalidCheck" style="margin-top: .4rem;" required>
            <label class="form-check-label small" for="invalidCheck">
              <span>上記の情報を送信することに同意します</span>
            </label>
            <div class="invalid-feedback">
              <span>内容を確認の上、チェックをしてください</span>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button class="btn btn-outline-primary btn-sm w-100 mr-2" type="button"
            onclick="location.href='<?php echo get_permalink(get_page_by_title('contact')); ?>'">修正</button>
          <button class="btn btn-primary btn-sm w-100" type="button"
            onclick="location.href='<?php echo get_permalink(get_page_by_title('complete')); ?>'">送信</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>