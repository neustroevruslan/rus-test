Тестовое задание InDriver

Развертывание Docker-образа

git clone https://github.com/neustroevruslan/rus-test.git
cd rus-test
docker-compose up -d

Методы
http://localhost:1408/

<h4>Список Авто</h4>
/cars/list

<h5>Входящие параметры</h5>
order (string) - id, name, year, color
<br />limit (int)
<br />offset (int)

<h4>Добавление Авто</h4>
/cars/add

<h5>Входящие параметры</h5>
name (string)
<br />year (string)
<br />color (string)

<h4>Редактирование Авто</h4>
/cars/update

<h5>Входящие параметры</h5>
id (int)

<h4>Удаление Авто</h4>
/cars/delete
<h5>Входящие параметры</h5>
id (int)
