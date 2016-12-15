// custom scripts
// alert('hello world!');
jQuery(document).ready(function($) {

    // alert(jQuery.fn.jquery);

    // при клике на ссылку плавно поднимаемся вверх
    $("#back-top").click(function() { //нажатие на стрелку вверх
        $("body,html").animate({
            scrollTop: 0
        }, 800);
        return false;
    }); // .при клике на ссылку плавно поднимаемся вверх

    // ФОРМА ПРОВЕРКИ СОВЕРШЕННОЛЕТИЯ

    // условие отвечал раньше или нет
    if (!localStorage.getItem('year-18')) {

        // появления окна вопроса о возрасте
        $('#window-18, #tabs-dark').fadeIn(300);


        // нажатие на кнопку да
        $('#w-18-yes').click(function(event) { //действие при клике
            event.preventDefault(); //отмена обычного поведения
            $('#window-18, #tabs-dark').slideUp(500); //эфект скрытия
            localStorage.setItem('year-18', true);
        });


        // нажатие на кнопку нет
        $('#w-18-no').click(function(event) { //действие при клике
            event.preventDefault(); //отмена обычного поведения
            window.location.href = "http://mail.ru/";
        });
    };


    //---------------добавление элемента

    var e_number = 1; //счетчик
    n_click = 0; //количество кликов от нуля счет
    e_arr = []; //массив данных

    // переменные добавляемых элементов
    e_name = []; //имя элемента
    e_value = []; //количество
    e_pg = []; //%PG
    e_vg = []; //%VG
    e_uv = []; //%удельные вес

    e_full = []; //полные данные элемента

    $('#add-element').click(function(e) { //нажатие на кнопку отправить
        e.preventDefault(); //убрать стандартное поведение ссылки

        ++e_number; //счетчик элементов

        e_number_2 = e_number - 1;

        e_name[n_click] = $('#e_name').val(); //имя элемента в массив
        e_value[n_click] = parseFloat($('#e_value').val()); //количество элемента в массив, преобразуем в число

        e_pg[n_click] = 1; //%PG
        e_vg[n_click] = 1; //%VG
        e_uv[n_click] = 1; //%удельные вес

        // инфа добавляемого элемента
        e_full[n_click] = [ //в одном массиве все данные об элементе
            e_name[n_click], //имя элемента
            e_value[n_click], //значение элемента
            e_pg[n_click],
            e_vg[n_click],
            e_uv[n_click]
        ];

        $('.elements-input').removeClass('this_element'); //убираем класс по которому выбираем только что добавленный элемнет

        $('#element-id').clone(true) // сделаем копию элемента
            .removeClass('dn') // убираем класс этой копии newElement
            .addClass('this_element') //добавим класс, для добавления данных
            .appendTo("#div-elements"); // вставим измененный элемент в конец элемента container

        $('.this_element #e_i_name').val(e_name[n_click]) //добавляем содержимое элемента
            .attr('name', 'name_element_' + n_click); //присвоим новой строке имя элемента
        $('.this_element .name-element').text(e_name[n_click]); //добавляем содержимое элемента

        $('.this_element .input-ml').val(e_value[n_click]) //добавляем содержимое элемента
            .attr('name', 'value_element_' + n_click); //присвоим новой строке значение

        $("#e_name").val('').attr('placeholder', 'Ингридиент ' + e_number); //выводит номер игртидиента и сбрасывает состояние
        $("#e_value").val('0'); //сбрасывает состояние
        // --------------------

        //добавление строк в таблицу
        $('#td-etalon').clone() //клонировать элемент
            .removeAttr('id') //убираем id
            .removeClass('dn') //элемент видимый
            .attr('id', 'tr' + n_click) //присваиваем порядковый id
            .insertBefore('#total'); // добавление перед total


        // расчет 2 ячейки
        cell_2_dlinnoe = atm / 100 * e_value[n_click]; //значение 2 ячейки с десячитными знаками
        cell_2 = cell_2_dlinnoe.toFixed(2); //округление до двух знаков после запятой ячейка 2

        // удельный вес
        udVes = 1;

        //расчет 3 ячейки
        cell_3_dlinnoe = cell_2 * udVes; //счет
        cell_3 = cell_3_dlinnoe.toFixed(2); //установка 2 чисел после запятой

        // вставка данных элемента в таблицу
        $('#tr' + n_click).children('.cell-1').text(e_name[n_click]); //присвоить имя ячейке
        $('#tr' + n_click).children('.cell-2').text(cell_2); //присвоить значение ячейке
        $('#tr' + n_click).children('.cell-3').text(cell_3); //присвоить значение ячейке
        $('#tr' + n_click).children('.cell-4').text(e_value[n_click]); //присвоить значение ячейке

        n_click = n_click + 1; //счетчик нажатий от  начало 0
        e_summ_f();
        return (e_name, e_full, e_summ);
    }); //.нажатие на кнопку отправить

    //---------------- .добавление элемента



    // --------------------- пропорции рецептов

    // сумма двух строк равняется 100
    function summ100(input1, input2) {
        // первая от второй
        $(input1).change(function() { //отслеживания изменений
            dpg = $(input1).val(); //текущее значение поля
            if (dpg > 100) { //если больше 100
                alert('Значение не может быть больше 100%'); //сообщение об ошибке
                $(input1).val(100); //присваивание предыдущего - валидного значения (текущему полю)
                $(input2).val(0); //присваивание предыдущего - валидного значения (зависещему полю)
            } else if (dpg >= 0) { //если больше нуля
                $(input2).val(100 - dpg); //присваиваем значение зависещему полю
            } else {
                alert('Значение не может быт меньше 0'); //сообщение об ошибке
                $(input1).val(0); //присваивание предыдущего - валидного значения (текущему полю)
                $(input2).val(100); //присваивание предыдущего - валидного значения (зависещему полю)
            } //конец условия
        }); //конец отслеживания изменений

        // вторая от первой
        $(input2).change(function() { //отслеживания изменений
            dpg = $(input2).val(); //текущее значение поля
            if (dpg > 100) { //если больше 100
                alert('Значение не может быть больше 100%'); //сообщение об ошибке
                $(input1).val(0); //присваивание предыдущего - валидного значения (текущему полю)
                $(input2).val(100); //присваивание предыдущего - валидного значения (зависещему полю)

            } else if (dpg >= 0) { //если больше нуля
                $(input1).val(100 - dpg); //присваиваем значение зависещему полю

            } else {
                alert('Значение не может быт меньше 0'); //сообщение об ошибке
                $(input1).val(100); //присваивание предыдущего - валидного значения (текущему полю)
                $(input2).val(0); //присваивание предыдущего - валидного значения (зависещему полю)
            } //конец условия
        }); //конец отслеживания изменений
    } //конец функции
    // отслеживание изменений

    summ100('#dpg', '#dvg'); //в сумме 100
    summ100('#pgc', '#vgc'); //в сумме 100


    // -----------НОВАЯ----------
    // Удельный вес общий
    mass_nj = 1.038;
    mass_pg = 1.038;
    mass_vg = 1.038;

    // отслеживние всех элементов
    $('.input-ml').change(function() {

        // обычные данные преобразованные в число
        atm = parseFloat($('#atm').val());
        ds = parseFloat($('#ds').val());
        dpg = parseFloat($('#dpg').val());
        dvg = parseFloat($('#dvg').val());
        ns = parseFloat($('#ns').val());
        pgc = parseFloat($('#pgc').val());
        vgc = parseFloat($('#vgc').val());


        // console.log(vgc);



        // корректность ввода


        e_summ_f();


        // console.log(e_full);//добавляемые элементы


        // ФОРМИРОВАНИЕ ТАБЛИЦЫ
        // console.log('Значение поменялось ');

        // строка totals
        $('#total-2').text(atm); //присваиваем значение 2 ячейке тотал


        // .ФОРМИРОВАНИЕ ТАБЛИЦЫ

    }); //конец проверки изменений в input


    // перебор массива значений элемента
    function e_summ_f() {
        var e_summ = 0;
        if (e_full.length > 0) { //если массив существует
            var indexN; //счетчик массива
            for (indexN = 0; indexN < e_full.length; ++indexN) { //перевоб массива
                this_input_name = 'value_element_' + indexN; //имя input элемента
                this_input = $('input[name=' + this_input_name + ']').val(); //значение элемента

                // смена значения с ограничением от 0 до 100
                if (this_input < 0) { //если меньше нуля
                    e_full[indexN][1] = 0; //присвоить 0
                } else if (this_input > 100) { //если больше 100
                    e_full[indexN][1] = 100; //присвоить 100
                } else { //если больше 0 и меньше 100
                    e_full[indexN][1] = parseFloat(this_input); //обновить массив значений элементов
                } // .смена значения с ограничением от 0 до 100

                e_summ = e_summ + parseFloat(e_full[indexN][1]);
                console.log(e_summ);
                return (e_summ);

            } //конец перебора
        } //конец проверки на существование массива
    } //конец функции суммирования элементов

    // ограничение в 100%
    $('.max-val').change(function() { //отслеживания изменений
        maxValue = $(this).val(); //текущее значение поля
        if (maxValue > 100) { //если больше 100
            alert('Значение не может быть больше 100%'); //сообщение об ошибке
            $(this).val(100);
        }; //конец условия
    }); //конец отслеживания

    // ограничение выше 0
    $('.input-ml').change(function() { //отслеживания изменений
        minValue = $(this).val(); //текущее значение поля
        if (minValue < 0) { //если меньше 0
            alert('Значение не может быт меньше 0'); //сообщение об ошибке
            $(this).val('0'); //присваиваем значение 0
        }; //конец условия
    }); //конец отслеживания изменений

    // --------------------- .пропррции рецептов
    // ---------------------- информация о рецепты на странице добавления


    // ячейка 1-3
    // c1_3_start = $('#ds').val();
    // $('#c1-3').text(c1_3_start);

    // $('#ds').change(function() {
    //     c1_3 = $(this).val();
    //     $('#c1-3').text(c1_3);
    //     return c1_3;
    // });
    // // .ячейка 1-3

    // total



    // $('#atm').change(function() { //отслеживаем изменение atm
    //     total_2 = $(this).val(); //новые значения
    //     $('#total-2').text(total_2); //присваиваем новые значения 2 ячейке тотал
    //     return total_2; //возвратим тотал
    // });
    // .total

    // ---------------------- .информация о рецепты на странице добавления


    // добавление элемента в таблицу
    $('#add-element').click(function(e) { //нажатие на кнопку отправить
        e.preventDefault(); //убрать стандартное поведение ссылки

    }); // .нажатие на кнопку отправить

    // .добавление элемента в таблицу



}); //конец ready
