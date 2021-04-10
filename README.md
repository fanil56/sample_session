# sample_session
Тестовое задание по тестированию экстрасенсов.
Сделано наиболее просто. Суть такова, что все экстрасенсы делают предположение, после того как вы введете свое число попытка экстрасенсов будет засчитана, будет расчитана их достоверность. Данные о попытках угадать ивведенных значениях пользователем, а также достоверность попыток хранятся в рамках сессии в течение 24 минут простоя или пока браузер не будет закрыт.
Требования к приложению
1. Веб-приложение моделирует тестирование экстрасенсов.
2. Пользователю выводится сообщение с предложением загадать двухзначное число.
3. Пользователь подтверждает факт того, что он загадал число, нажатием кнопки. После этого
запрашиваются «догадки» экстрасенсов с сервера.
4. Пользователю выводятся догадки нескольких экстрасенсов, не менее двух. Логика
формирования догадки экстрасенса произвольная.
5. Пользователь вводит загаданное число и отправляет его на сервер.
6. Сервер подсчитывает уровень достоверности каждого экстрасенса. Если задуманное
пользователем число совпало с догадкой конкретного экстрасенса, его уровень достоверности
увеличивается. В противном случае — уменьшается.
7. Пользователю предлагается заново загадать число, процесс повторяется бесконечно.
8. На странице должна отображаться следующая информация:
a. История догадок каждого экстрасенса.
b. История введённых пользователем чисел.
c. Текущее значение достоверности по каждому экстрасенсу.
Требования к реализации, технологиям и инструментам
1. На серверной стороне все данные хранить в сессии.
2. У каждого пользователя должна быть своя сессия.
3. Все пользователи работают анонимно.
4. Выполнить в соответствии с принципами объектно-ориентированного программирования.

