// custom scripts
// alert('hello world!');
$(document).ready(function(){
// alert(jQuery.fn.jquery);

// при клике на ссылку плавно поднимаемся вверх
$("#back-top").click(function (){
	$("body,html").animate({
		scrollTop:0
	}, 800);
	return false;
});// .при клике на ссылку плавно поднимаемся вверх

//отображение входа
$('#a-form-vhod').click(function(e){
	e.preventDefault();
	$('#div-form-vhod').removeClass('dn');
});
// .отображение входа

// скрытие формы входа
$('#div-form-vhod').click(function(){
	//$('#div-form-vhod').addClass('dn');
});
// .скрытие формы входа
	

	// табы
		//отмена перехода по ссылке
	$('.tab-ul li a').click(function(e){
		e.preventDefault();
	})
// переключение табов
	$('#tab-1').click(function(e){
		$('.tab-ul li').removeClass('active');
		$(this).parent().addClass('active');
		$('#tab-1').addClass('active');
		$('.panel').addClass('dn');
		$('#tab-div-1').removeClass('dn');
	})

	$('#tab-2').click(function(e){
		$('.tab-ul li').removeClass('active');
		$(this).parent().addClass('active');
		$('.panel').addClass('dn');
		$('#tab-div-2').removeClass('dn');
	})


});