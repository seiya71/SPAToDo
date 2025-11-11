# SPAToDo

---

## 📝 概要（Overview）
> **TODO:** このプロジェクトの目的や特徴を簡潔に記述してください。  
> 例）「Docker環境で動作するLaravel + Vue.js構成のSPAアプリケーション」など。

---

## ⚙️ 使用技術（Tech Stack）
| 分類 | 使用技術 |
|------|-----------|
| バックエンド | Laravel 10.x |
| フロントエンド | Vue.js 3.x（Vite） |
| データベース | MySQL 8.x |
| 管理ツール | phpMyAdmin |
| 仮想環境 | Docker / Docker Compose |

---

## 🏗️ 環境構築手順（Setup）

### 1. コンテナ起動
```bash
cd backend
docker compose up -d --build
```

### 2. Laravel初期化
```bash
docker compose exec app bash -lc "composer create-project laravel/laravel ."
docker compose exec app php artisan key:generate
```

### 3. フロントエンド起動
```bash
cd ../frontend
npm install
npm run dev
```

---

## 🌍 起動URLまとめ（Access URLs）
| サービス | URL |
|-----------|-----|
| Laravel(API) | http://localhost:8080 |
| phpMyAdmin | http://localhost:8081 |
| Vue(Vite) | http://localhost:5173 |

---

## 📁 ディレクトリ構成（Directory Structure）
```
.
├── backend/
│   ├── docker/
│   │   ├── mysql/
│   │   ├── nginx/
│   │   └── php/
│   └── src/
└── frontend/
    └── src/
```

---

## ⚙️ 環境変数（.env Example）
```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=SPAToDo_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

APP_URL=http://localhost:8080
FRONTEND_URL=http://localhost:5173
```

---

## 📌 備考（Notes）
- **TODO:** 必要に応じて追加設定や環境差分を追記してください。  
- 本テンプレートはDocker構成のLaravel + Vue.js（SPA）開発環境用です。

---

## 🪪 ライセンス（License）
> **TODO:** private / MIT / Apache など、プロジェクト方針に合わせて記載。
