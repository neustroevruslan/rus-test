Тестовое задание InDriver

Развертывание Docker-образа

git clone 
docker-compose up

https://www.getpostman.com/collections/e8b2eb773012a018ef0b

Запросы к API
Список Авто
http://127.0.0.1:62110/api/auto/v1/list

Ожидает параметры

order (string) - name, year, year_desc
limit (int)
offset (int)
Добавление Авто
http://127.0.0.1:62110/api/auto/v1/add

Ожидает параметры

name (string)
year (int)
color (string)
Редактирование Авто
http://127.0.0.1:62110/api/auto/v1/edit

Ожидает параметры

id (int)
Объект data

[

name (string)
year (int)
color (string)
]

Удаление Авто
http://127.0.0.1:62110/api/auto/v1/delete

Ожидает параметры

id (int) - ID авто в БД
