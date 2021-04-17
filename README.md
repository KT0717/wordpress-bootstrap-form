## wordpress-bootstrap-form
ローカル環境（Local by Flywheel）にて Wordpress と Bootstrap を使ったお申し込みフォームの作成

### 概要・ねらい
* Local by Flywheel を使って気軽に Wordpress の開発を行う
* お申し込みフォームのテンプレート作成
* デザインは Bootstrap を使用
* 入力された内容をデータベースに格納
* 管理者、申込者にメールを自動送信

## 環境（Local by Flywheel）

ローカルでWordpressを開発するために Local by Flywheel を使用

[公式サイト](https://localwp.com/)からダウンロード、インストールする

プロジェクト名は test とする

#### 今回の Local by Flywheel の設定
PHP Version 7.4.1  
Apache 2.4.42  
MySQL 5.7.28  

Wordpress Username: test  
Wordpress Password: root  
Wordpress Email: dev-email@flywheel.local (デフォルトのまま)

Site Domaine を test.local から test.wp に変更（なんとなくです）

Local by Flywheel の [OPEN SITE] をクリックすると Wordpress のログイン画面が表示されます

http://test.local/wp-admin/

#### Wordpress の設定
Local by Flywheel で設定した Username と Password でログイン  
[設定]で 言語:日本語 タイムゾーン:東京

#### フォームのテンプレートを Wordpress のテーマに設定する

（プロジェクト名 test とすると）

cd Local\ Sites/test/app/public/wp-content/themes  
git clone git@github.com:KT0717/wordpress-bootstrap-form.git   
cd wordpress-bootstrap-form  
（テーマに必要なファイルが展開されています）  
npm i  
（SASS のコンパイルのために gulp を使用しているのでインストール)  

wordpress のダッシュボード（[http://test.local/wp-admin/](http://test.local/wp-admin/)）にて、  
[外観][テーマ変更]で[wp]というテーマを有効にする

お申し込みフォームは固定ページで作成しています

contact（フォームページ）  
comfirm（確認ページ:親ページに contact）  
complete（完了ページ:親ページに contact）

各ページ、「テンプレート」「親ページ」の設定を忘れずに行ってください

#### データベースのインポート

下記データベース設定ファイルをダウンロードしてを Local by Flywheel の [DATABASE] [OPEN ADMINER]を開いてインポートしてください

https://github.com/KT0717/wordpress-bootstrap-form/blob/master/wp_test_form.sql.gz

#### 完成形

http://test.local/contact/

![form](https://user-images.githubusercontent.com/82574495/115107707-926e7780-9fa7-11eb-8144-5211f16e7bbe.png)

<!-- wp db export test.sql --socket="/Users/kouichi/Library/Application Support/Local/run/ajiFsEYyd/mysql/mysqld.sock" -->

