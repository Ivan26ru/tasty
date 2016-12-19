jQuery(document).ready(function($) {
$(function(){
  calcRec();
  $("#actbut").tooltip({
    position: { 
      show: {
        effect: "slideDown",
        delay: 250
      },
      my: "center top+10",
      at: "center bottom",
      using: function( position, feedback ) {
        $( this ).css( position );
        $( "<div>" )
          .addClass( "arrow" )
          .addClass( feedback.vertical )
          .addClass( feedback.horizontal )
          .appendTo( this );
      }
    },
  });
  $("#actbut").tooltip("open");
  setTimeout('$("#actbut").tooltip("close");$("#actbut").tooltip("disable");', 3000);
});

function handleRecipeDelete(recipeId)
{
  if ( confirm(sure_delete_recipe) )
  {
    $.post('/delete/recipe'
           ,{deleteRecipeId:recipeId}
           ,function(){
             window.location.href = mypage;
           });
  }
}
function handleCommentDelete(commentId)
{
  if ( confirm(sure_delete_comment) )
  {
    $.post('/comment/'+recid+'/'+commentId+'/delete'
           ,function(){
             window.location.reload(1);
           });
  }
  return false;
}
$(function(){
  $("#short,#share").focus(function () {
    $(this).select().one('mouseup', function (e) {
      $(this).unbind('keyup');
      e.preventDefault();
    }).one('keyup', function () {
      $(this).select().unbind('mouseup');
    });
  }).width($("#short").val().length*7);
  $("abbr,.ttip").tooltip({track:true});
  $("#title").change(rName);
  $(".rinp").bind("keyup", function() { calcRec(); });
  $(".rinp").bind("change", function() { calcRec(); });
  $("#pgg").bind("keyup",function(){ calcRec('pgg'); });
  $("#pgg").bind("change",function(){ calcRec('pgg'); });
  $("#vgg").bind("keyup",function(){ calcRec('vgg'); });
  $("#vgg").bind("change",function(){ calcRec('vgg'); });
  $("#nipg").bind("keyup",function(){ calcRec('nipg'); });
  $("#nipg").bind("change",function(){ calcRec('nipg'); });
  $("#nivg").bind("keyup",function(){ calcRec('nivg'); });
  $("#nivg").bind("change",function(){ calcRec('nivg'); });
  calcRec();
});
$.fn.textWidth = function(text, font) {
    if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').appendTo(document.body);
    var htmlText = text || this.val() || this.text();
    htmlText = $.fn.textWidth.fakeEl.text(htmlText).html(); //encode to Html
    htmlText = htmlText.replace(/\s/g, "&nbsp;"); //replace trailing and leading spaces
    $.fn.textWidth.fakeEl.html(htmlText).css('font', font || this.css('font'));
    var width = $.fn.textWidth.fakeEl.width()
    $.fn.textWidth.fakeEl.html('');
    return width;
};
});