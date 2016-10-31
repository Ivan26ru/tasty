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
});

});