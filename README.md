<h1>Тестовое задание InDriver</h1>
<h2>Запуск среды</h2>
git clone https://github.com/neustroevruslan/rus-test.git
<br/>cd rus-test
<br/>docker-compose up -d

<br/>поднимется локальный сервер http://localhost:1408/


<h2>Api</h2>

<h3>Список Авто</h3>
http://localhost:1408/cars/list/

<h5>Входящие параметры</h5>
order (string) - id, name, year, color
<br/>limit (int)
<br/>offset (int)

<h3>Добавление Авто</h3>
http://localhost:1408/cars/add

<h5>Входящие параметры</h5>
name (string)
<br/>year (int)
<br/>color (string)

<h3>Редактирование Авто</h3>
http://localhost:1408/cars/update

<h5>Входящие параметры</h5>
id (int)
<br/>name (string)
<br/>year (int)
<br/>color (string)

<h3>Удаление Авто</h3>
http://localhost:1408/cars/delete
<h5>Входящие параметры</h5>
id (int)
