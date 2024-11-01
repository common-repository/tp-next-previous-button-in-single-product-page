(function( $ ) {
	'use strict';

	$( document ).ready(function() {
		//console.log(tpnpb);
		$("#tpnpb-tabs").tabs();
		
		$('.tp_colorpiker').minicolors();

		$('.tp_colorpiker_rgba').minicolors({
			format: 'rgb',
			opacity: true,
		});

		if($("#tpnpb_buttons_font_size").length) {
			var slider1 = document.getElementById("tpnpb_buttons_font_size");
			var output1 = document.getElementById("tpnpb_buttons_font_size_range_show");
			output1.innerHTML = slider1.value+'px';

			slider1.oninput = function() {
				output1.innerHTML = this.value+'px';
			}
		}

	});

})( jQuery );
