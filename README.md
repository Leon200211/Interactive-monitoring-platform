## <p align="center"> ЗАДАЧА №9 ИНТЕРАКТИВНАЯ ПЛАТФОРМА ДЛЯ МОНИТОРИНГА ВНУТРЕННЕЙ ОТДЕЛКИ КВАРТИРЫ  </p>
<p align="center">
<img width="743" alt="photo" src="https://github.com/VoLuIcHiK/Leaders-of-Transformation-09-NEUROPHILES/assets/90902903/25364f68-ae39-4eb4-aef5-40316ef9cd76">
</p>


*Состав команды "НЕЙРОФИЛЫ"*   
*Чиженко Леон (https://github.com/Leon200211) - Frontend-разработчик*    
*Сергей Куликов (https://github.com/MrMarvel) - Mobile/Backend-разработчик*  
*Карпов Даниил (https://github.com/Free4ky) - ML-engineer*  
*Валуева Анастасия (https://github.com/VoLuIcHiK) - Data Engineer/Designer*   
*Козлов Михаил (https://github.com/Borntowarn) - ML-engineer*  

## Оглавление
1. [Задание](#1)
2. [Решение](#2)
3. [Результат разработки](#3)
4. [Пример работы](#4)
5. [Уникальность нашего решения](#5)
6. [Стек](#6)
7. [Запуск](#7)
8. [Интерфейс приложения](#8)
9. [Ссылка на сайт](#9)

## <a name="1"> Задание </a>

Разработать сервис, позволяющий мониторить процессы внутренней отделки строящихся зданий, который включает:
- разработку ПО, которое позволит собирать данные для автоматизации определения квартир / этажа;
- продуктивное решение для анализа степени готовности квартиры, наличие строительного мусора и т.д. на основе анализа видеопотока;
- сравнение полученных значений с плановыми показателями выполнения работ, расчёт отклонений от плана.

## <a name="2">Решение </a>

Для определения местоположения и анализа готовности помещения мы решили придумали алгоритм, представленный на фото ниже.
<p align="center">
<img width="600" alt="image" src="https://github.com/VoLuIcHiK/Leaders-of-Transformation-09-NEUROPHILES/assets/90902903/14fc8477-ff86-43be-baa2-db81a9e695c0">
</p>

Ниже представленна физическая модель нашей базы данных: 
<p align="center">
<img width="600" height="400" alt="image" src="https://github.com/VoLuIcHiK/Leaders-of-Transformation-09-NEUROPHILES/assets/90902903/a3126953-5b2f-4197-a05e-8ca5e54a647c">
</p>

## <a name="3">Результат разработки </a>

В ходе решения поставленной задачи нам удалось разработать мобильное приложение, которое имеет следующий функционал:
1. Запись видео обхода помещения;
2. Анализ записанного видео;
3. Расчет степени готовности внутренней отделки в каждой комнате, квартире, а также на этаже;
4. Просмотр информации по проведенным ранее обходам во всех ЖК;
5. Возможность редактирования информации вручную, полученную от датчиков (при определении ЖК, дома, секции, этажа) или в ходе анализа видео;
6. Автоматическо заполнение "шахматок" и возможность их скачивания;
7. Редактирование информации в профиле;
8. Просмотр ответов на часто задаваемые вопросы в разделе "Помощь".

Помимо мобильного приложения мы реализовали сайт, на котором удобно просматривать и демонстрировать степень готовности внутренней отделки.

Созданное нами решение поможет автоматизировать процесс мониторинга внутренней отделки квартир и МОП.

### <a name="4">Пример работы</a>




## <a name="5">Уникальность нашего решения </a>

- Обработка видео и получение результата происходит по кадрам на самом устройстве прямо во время съёмки (в real-time);
- Рассчет процента готовности для каждой комнаты/квартиры и вывод результата на экран прямо во время съемки;
- Достигнута высокая точность опредления местоположения внутри здания за счет автоматического определения ЖК, дома, секции, этажа, квартиры с помощью GPS и барометра, ручного выбора комнаты и возможности правки всех этих значений вручную прямо во время съёмки видео;
- Высокое качество работы модели детекции объектов/отделки (YOLOv8);

## <a name="6">Стек </a>
<div>
  <img src="https://github.com/devicons/devicon/blob/master/icons/mysql/mysql-original-wordmark.svg" title="MySQL"  alt="MySQL" width="40" height="40"/>&nbsp;
  <img src="https://github.com/devicons/devicon/blob/master/icons/python/python-original-wordmark.svg" title="Python" alt="Puthon" width="40" height="40"/>&nbsp;
  <img src="https://github.com/devicons/devicon/blob/master/icons/androidstudio/androidstudio-plain.svg" title="android-studio" alt="android-studio" width="40" height="40"/>&nbsp;
  <img src="https://github.com/devicons/devicon/blob/master/icons/java/java-original-wordmark.svg" title="Java" alt="Java" width="40" height="40"/>&nbsp;
  <img src="https://github.com/devicons/devicon/blob/master/icons/cplusplus/cplusplus-line.svg" title="Cplusplus" alt="Cplusplus" width="40" height="40"/>&nbsp;
  <img src="https://github.com/devicons/devicon/blob/master/icons/php/php-original.svg" title="php" alt="php" width="40" height="40"/>&nbsp;
  <img src="https://github.com/devicons/devicon/blob/master/icons/kotlin/kotlin-original-wordmark.svg" title="kotlin" alt="kotlin" width="40" height="40"/>&nbsp;

  

## <a name="7">Запуск </a>
Для запуска мобильного приложения необходимо:
1. Скачать с нашего репозитория APK;
2. Дождаться успешной установки приложения;
3. Открыть приложение, нажав на появившуюся иконку.

## <a name="8">Интерфейс приложения </a>
https://github.com/VoLuIcHiK/Leaders-of-Transformation-09-NEUROPHILES/assets/90902903/025c9275-20a8-43fd-a9a9-aed2c60d2b92

## <a name="9">Ссылка на сайт </a>
- [Ссылка на наш сайт "СтройКонтроль"](http://u1988986.isp.regruhosting.ru/login)
