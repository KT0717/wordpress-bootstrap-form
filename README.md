## wordpress-bootstrap-form
ローカル環境にてWordpressとBootstrapを使った申し込みフォームの作成

### 概要・ねらい
* Wordpressで使えるお申し込みフォームのテンプレート作成
* デザインはBootstrapを使用
* 入力された内容をデータベースに格納（CSVで出力するため）
* 入力された内容を自分宛のメールアドレスに送信（WP Mail SMTP使用）

## 環境
### [Local by Flywheel](https://localwp.com/)

ローカルでWordpressを開発するために Local by Flywheel を使用

設定は下記画像とする。それ以外はデフォルト

<img width="1440" alt="" src="https://user-images.githubusercontent.com/75486352/114484307-ee05d180-9c44-11eb-9222-851a0c187ddd.png">

wp db export test.sql --socket="/Users/kouichi/Library/Application Support/Local/run/ajiFsEYyd/mysql/mysqld.sock"

### [WP Mail SMTP by WPForms](https://ja.wordpress.org/plugins/wp-mail-smtp/)

SMTPサーバーを使ってメールを送信できるように WP Mail SMTP のプラグインを使用  
（Wordpressのダッシュボードにて該当のプラグインを追加してください）

設定は下記を参考（Gmail使用）  
https://tcd-theme.com/2019/03/wp-mail-smtp.html

WP Mail SMTP

![s](https://user-images.githubusercontent.com/75486352/114486430-dd575a80-9c48-11eb-9b6e-2116756fc0fd.png)

## 起動
```
cd Local\ Sites/test/app/public/wp-content/themes
git clone git@github.com:hp900ps/wordpress-contact-form.git
cd wordpress-contact-form
npm i
gulp
```

## 備考

お申し込みフォームは固定ページで作成しています  
各ページの「テンプレート」「親ページ」の設定を忘れずに行ってください

![s2](https://user-images.githubusercontent.com/75486352/114487143-0c220080-9c4a-11eb-92e5-e9e9f00586d4.png)