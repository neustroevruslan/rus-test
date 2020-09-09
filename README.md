<h1>Тестовое задание InDriver</h1>
<h2>Развертывание Docker-образа</h2>
&#160git clone https://github.com/neustroevruslan/rus-test.git
<br />&#160cd rus-test
<br />&#160docker-compose up -d

<h2>Методы</h2>
&#160 http://localhost:1408/cars/

<h3>Список Авто</h3>
&#160 /list

<h5>Входящие параметры</h5>
order (string) - id, name, year, color
<br />limit (int)
<br />offset (int)

<h3>Добавление Авто</h3>
/add

<h5>Входящие параметры</h5>
name (string)
<br />year (string)
<br />color (string)

<h3>Редактирование Авто</h3>
/update

<h5>Входящие параметры</h5>
id (int)

<h3>Удаление Авто</h3>
/delete
<h5>Входящие параметры</h5>
id (int)
