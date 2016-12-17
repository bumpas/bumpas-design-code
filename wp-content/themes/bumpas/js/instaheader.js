var	user_id = 2799034;
var client_id = "c532751031b345c5b17b022c512a8503";
var access_parameters = {client_id:client_id};

function grabinstagram() {
	function onDataLoaded(parameters) {
		var instaurl = parameters.data[0].images.standard_resolution.url;
		var objects = parameters.data;

		for (var i = 0; i < objects.length; i++) {
			var obj = objects[i];
			var tags = obj.tags;
			var found = false;
			for (var j = 0; j < tags.length; j++) {
				var tag = tags[j];
				if (tag === 'wh') {
					instaurl = obj.images.standard_resolution.url;
					found = true;
					break;
				}
			}
			if (found) {
				break;
			}
		}

	window.sessionStorage.setItem("headerurl",instaurl);
	$(".img-wrap").append('<img src="' + instaurl + '" />');
	$(".img-wrap > img").fadeIn(1000);
	
	}

	var instagramUrl = 'https://api.instagram.com/v1/users/' + user_id + '/media/recent?callback=?&count=10';
	$.getJSON(instagramUrl,access_parameters,onDataLoaded);
}
(function () {

	var hasHeaderUrl = sessionStorage.getItem("headerurl");

	if(hasHeaderUrl !== null) {
		//$(".site-header").css("background-image", 'url("' + hasHeaderUrl + '")');
		$(".img-wrap").append('<img src="' + hasHeaderUrl + '" />');
		$(".img-wrap > img").show();
	} else {
		grabinstagram();
	}
}());

function parallax(){
  var scrolled = $(window).scrollTop();

  $('.img-wrap > img').css('top', (scrolled*'.25')+'px');
}

$(window).scroll(function(){
  parallax();
});