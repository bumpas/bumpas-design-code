function grabinstagram(){function e(e){var t=e.data[0].images.standard_resolution.url,n=e.data;for(var r=0;r<n.length;r++){var i=n[r],s=i.tags,o=!1;for(var u=0;u<s.length;u++){var a=s[u];if(a==="wh"){t=i.images.standard_resolution.url;o=!0;break}}if(o)break}window.sessionStorage.setItem("headerurl",t);$(".img-wrap").append('<img src="'+t+'" />');$(".img-wrap > img").fadeIn(1e3)}var t="https://api.instagram.com/v1/users/"+user_id+"/media/recent?callback=?&count=5";$.getJSON(t,access_parameters,e)}function parallax(){var e=$(window).scrollTop();$(".img-wrap > img").css("top",e*".25"+"px")}var user_id=2799034,client_id="c532751031b345c5b17b022c512a8503",access_parameters={client_id:client_id};(function(){var e=sessionStorage.getItem("headerurl");if(e!==null){$(".img-wrap").append('<img src="'+e+'" />');$(".img-wrap > img").show()}else grabinstagram()})();$(window).scroll(function(){parallax()});