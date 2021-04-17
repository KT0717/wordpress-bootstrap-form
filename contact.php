<?php
session_start();
/* Template Name: contact */
?>
<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col mx-auto" style="max-width: 445px;">
      <div class="form-wrapper border rounded p-4 my-5">
        <h4 class="text-center font-weight-bold mb-4">お申し込みフォーム</h4>
        <form id="form" action="<?php echo get_permalink( get_page_by_title("confirm")); ?>" method="post" name="your-form" class="rneeds-validation" novalidate>
          <div class="px-1 mb-4">
            <label for="your-name" class="form-label d-flex align-items-center">
              <span>お名前</span><span class="small">（ニックネーム可）</span><span class="small text-danger">（必須）</span>
            </label>
            <input name="your-name" type="text" class="form-control" id="your-name" autocomplete="your-name" required>
            <div class="invalid-feedback">
              <span>この項目は入力が必須です</span>
            </div>
          </div>
          <div class="px-1 mb-4">
            <label class="form-label d-flex align-items-center">
              <span>性別</span><span class="small text-danger">（必須）</span>
            </label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="your-gender" id="your-gender1" value="男" checked>
              <label class="form-check-label" for="your-gender1">
                <span>男</span>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="your-gender" id="your-gender2" value="女">
              <label class="form-check-label" for="your-gender2">
                <span>女</span>
              </label>
            </div>
          </div>
          <div class="px-1 mb-4">
            <label for="your-email" class="form-label d-flex align-items-center">
              <span>メールアドレス</span><span class="small text-danger">（必須）</span>
            </label>
            <input name="your-email" type="email" class="form-control" id="your-email" autocomplete="your-email"
              required>
            <small class="example-text form-text text-muted">you@example.com</small>
            <div class="invalid-feedback">
              <span>有効なメールアドレスを入力してください。</span>
            </div>
          </div>
          <div class="px-1 mb-4">
            <label for="your-address" class="form-label d-flex align-items-center">
              <span>お住まいの地域</span><span class="small text-danger">（必須）</span>
            </label>
            <input name="your-address" type="text" class="form-control" id="your-address" autocomplete="your-address"
              required>
            <small class="example-text form-text text-muted">例）千葉市花見川区</small>
            <div class="invalid-feedback">
              <span>この項目は入力が必須です</span>
            </div>
          </div>
          <div class="px-1 mb-4">
            <label for="your-members" class="form-label d-flex align-items-center">
              <span>参加人数</span><span class="small text-danger">（必須）</span>
            </label>
            <input name="your-members" class="form-control w-25" id="your-members" required>
            <div class="invalid-feedback">
              <span>この項目は入力が必須です</span>
            </div>
          </div>
          <div class="px-1 mb-4">
            <label for="your-tel" class="form-label d-flex align-items-center">
              <span>電話番号</span><span class="small text-secondary">（任意）</span>
            </label>
            <input name="your-tel" id="your-tel" type="tel" class="form-control">
          </div>
          <div class="px-1 mb-4">
            <label for="your-level" class="form-label d-flex align-items-center">
              <span>過去の実績や経験年数</span><span class="small text-secondary">（任意）</span>
            </label>
            <textarea name="your-level" class="form-control" id="your-level"></textarea>
            <small class="example-text form-text text-muted">例）国体３位、経験年数２０年以上</small>
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
          <div class="px-1 mb-4">
            <button name="your-submit" class="btn btn-primary w-100" type="submit">送信</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
<script>
  (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>
<style>
  textarea:-webkit-autofill,
  textarea:-webkit-autofill:hover,
  textarea:-webkit-autofill:focus,
  textarea:-webkit-autofill:active,
  input:-webkit-autofill,
  input:-webkit-autofill:hover,
  input:-webkit-autofill:focus,
  input:-webkit-autofill:active {
    transition: background-color 5000s ease-in-out 0s;
  }

  .was-validated :invalid~.example-text {
    display: none;
  }

  .was-validated .form-control:valid:focus {
    border-color: #ced4da !important;
  }

  .was-validated .form-control:valid {
    border-color: #ced4da !important;
  }

  .was-validated .form-control:valid {
    background-image: none !important;
  }

  label {
    margin-bottom: .25rem !important;
  }

  .example-text {
    margin-left: .075rem;
  }
</style>
