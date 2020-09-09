<h1>Запуск</h1>
git clone https://github.com/neustroevruslan/rus-test.git
</br >cd rus-test
</br >docker-compose up -d
</br >
</br ><a href="http://localhost:1408/">http://localhost:1408/</a>
<h1>Методы</h1>
</br> - add a car in list "/car/add" 
</br> - delete a car from list "/car/delete"
</br> - update a car information "/car/update"
</br> - get car list "/car/list"
</br>       options:
</br>           ?limit=number
</br>           ?limit=number&offset=number
</br>           ?order=columnname
