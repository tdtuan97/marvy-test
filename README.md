**Build server commands**:
```
docker-compose up -d --build
```

**Setup Laravel App commands**
```
docker exec -it php bash
cd /var/www/html
cp .env.example .env
composer install
php artisan key:generate
```
**DDOS Test Run**
```
cd marvy-test && bash ddos-script.sh
```

**Host Information**

| No. | Description           | Value                                                     |
|-----|-----------------------|-----------------------------------------------------------|
| 1   | WEB End Point         | http://127.0.0.1:8000                                     |
| 2   | API End Point         | http://127.0.0.1:8000/api/v1                              |
| 3   | Auth Header (For API) | GET                                                       |
| 4   | Auth Header           | "X-Token": "fPzcnjy9fKq+5SzH9nvuvveDN9S25SweH2XkeVVINTU=" |

**API List**

| No. | End Point                                         | Method | GET Params                                                          | POST Params                | Descriptions     |
|-----|---------------------------------------------------|--------|---------------------------------------------------------------------|----------------------------|------------------|
| 1   | http://127.0.0.1:8000/api/v1/user                 | POST   | NULL                                                                | full_name<br/>phone_number | Add new user.    |
| 2   | http://127.0.0.1:8000/api/v1/user/${userId}/point | POST   | NULL                                                                | point<br/>game_id          | Post user point. |
| 3   | http://127.0.0.1:8000/api/v1/user/${userId}       | GET    | NULL                                                                | NULL                       | Get user detail  |
| 4   | http://127.0.0.1:8000/api/v1/user/1/point         | GET    | page (Default: 1)<br/>order (Default: desc) <br/>sort (Default: id) | NULL                       | Get user list    |

(*) User ID: Get from tbl_user

(*) Game ID: Get from tbl_game

(*) order : "asc" or "desc"

(*) sort : "id" or "phone_number" or "full_name"
