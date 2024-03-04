export default function Upload () { 
    jQuery(document).ready(function ($) {
        var file_frame;
        $(document).on("click",".upload_image_button",function(event) {
            var $this = $(this);
            event.preventDefault();
            // Create the media frame.
            file_frame = wp.media({
                title: 'Select a image to upload',
                button: {
                    text: 'Use this image',
                },
                library: { type: "image" },
                multiple: false	// Set to true to allow multiple files to be selected
            }).open().on('select', function () {
                // We set multiple to false so only get one image from the uploader
                var attachment = file_frame.state().get('selection').first().toJSON();
                $this.closest('.box-field-image').find('.w-image-review').html('<img src="' + attachment.url + '">');
                $this.closest('.box-field-image').find('.img-val').val(attachment.id);
                $('input[name="savewidget"]').prop('disabled', false);
            });
            // Finally, open the modal
        });

        $(document).on("click",".remove_image_button",function(event) {
            var $this = $(this);
            event.preventDefault();
            if (confirm('Delete image ?')) {
                // Create the media frame.
                $this.closest('.box-field-image').find('.w-image-review').html('');
                $this.closest('.box-field-image').find('.img-val').val('');
                $('input[name="savewidget"]').prop('disabled', false);
            }else{
                return false;
            }
        });
    });
}

