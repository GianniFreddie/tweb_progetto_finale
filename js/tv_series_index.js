document.observe("dom:loaded", function() {
	$(".telefilm-info").click(function(){ //gestisci click su scheda telefilm, deve aprire pagina php del film
		var telefilm_id = $(this).data("tv-serie-id");
		console.log("Bravo hai cliccato sul teleflm con id " + telefilm_id);
	});
});