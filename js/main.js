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

    $('.get-menu').click(function (){
        $(this).next('.mobile-menu').slideToggle(200);
    });

    $('.get-device').click(function (){
        $(this).next('.mobile-device').slideToggle(200);

        return false;
    });

}); //конец ready