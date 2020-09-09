Тестовое задание InDriver

Развертывание Docker-образа

git clone https://github.com/neustroevruslan/rus-test.git
cd rus-test
docker-compose up -d

Методы
http://localhost:1408/

<h4>Список Авто</h4>
/cars/list

Входящие параметры
order (string) - id, name, year, color
limit (int)
offset (int)

Добавление Авто
/cars/add

Входящие параметры
name (string)
year (string)
color (string)

Редактирование Авто
/cars/update

Входящие параметры
id (int)

Удаление Авто
/cars/delete

Входящие параметры
id (int)
