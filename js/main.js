// custom scripts
// alert('hello world!');
jQuery(document).ready(function( $ ) {

    // alert(jQuery.fn.jquery);

    // при клике на ссылку плавно поднимаемся вверх
    $("#back-top").click(function() {//нажатие на стрелку вверх
        $("body,html").animate({
            scrollTop: 0
        }, 800);
        return false;
    }); // .при клике на ссылку плавно поднимаемся вверх

    //отображение входа
	    // $('#a-form-vhod').click(function(e) {//клин на кнопку войти
	    //     e.preventDefault();//отмена обычного поведения
	    //     $('#div-form-vhod').slideDown('1000');//отобразить форму входа
	    //     $('.tabs-dark').fadeIn('1000');//отобразить маску затемнения
	    // });
    // .отображение входа

    // скрытие формы входа
    $('.tabs-dark').click(function() {//клик по маске
        $(this).fadeOut('1000');//скрыть маску
        $('#div-form-vhod').slideUp('1000');//скрыть форму входа
    });//.клик по маске
    // .скрытие формы входа


    // табы
    //отмена перехода по ссылке
    $('.tab-ul li a').click(function(e) {//клик по кнопке таба
            e.preventDefault();//отмена обычного поведения
        });//.клик по кнопке таба
        // переключение табов
    $('#tab-1').click(function(e) {//клик по кнопке таба вход
        $('.tab-ul li').removeClass('active');//убрать класс все кнопкам таба
        $(this).parent().addClass('active');//добавить класс текущему элементу
        $('#tab-1').addClass('active');//добавить класс
        $('.panel').addClass('dn');//скрыть все содержимое табов
        $('#tab-div-1').removeClass('dn');//показать нужное содержимое
    })

    $('#tab-2').click(function(e) {//клик по кнопке таба вход
            $('.tab-ul li').removeClass('active');//Убрать у всех кнопок класс
            $(this).parent().addClass('active');//добавить текущей кнопке активный класс
            $('.panel').addClass('dn');//скрыть все содержимое табов
            $('#tab-div-2').removeClass('dn');//показать нужное содержимое
        })//клик по кнопке таба вход
        // конец табов

// разрешен ввод только цифр

    $(".input-ml").keydown(function(event) {//отслеживание нажатие на строку ввода
        // Разрешаем нажатие клавиш backspace, Del, Tab и Esc
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
             // Разрешаем выделение: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
             // Разрешаем клавиши навигации: Home, End, Left, Right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 return;
        }
        else {
            // Запрещаем всё, кроме клавиш цифр на основной клавиатуре, а также Num-клавиатуре
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault();//отмена обычного поведения
            }
        }
    });

// .разрешен ввод только цифр



    //---------------добавление рецепта

    var e_number = 1;//счетчик
    	e_arr=[];//массив данных
    	e_name='';//имя элемента
		e_value='0';//количество

    $('#add-element').click(function(e) { //нажатие на кнопку отправить
        e.preventDefault();//убрать стандартное поведение ссылки

        ++e_number;//счетчик элементов

        e_number_2=e_number-1;

        e_name = $('#e_name').val(); //имя элемента
        e_value = $('#e_value').val(); //количество элемента

        $('.elements-input').removeClass('this_element');//убираем класс по которому выбираем только что добавленный элемнет

        $('#element-id').clone() // сделаем копию элемента
            .removeClass("dn") // добавим этой копии класс newElement
            .addClass('this_element') //добавим класс, для добавления данных
            .appendTo("#div-elements"); // вставим измененный элемент в конец элемента container

        $('.this_element #e_i_name').val(e_name)//добавляем содержимое элемента
        .attr('name','name_element_' + e_number_2);//присвоим новой строке имя элемента
        $('.this_element .name-element').text(e_name);//добавляем содержимое элемента

        $('.this_element .input-ml').val(e_value)//добавляем содержимое элемента
        .attr('name','value_element_' + e_number_2);//присвоим новой строке значение

		$("#e_name").val('').attr('placeholder','Ингридиент ' + e_number);//выводит номер игртидиента и сбрасывает состояние
		$("#e_value").val('');//сбрасывает состояние

    }); //.нажатие на кнопку отправить

    //---------------- .добавление рецепта




}); //конец ready