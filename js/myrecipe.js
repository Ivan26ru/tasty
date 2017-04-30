jQuery(document).ready(function($) {
    // ПЕРЕМЕННЫЕ
    var n_click = 0; //количество кликов от нуля счет
    e_arr = []; //массив данных

    // переменные добавляемых ЭЛЕМЕНТОВ
    e_name = []; //имя элемента
    e_value = []; //количество
    e_pg = []; //%PG
    e_vg = []; //%VG
    e_uv = []; //%удельные вес
    e_id = []; //id поста ингредиента

    e_full = []; //полные данные элемента

    recept = []; //данные рецепта

    send_all = []; //ПЕРЕДАВАЕМЫЕ ДАННЫЕ ВСЕГО РЕЦЕПТА

    //--------------- КЛИК НА ДОБАВИТЬ ЭЛЕМЕНТ
    $('#add-element').click(function(e) { //нажатие на кнопку отправить
        e.preventDefault(); //убрать стандартное поведение ссылки



        var str = $('#e_name').val(); //значение строки с элементом
        // console.log(str);

        if (availableTags.indexOf(str) !== -1) { //проверка на совпадение с массивом элементов
            // alert("Да, есть такой элемент с именем " + str);
            // console.log('есть такой')



            e_name[n_click] = $('#e_name').val(); //имя элемента в массив
            e_value[n_click] = parseFloat($('#e_value').val()); //количество элемента в массив, преобразуем в число

            // характеристики элемента
            e_pg[n_click] = parseFloat(availableList[str][0]); //%PG
            e_vg[n_click] = parseFloat(availableList[str][1]); //%VG
            e_uv[n_click] = parseFloat(availableList[str][2]); //%удельные вес
            e_id[n_click] = parseFloat(availableList[str][3]); //ID поста ингредиента


            // инфа добавляемого элемента,в одном массиве все данные об элементе
            e_full[n_click] = [ //Добавляю массивы данных в один массив
                e_name[n_click], //имя элемента//0
                e_value[n_click], //значение элемента//1
                e_pg[n_click], //2
                e_vg[n_click], //3
                e_uv[n_click], //4
                e_id[n_click] //5
            ];


            // e_id.push(availableList[str][3]);

            // ОФОРМЛЕНИЕ HTML
            $('.elements-input').removeClass('this_element'); //убираем класс по которому выбираем только что добавленный элемнет

            $('#element-id').clone(true) // сделаем копию элемента
                .removeClass('dn') // убираем класс этой копии newElement
                .addClass('this_element') //добавим класс, для добавления данных
                .appendTo("#div-elements"); // вставим измененный элемент в конец элемента container

            $('.this_element #e_i_name').val(e_name[n_click]) //добавляем содержимое элемента
                .attr('name', 'name_element_' + n_click); //присвоим новой строке имя элемента
            $('.this_element .name-element').text(e_name[n_click]); //добавляем содержимое элемента

            $('.this_element .input-ml').val(e_value[n_click]) //добавляем содержимое элемента
                .attr('name', 'value_element_' + n_click) //присвоим новой строке значение name
                .attr('id', 'value_element_' + n_click); //присвоим новой строке значение ID

            $("#e_name").val('').attr('placeholder', 'ингредиент ' + n_click); //выводит номер игртидиента и сбрасывает состояние
            $("#e_value").val('0'); //сбрасывает состояние
            // --------------------

            //добавление строк в таблицу
            $('#td-etalon').clone() //клонировать элемент
                .removeAttr('id') //убираем id
                .removeClass('dn') //элемент видимый
                .attr('id', 'tr' + n_click) //присваиваем порядковый id
                .insertBefore('#total'); // добавление перед total


            // $('#i_post_id').val(JSON.stringify(e_id));

            n_click = n_click + 1; //счетчик нажатий от  начало 0
            e_summ_f();//функция пересчета
            // console.log(e_full);

            send_json(e_full, recept);//функция сбора json для отправки

            return (e_name, e_full, n_click, e_id);//возвращаемые значения

        } else { //если элемента нету в списке элементов
            // console.log('нет такого')
            // "Пожалуйста выберите элемент из списка"
            alert("Увы, нет такого элемента с именем " + str);
        } //конец проверки на совпадение
    }); //.нажатие на кнопку отправить

    //---------------- .добавление элемента

    // калькулятор
    function e_summ_f() {
        // обычные данные преобразованные в число
        atm = parseFloat($('#atm').val());
        ds = parseFloat($('#ds').val());
        dpg = parseFloat($('#dpg').val());
        dvg = parseFloat($('#dvg').val());
        ns = parseFloat($('#ns').val());
        pgc = parseFloat($('#pgc').val());
        vgc = parseFloat($('#vgc').val());

        //Данные рецепта в массив данных ингредиента
        recept[0] = atm;
        recept[1] = ds;
        recept[2] = dpg;
        recept[3] = dvg;
        recept[4] = ns;
        recept[5] = pgc;
        recept[6] = vgc;

        // Удельный вес общий
        mass_nj = 1.036;
        mass_pg = 1.036;
        mass_vg = 1.261;

        // Удельный вес ингредиентов
        mass_e_pg = 100;
        mass_e_vg = 0;
        mass_e_nj = 1.04; //удельный вес


        var sum = 0; //переменная суммы ЭЛЕМЕНТОВ

        var sum_cell2 = 0,
            sum_cell3 = 0,
            sum_cell4 = 0;

        var cell2_4_data = 0,
            cell3_4_data = 0;



        //обновление значения ДОБАВЛЯЕМЫХ ЭЛЕМЕНТОВ
        for (var i = 0; e_full.length > i; i++) {

            e_full[i][1] = $('#value_element_' + i).val(); //обновляем значение элемента
            e_full[i][1] = parseInt(e_full[i][1]); //преобразуем в число

            sum = sum + parseInt(e_full[i][1]); //сумма значений ЭЛЕМЕНТОВ

            // значения строк ЭЛЕМЕНТОВ в таблице

            var cell1 = f2(e_full[i][0]),
                cell2 = f2(atm / 100 * e_full[i][1]),
                cell3 = f2(cell2 * mass_e_nj),
                cell4 = f2(e_full[i][1]);

// mass_e_pg = e_full[i][2];
// mass_e_vg = e_full[i][3];
// mass_e_nj = e_full[i][4];


            sum_cell2 = sum_cell2 + cell2;
            sum_cell3 = sum_cell3 + cell3;
            sum_cell4 = sum_cell4 + cell4;

            cell2_4_data = cell2_4_data + (e_full[i][1] / 100 * mass_e_pg);
            cell3_4_data = cell3_4_data + (e_full[i][1] / 100 * mass_e_vg);

            // добавление данных ЭЛЕМЕНТОВ в таблицу
            $('#tr' + i + ' .cell-1').html(cell1); //Имя в таблице(1 столб)
            $('#tr' + i + ' .cell-2').html(cell2); //Имя в таблице(1 столб)
            $('#tr' + i + ' .cell-3').html(cell3); //Имя в таблице(1 столб)
            $('#tr' + i + ' .cell-4').html(cell4); //значение в таблице(4 столб)
        };
        // console.log('сумма ЭЛЕМЕНТОВ: ' + sum);
        // переменные таблицы

        var
            // c1_2 = (atm - sum_cell2) / 100 * ds,
            c1_2 = atm/100*ds
            // c1_3 = ((atm - sum_cell2) / 100 * ds) * mass_nj,
            c1_3 = (atm/100*ds) * mass_nj,
            c1_4 = ds,

            // c2_2 = (atm - sum_cell2) / 100 * (dpg - ds - cell2_4_data),
            c2_2 = atm/100*(dpg - ds - cell2_4_data),
            // c2_3 = ((atm - sum_cell2) / 100 * (dpg - ds - cell2_4_data)) * mass_vg,
            c2_3 = (atm/100*(dpg - ds - cell2_4_data)) * mass_pg,
            c2_4 = dpg - ds - cell2_4_data,

            // c3_2 = (atm - sum_cell2) / 100 * (dvg - cell3_4_data),
            c3_2 = atm/100*(dvg - cell3_4_data),
            // c3_3 = ((atm - sum_cell2) / 100 * (dvg - cell3_4_data)) * mass_vg,
            c3_3 = (atm/100*(dvg - cell3_4_data)) * mass_vg,
            c3_4 = dvg - cell3_4_data,

            c4_2 = atm - sum_cell2,
            // c4_3 = (((atm - sum_cell2) / 100 * ds) * mass_nj) + (((atm - sum_cell2) / 100 * (dpg - ds - cell2_4_data)) * mass_vg) + (((atm - sum_cell2) / 100 * (dvg - cell3_4_data)) * mass_vg),
            c4_3 = ((atm/100*ds) * mass_nj)+((atm/100*(dpg - ds - cell2_4_data)) * mass_pg)+((atm/100*(dvg - cell3_4_data)) * mass_vg),
            c4_4 = (ds) + (dpg - ds - cell2_4_data) + (dvg - cell3_4_data),

            total_2 = atm,
            total_3 = sum_cell3 + ((atm/100*ds) * mass_nj)+((atm/100*(dpg - ds - cell2_4_data)) * mass_pg)+((atm/100*(dvg - cell3_4_data)) * mass_vg),
            // console.log(sum_cell3);
            total_4 = sum_cell4 + (ds) + (dpg - ds - cell2_4_data) + (dvg - cell3_4_data);

        // total_3 = sum_cell3 + parseFloat($('#c1-3').html()) + parseFloat($('#c2-3').html()) + parseFloat($('#c3-3').html()),
        // total_4 = sum_cell4 + parseFloat($('#c1-4').html()) + parseFloat($('#c2-4').html()) + parseFloat($('#c3-4').html());


        // добавление данных СТАТИКИ в таблицу
        //  строки
        // $('#c1-1').html(c1_1);
        $('#c1-2').html(f2(c1_2));
        $('#c1-3').html(f2(c1_3));
        $('#c1-4').html(f2(c1_4));

        // $('#c2-1').html(c2_1);
        $('#c2-2').html(f2(c2_2));
        $('#c2-3').html(f2(c2_3));
        $('#c2-4').html(f2(c2_4));

        // $('#c3-1').html(c3_1);
        $('#c3-2').html(f2(c3_2));
        $('#c3-3').html(f2(c3_3));
        $('#c3-4').html(f2(c3_4));

        // $('#c4-1').html(c4_1);
        $('#c4-2').html(f2(c4_2));
        $('#c4-3').html(f2(c4_3));
        $('#c4-4').html(f2(c4_4));

        // $('#total-1').html(total_1);
        $('#total-2').html(f2(total_2));
        $('#total-3').html(f2(total_3));
        $('#total-4').html(f2(total_4));

        // три строки внизу
        $('#small-s').text(ds);
        $('#small-pg').text(dpg);
        $('#small-vg').text(dvg);
        $('#small-f1').text(sum_cell2);
        $('#small-f2').text(sum_cell3);
        $('#small-f3').text(sum_cell4);

        // никотин
        $('#nic-1').text(ns);
        $('#nic-2').text(pgc);
        $('#nic-3').text(vgc);


        return (recept);

    } // .калькулятор

    // отправка в json всех данных
    function send_json(e_full, recept) {
        send_all[0] = e_full;
        send_all[1] = recept;

        $('#i_post_id').val(JSON.stringify(send_all));
    } //.отправка в json всех данных


    // --------------------- КОРРЕКТНОСТЬ ВВОДА

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

    // отслеживние всех ЭЛЕМЕНТОВ
    $('.input-ml').change(function() {
        e_summ_f();
        send_json(e_full, recept);
        console.log('Значение поменялось ');
    }); //конец проверки изменений в input


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

    // округление числа пример: 2.45 и 3
    function f2(n) {
        if (Math.ceil(n) - n > 0) {
            n = (+n.toFixed(2))
            return n;
        } else {
            return n;
        }
    };

}); //конец ready
