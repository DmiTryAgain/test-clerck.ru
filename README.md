<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <br>
</p>

<h1>Выполнение тестового задания для компании Клерк.Ру</h1>
Постановка задачи: https://docs.google.com/document/d/1TQ4Mbsc3Uk_Fpem0kjirUPv64EHnZun73N36oOj2Bng/edit#heading=h.eytg4j70c563

Для запуска проекта нужно иметь установленный Docker на своей машине, либо установленные приложения nginx, php, mysql.

Для инициализации проекта нужно выполнить следующие действия:
Windows:
<ul>
<li>Склонировать репозиторий</li>
<li>Запустить контейнеры из приложения Docker</li>
<li>Открыть терминал контейнера php</li>
<li>
Выполнить команды в корне проекта:
<p>composer i</p>
<p>php init</p>
<p>php yii migrate</p>
</li>
</ul>
Linux:
<ul>
<li>Склонировать репозиторий</li>
<li>Открыть терминал в корне проекта</li>
<li>cd docker</li>
<li>./dctl.sh build</li>
<li>./up.sh</li>
<li>docker exec -it test_clerck_php bash</li>
<li>composer i</li>
<li>php init</li>
<li>php yii migrate</li>
</ul>


<h1>Первое задание</h1>
<p>Выполнить в корне проекта:</p>
<p>cd docker</p>
<p>docker exec -it test_clerck_php sh</p>
<p>Или находясь в контейнере выполнить:</p>
<p>sh</p>
<p>Затем наслаждайтесь игрой :)</p>
<p>php yii game "!!???!????" "??!!?!!!!!!!"</p>
<p>Аргументы передавать нужно в кавычках, иначе оболочка некорректно их обрабатывает</p>

<h1>Второе задание</h1>
API реализовано в контроллерах:
frontend/controllers/PeoplesController.php
frontend/controllers/PhoneNumbersController.php

Обращение по API к ним:
http://localhost/peoples
http://localhost/phone-numbers

Можно выполнять crud методы:
GET http://localhost/peoples - Список всех людей с их номерами телефона
GET http://localhost/peoples/1 - Получение человека с id = 1 с его номерами телефона
POST http://localhost/peoples - Создание человека
PATCH/PUT http://localhost/peoples/1 - Обновление человека с id = 1 с его номерами телефона
DELETE http://localhost/peoples/1 - Обновление человека с id = 1 с его номерами телефона

То же самое и с http://localhost/phone-numbers