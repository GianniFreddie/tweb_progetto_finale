var $j = jQuery.noConflict(); //evita conflitto con scriptcolous

$j(document).ready(function() {
	$j('.telefilm-info').on('click', function() {
		var id = $j(this).data("tv-serie-id");
		window.location.href = "show.php?id=" + id;
	});
});