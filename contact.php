<?php
session_start();
/* Template Name: contact */
?>
<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="form-wrapper col mx-auto">
      <div class="border rounded p-0 p-sm-4 my-5 border-cutstom-hidden">
        <h4 class="text-center font-weight-bold mb-4">お申し込みフォーム</h4>
        <form id="form" action="<?php echo get_permalink( get_page_by_title("confirm")); ?>" method="post"
          name="your-form" class="needs-validation" novalidate>
          <div class="px-1 mb-4">
            <label for="your-name" class="form-label d-flex align-items-center">
              <span>お名前</span><span class="small">（ニックネーム可）</span><span class="small text-danger">（必須）</span>
            </label>
            <input name="your-name" type="text" class="form-control" id="your-name" autocomplete="your-name" required>
            <div class="invalid-feedback">
              <span>この項目は入力が必須です</span>
            </div>
          </div>
          <div id="gender-section" class="px-1 mb-4">
            <label class="form-label d-flex align-items-center">
              <span>性別</span><span class="small text-danger">（必須）</span>
            </label>
            <div class="d-flex">
              <div class="custom-control custom-radio mr-2">
                <input type="radio" class="custom-control-input" id="your-gender1" name="your-gender" value="男" required>
                <label class="custom-control-label" for="your-gender1"><span>男</span></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="your-gender2" name="your-gender" value="女" required>
                <label class="custom-control-label" for="your-gender2"><span>女</span></label>
              </div>
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
          <hr>
          <div class="px-1 mb-4">
            <button name="your-submit" class="btn btn-outline-primary w-100" type="submit">確認画面へ</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
<script>
  (function () {
    'use strict';
    window.addEventListener('load', function () {
      var forms = document.getElementsByClassName('needs-validation');

      var genderSection = document.getElementById("gender-section");
      var yourGender = document.getElementsByName("your-gender");

      function createCustomInvalidFeedback() {
        var el = document.createElement("div");
        el.innerHTML = 'どちらかを選択してください';
        el.classList.add('custom-invalid-feedback');
        addCreateElement(el);
      }

      function addCreateElement(el) {
        el = genderSection.appendChild(el);
      }

      var customInvalidFeedback = document.getElementsByClassName("custom-invalid-feedback");

      yourGender.forEach(e => {
        e.addEventListener("click", () => {
          if (customInvalidFeedback[0] === undefined) {
            return;
          }
          customInvalidFeedback[0].remove();
        })
      })

      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
          var checkYourGender = document.querySelector("input:checked[name=your-gender]");
          if (checkYourGender === null && customInvalidFeedback[0] === undefined) {
            createCustomInvalidFeedback();
          }
        }, false);
      });
    }, false);
  })();
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

  .custom-control {
    padding-left: 1.25rem !important;
  }

  .custom-control-label::before {
    left: -1.25rem !important;
  }

  .custom-control-label::after {
    left: -1.25rem !important;
  }

  .custom-invalid-feedback {
    display: block !important;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 80%;
    color: #dc3545;
  }

  .was-validated .custom-control-input:valid:checked~.custom-control-label::before,
  .custom-control-input.is-valid:checked~.custom-control-label::before {
    border-color: #007bff !important;
    background-color: #007bff !important;
  }

  .was-validated .custom-control-input:valid~.custom-control-label::before,
  .custom-control-input.is-valid~.custom-control-label::before {
    border-color: inherit !important;
  }

  .was-validated .custom-control-input:valid~.custom-control-label,
  .custom-control-input.is-valid~.custom-control-label {
    color: inherit !important;
  }
</style>
