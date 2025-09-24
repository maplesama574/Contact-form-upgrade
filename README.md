# Contact Form

## 環境構築
1. リポジトリをクローン
bash
    git@github.com:maplesama574/Contact-form-upgrade.git
    cd contact-form

2. Docker ビルド & 起動
  bash
    docker-compose up -d --build
    

3. コンテナに入って Laravel セットアップ
  bash
    docker exec -it contact-form-php-1 bash
    composer install
    cp .env.example .env
    php artisan key:generate
   

4. マイグレーション & シーディング
 bash
    php artisan migrate --seed
   
   
5. お問い合わせフォームのみ
 bash
    php artisan serve

---

## 使用技術(実行環境)
- PHP 8.x  
- Laravel 10.x  
- MySQL 8.x  
- Nginx  
- Docker / Docker Compose  

## ER図
[ER図 PDF](./docker/文書3.pdf)




## URL
- 開発環境トップ: http://localhost:8080
- ログイン: http://localhost/login
- ユーザー登録: http://localhost/register
- お問い合わせ入力: http://127.0.0.1:8000/contact
- お問い合わせ確認:http://localhost:8080/contact/confirm
- お問い合わせ完了: http://localhost:8080/contact/thanks
- 管理者画面:http://localhost/admin
