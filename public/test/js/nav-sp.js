//トグルボタン
jQuery(function(){
	jQuery("#navbtn").click(function(){
		jQuery("#mainmenu").slideToggle();
	});
	jQuery(".menu-item > a").click(function(){
		jQuery("#mainmenu").hide();
	});
});
