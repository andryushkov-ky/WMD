var uploader_frame;
var uploader_working = false;

jQuery(document).ready(function($){
	$('.toggle-media-uploader').click(function(e){
		e.preventDefault();

		var button 	= $(this);
		var id 		= button.attr( 'data-id' );
		var label 	= $('label[for="'+id+'"]').text();

		if( uploader_working )
			return;

		uploader_frame = wp.media.frames.uploader_frame = wp.media({
			title 		: 'Upload ' + label,
			button 		: { text : 'Select Image'},
			library 	: { type : 'image' },
			multiple 	: false
		});

		uploader_frame.on( 'select', function(){			
			var attachment = uploader_frame.state().get('selection').first().toJSON();

			// Preview and append the value
			$('.input-image-preview[data-id="'+id+'"]').html( '<img src="'+ attachment.url +'" />' );

			$('input[name="'+id+'[media_id]"]').val( attachment.id );			
			$('input[name="'+id+'[full]"]').val( attachment.url );
		});

		uploader_frame.open();
	});
});