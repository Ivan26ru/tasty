// custom scripts
// alert('hello world!');
$(document).ready(function() {
    // alert(jQuery.fn.jquery);

    // при клике на ссылку плавно поднимаемся вверх
    $("#back-top").click(function() {
        $("body,html").animate({
            scrollTop: 0
        }, 800);
        return false;
    }); // .при клике на ссылку плавно поднимаемся вверх

    //отображение входа
    $('#a-form-vhod').click(function(e) {
        e.preventDefault();
        $('#div-form-vhod').removeClass('dn');
    });
    // .отображение входа

    // скрытие формы входа
    $('#div-form-vhod').click(function() {
        //$('#div-form-vhod').addClass('dn');
    });
    // .скрытие формы входа


    // табы
    //отмена перехода по ссылке
    $('.tab-ul li a').click(function(e) {
            e.preventDefault();
        })
        // переключение табов
    $('#tab-1').click(function(e) {
        $('.tab-ul li').removeClass('active');
        $(this).parent().addClass('active');
        $('#tab-1').addClass('active');
        $('.panel').addClass('dn');
        $('#tab-div-1').removeClass('dn');
    })

    $('#tab-2').click(function(e) {
            $('.tab-ul li').removeClass('active');
            $(this).parent().addClass('active');
            $('.panel').addClass('dn');
            $('#tab-div-2').removeClass('dn');
        })
        // конец табов





    //---------------добавление рецепта
    var e_number = 1;
    $('#add-element').click(function(e) { //нажатие на кнопку отправить
        e.preventDefault();//убрать стандартное поведение ссылки

        ++e_number;//счетчик элементов

        e_name = $('#e_name').val(); //имя элемента
        e_value = $('#e_value').val(); //количество элемента

        // alert(e_name + e_value); //проверка вывода значений
        $('.elements-input').removeClass('this_element');


        $('#element-id').clone() // сделаем копию элемента
        	.removeClass("dn") // добавим этой копии класс newElement
        	.addClass('this_element') //добавим класс, для добавления данных
        	.appendTo("#div-elements"); // вставим измененный элемент в конец элемента container

        $('.this_element .name-element').text(e_name);//присвоим новой строке имя элемента
        $('.this_element .input-ml').val(e_value);//присвоим новой строке значение
        // .function(){
        //   	$(this, '.name-element').text('test');
        //   }
        //.text("И снова здравствуйте!")  // изменим текст внутри нее

        // $('#e_name').attr('placeholder','name'); //имя элемента
        // $('#e_value').attr('placeholder','kol-vo'); //количество элемента

$("#e_name").val('').attr('placeholder','Ингридиент ' + e_number);
// $("#e_value").placeholder="newAttr";
        // e_n=e_n+1;
        // alert(e_n);

    }); //.нажатие на кнопку отправить
    //---------------- .добавление рецепта




}); //конец ready