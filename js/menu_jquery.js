$(document).ready(function() {
	getMenu();	
//	t=$.cookie('selected');
//	var checkElement_test = $('#'+t).next();
//	$('#test_'+t).closest('ul').slideDown('normal');
//	checkElement_test.show();
$('#cssmenu > ul > li > a').click(function() {
	setMenu($(this).attr('id'));
	$.cookie('selected',$(this).attr('id'));
  $('#cssmenu li').removeClass('active');	
  $(this).closest('li').addClass('active');
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#cssmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }
  
});
});

