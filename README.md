# SimpleMVC 

Простой учебный MVC-фреймворк (который при этом похож на настоящие ;)

* Подробности можно узнать  [в уроках по SimpleMVC](http://fkn.ktu10.com/?q=node/9429).
* Документация по работе с ядром в данный момент находится 
    в репозитории базового демонстрационного приложения: https://github.com/it-for-free/SimpleMVC-example . 


## Ткстирование

Юнит-тесты:
```
cept tun unit
```
## Полезные компоненты

Некоторые компоненты SimpleMVC были сделаны отдельными пакетами, для удобства использования в боевых проектах:

* `it-for-free/php-simple-assets` (менеджер JS и CSS): https://github.com/it-for-free/php-simple-assets

## История изменений 

* [Список основных изменений](CHANGELOG.md).

## Работа с форком
Если вы добавили исходный репозиторий под псевдонимом iff, то синхронизировать изменения можно командой: 

```shell 
git fetch iff && git merge iff/master && git push
```

## TODO

* Переделать ключи elements и objects в кэше контейнера на энам (ENUM перечислимый тип).
