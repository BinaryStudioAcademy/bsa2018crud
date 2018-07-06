# Binary Studio Academy 2018

## Laravel CRUD

### Цель

Ознакомиться с основами фреймворка Laravel: Routes, Middleware, Models, Controllers.
Научиться писать простое CRUD приложение с помощью фреймворка.

### Установка

<b>Репозиторий форкать нельзя!</b>.

```
git clone <link to repositry>
cd <repository_name>
composer install
cp .env.example .env
cp .env.example .env.dusk.local
php artisan key:generate
git checkout -b develop
```

После клонирования репозитория создайте ветку `develop` и всю разработку ведите в этой ветви.
Также рекомендуется использовать Homestead для поднятия приложения.

Для работы dusk в среде Homestead дополнительно может потребоваться выполнение следующих действий:

1. Зайдите на виртуальную машину через ssh из папки, где установлен Homestead
```
vagrant ssh
```
2. Выполните следующие команды
```
wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | sudo apt-key add -

sudo sh -c 'echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list'

sudo apt-get update && sudo apt-get install -y google-chrome-stable

sudo apt-get install -y xvfb
```

3. Затем выполните: 
```
Xvfb :0 -screen 0 1280x960x24 &
```

4. Теперь можно запускать тесты:
```
php artisan dusk
```

- см. https://github.com/laravel/dusk/issues/50#issuecomment-275155974

### О задании

Представьте себе что Вам необходимо написать Backend часть сервиса для работы с электронными валютами. Вам необходимо написать CRUD (Create, read, update and delete) логику для управления записями с данными о валютах.

Вам уже предоставлена структура таблицы БД для хранения информации. Для развертывания таблицы необходимо предварительно запустить миграцию с заполненем ее начальными данными. Для этого необходимо в коносли выполнить команду Artisan:

```
php artisan migrate:fresh --seed
```
После успешного выполнения команды в БД должна появиться таблица ecurrency.
Эта таблица заполнена тестовыми данными выдуманных e-валют.

### Задание #1

Реализовать API сервис получения списка всех АКТИВНЫХ (active=1) в системе е-валют

* Route: /api/currencies
* Тип HTTP запроса: только GET. При попытке обратиться к api-endpoint с другим типом запроса должен возрващаться Error Response с кодом 405; 
* Формат возвращаемых данных: JSON;
* Поля данных которые необходимо вернуть для каждой из валют: 'id', 'name', 'short_name', 'actual_course', 'actual_course_date'.


### Задание #2

Реализовать API сервис получения детальной информации о конкретной е-валюте

* Route: /api/currencies/{id}
* Тип HTTP запроса: только GET. При попытке обратиться к api-endpoint с другим типом запроса должен возрващаться Error Response с кодом 405;
* Формат возвращаемых данных: JSON;
* Поля данных, которые необходимо вернуть: 'id', name', 'short_name', 'actual_course', 'actual_course_date';
* В случае запроса информации о валюте, id которой отсутствует в таблице БД, необходимо вернуть Error HTTP Response с кодом 404.

### Задание #3

Реализовать REST API CRUD сервис администратора для управления базой е-валют с помощью Resource Controller

* Route prefix: /api/admin/currencies
* Действия, которые может совершать администратор: получение списка всех е-валют (включая неактивные), просмотр информации о определенной е-валюте, добавление, изменение информации, удаление;
* Формат входных и возвращаемых данных: JSON;
* Поля данных, которые необходимо вернуть в списке валют: 'id', name', 'short_name', 'actual_course', 'actual_course_date', 'active';
* Поля данных, которые необходимо вернуть для вывода информации определенной е-валюты: 'id', name', 'short_name', 'actual_course', 'actual_course_date', 'active'.

Проверить себя можно с помощью подготовленых тестов выполнив в консоли команду в корне проекта:

```
vendor/bin/phpunit
```
