## 商品管理システム

### 環境構築手順

* Gitクローン
* .env.example をコピーして .env を作成
* MySQLのデータベース作成（名前：item_management）
* Macの場合 .env の DB_PASSWORD を root に修正（Windowsは修正不要）

    ```INI
    DB_PASSWORD=root
    ```

* APP_KEY生成

    ```console
    php artisan key:generate
    ```

* Composerインストール

    ```console
    composer install
    ```

* フロント環境構築

    ```console
    npm ci
    npm run build
    ```

* マイグレーション

    ```console
    php artisan migrate
    ```

* 起動

    ```console
    php artisan serve
    ```

*GIT
# 作業ディレクトリの変更をステージング
git add .

# 変更をコミット
git commit -m "Fixed issue with AttendanceController and updated view"

# 変更をリモートリポジトリのmainブランチにプッシュ
git push origin main

#　新規にテーブルを作成するとき
　php artisan make:migration create_テーブル名_table --create=テーブル名

# 既存テーブルにカラムを追加
php artisan make:migration add_カラム名_to_テーブル名 --table=テーブル名

# テーブル名変更


# コントローラー新規作成

php artisan make:controller 作成するコントローラー名Controller

# モデル新規作成
php artisan make:model 追加するモデル名

#　マイグレーションにカラムが追加されないとき


