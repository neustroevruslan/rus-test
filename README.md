<h1>Запуск</h1>
git clone https://github.com/neustroevruslan/rus-test.git
</br >cd rus-test
</br >docker-compose up -d
</br >
</br ><a href="http://localhost:1408/">http://localhost:1408/</a>
<h1>Функции</h1>
For
</br> - add a car in list "http://localhost:1408/car/add" 
</br> - delete a car from list "http://localhost:1408/car/delete"
</br> - update a car information "http://localhost:1408/car/update"
</br> - get car list "http://localhost:1408/car/list"
</br>       options:
</br>           ?limit=number
</br>           ?limit=number&offset=number
</br>           ?order=columnname
