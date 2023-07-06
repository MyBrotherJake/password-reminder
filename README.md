## 注意
このアプリケーションはローカル(Xampp)での動作を前提としています。
そのため、ユーザー認証は設定しておりません。

## 導入にあたって予め必要なもの
- Xampp の<a href="https://www.apachefriends.org/jp/index.html">最新バージョン</a>をインストールします。
- <a href="https://getcomposer.org/">Composer</a> の `Getting Started` からインストールします。
- 以下のコマンドでLaravel のインストールを行います。
`composer global require "laravel/installer`
- Laravel Vite を使用しているため、npm が必要となります。Windowsの場合、まず <a href="https://github.com/coreybutler/nvm-windows/releases">nvm </a> をインストールします。


### nvm のインストール
- 利用可能な Node.js のリスト表示
`nvm list available` 
- トップに表示される最新バージョンのインストール
`nvm install 20.0.0`
- インストールしたバージョンを指定
`nvm use 20.0.0`

## 導入方法
- 現在表示されているリポジトリをクローンあるいはフォークします。
- C\xampp\htdocs\ 配下にプロジェクトを配置してください。
- Xamppコントロールパネルを「管理者として実行」し、ApacheおよびMySQLを有効にしてください。
- Apache を start する前に、httpd.conf を編集します。以下の場所を探し、修正してください。

`
DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">
`

`
DocumentRoot "C:/xampp/htdocs/password-reminder/public"
<Directory "C:/xampp/htdocs/password-reminder/public">
`

- 保存後に Apacheをスタートさせます。

### DBの設定
- MySQL を start 後、localhost/phpmyadmin にアクセスしてください。
- passreminder という名前のデータベースを作成します。
- その後、プロジェクト内の create_database.sql ファイルをインポートします。

### .envファイルの作成
- .env.exampleファイルをコピーし名前を .env に変更します。
- DB_CONNECTION について以下のように設定します。

`
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=passreminder
DB_USERNAME=root
DB_PASSWORD=
`

## アプリの起動
- ターミナルで プロジェクトのルートディレクトリに移動後、`composer install` および `npm run build`を実行します。
