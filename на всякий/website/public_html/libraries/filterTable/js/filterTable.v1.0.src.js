/**
 * Created by Komarov Artem on 11.08.14.
 */

/**
 * Привязать фильтры к таблице.
 * @param HTMLTableSectionElement HTMLTBodyRef - ссылка на элемент &lt;tbody&gt; таблицы
 * @param Object filters - объект-конфигурация фильтров: { N : FILTER[, N : FILTER] }
 *
 *  Где:
 *      NUM - это натуральное число - номер столбца таблицы, обслуживаемого
 *          фильтром. Этот номер может принимать значения от 0 до кол-во
 *          столбцов таблицы - 1. Номера можно задавать не по порядку.
 *
 *      FILTER - это ссылка на HTML-элемент представляющий собой элемент
 *          HTML-формы и имеющий атрибут value (select в том числе), либо
 *          объект типа tableKit.Filter
 */
var filterTable = function (HTMLTBodyRef, aFilters) {
    var rows = HTMLTBodyRef.getElementsByTagName("TR"),
        filters = {}, n,
        walkThrough = function (rows) {
            var tr, i, f;
            for (i = 0; i < rows.length; i += 1) {
                tr = rows.item(i);
                for(f in filters) {
                    if (filters.hasOwnProperty(f)) {
                        if (false === filters[f].validate(tr.children[f].innerText) ) {
                            tr.style.display = "none"; break;
                        } else {
                            tr.style.display = "";
                        }
                    }
                }
            }
        };
    for(n in aFilters) {
        if (aFilters.hasOwnProperty(n)) {
            if (aFilters[n] instanceof filterTable.Filter) {
                filters[n] = aFilters[n];
            } else {
                filters[n] = new filterTable.Filter(aFilters[n]);
            }
            filters[n]._setAction("onchange", function () {walkThrough(rows);});
        }
    }
}

/**
 * Объект фильтр.
 * @param HTMLInputElement | HTMLSelect HTMLElementRef | [] - Ссылка или массив ссылок
 *                 на html-элементы, служащие фильтрами.
 * @param Function callback - ф-ция обратного вызова. Вызывается когда скрипт
 * производит валидацию содержимого ячейки. Ф-ция вызывается для каждой строки таблицы, для
 * каждой ячейки столбца, для которого назначен фильтр.
 * Функции будут переданы 3 параметра: callback(value, filters, i) где:
 *      String value - значение ячейки таблицы, проверяемой на момент вызова ф-ции
 *      HTMLElements[] filters - массив HTML-элементов назначенных фильтрами для проверяемого столбца.
 *      Number i - индекс элемента фильтра в массиве filters который является
 *                 валидатором для текущего вызова. Т.е. filters[i] внутри ф-ции
 *                 обратного вызова будет содержать элемент, с которым провзаимодействовал
 *                 пользователь, в результате чего был запущен процесс валидации.
 * @param String eventName - название события привязанного к фильтру, по которому будет
 *      запускаться валидация (onkeyup | onclick | onblur | onchange и т.п.)
 * @constructor
 */
filterTable.Filter = function (HTMLElementRef, callback, eventName) {
    /* Если ф-цию вызвали не как конструктор фиксим этот момент: */
    if (!(this instanceof arguments.callee)) {
        return new arguments.callee(HTMLElementRef, callback, eventName);
    }

    /* Выравниваем пришедший аргумент к массиву */
    this.filters = {}.toString.call(HTMLElementRef) == "[object Array]" ? HTMLElementRef : [HTMLElementRef];

    /**
     * Шаблонный метод вызывается для каждой строки таблицы, для соответствующей
     * ячейки. Номер ячейки задается в объекте-конфигурации фильтров ф-ции
     * filterTable (См. параметр 2 ф-ции tableFilter )
     * @param String cellValue - строковое значение ячейки
     * @returns {boolean}
     */
    this.validate = function (cellValue) {
        for (var i = 0; i < this.filters.length; i += 1) {
            if ( false === this.__validate(cellValue, this.filters[i], i) ) {
                return false;
            }
        }
    }

    this.__validate = function (cellValue, filter, i) {
        /* Если фильтр был создан явно и явно указана функция валидации: */
        if (typeof callback !== "undefined") {
            return callback(cellValue, this.filters, i);
        }
        /* Если в фильтр напихали пробелов или другой непечатной фигни - удаляем: */
        filter.value = filter.value.replace(/^\s+$/g, "");
        /* "Фильтр содержит значение и оно совпало со значением ячейки" */
        return !filter.value || filter.value == cellValue;
    }

    this._setAction = function (anEventName, callback) {
        for (var i = 0; i < this.filters.length; i += 1) {
            this.filters[i][eventName||anEventName] = callback;
        }
    }
};