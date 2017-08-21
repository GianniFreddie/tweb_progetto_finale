var $j = jQuery.noConflict(); //evita conflitto con scriptcolous

$j(document).ready(function() {
	$j('.telefilm-info').on('click', function() {
		console.log("Ciao");
	});
});