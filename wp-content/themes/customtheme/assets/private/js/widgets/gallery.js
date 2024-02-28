export default function Gallery () {
    jQuery(document).ready(function ($) {
        // gallery
        $(document).on('click', '.upload_gallery_button', function(e) {
            e.preventDefault(e);
            var $button = $(this),
                $gallerys = $button.closest('.box-field-gallery').find('.gallery-column'),
                count = $gallerys.length;

            var input_name = $button.closest('.box-field-gallery').find('#get_result_gallery').attr('data-gallery_name');
            var input_id = $button.closest('.box-field-gallery').find('#get_result_gallery').attr('data-gallery_id');
            var input_class = $button.closest('.box-field-gallery').find('#get_result_gallery').attr('data-gallery_class');
            var image_width = $button.closest('.box-field-gallery').find('#get_result_gallery').attr('data-gallery_width');

            var file_gallery_frame = wp.media.frames.file_frame = wp.media({
                title: 'Select or upload image',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Select'
                },
                multiple: true
            });

            file_gallery_frame.on('select', function() {

                var attachments = file_gallery_frame.state().get('selection').map(

                    function(attachment) {

                        attachment.toJSON();
                        return attachment;

                    });

                var i;

                for (i = 0; i < attachments.length; ++i) {

                    var image_url = attachments[i].attributes.url;

                    var galleryitems = '<div data-id="' + (i + count) + '" class="gallery-column"><div class="preview-image-item"><img style="width:' + image_width + 'px;max-width: ' + image_width + 'px;height:auto" class="' + input_class + '" id="' + input_id + '-' + (i + count) + '" src="' + image_url + '" /><input type="hidden" id="' + input_id + '" name="' + input_name + '[' + (i + count) + ']" value="' + image_url + '" /><div class="preview-image-action"><a href="javascript:;" class="act-remove-image">Xóa</a></div></div></div>';
                    $button.closest('.box-field-gallery').find('.render-gallery-images').append(galleryitems);

                }
            });

            file_gallery_frame.open();
            $('input[name="savewidget"]').prop('disabled', false);

        });

        // gallery remove
        $(document).on('click', '.act-remove-image', function(e) {
            e.preventDefault(e);
            var $button = $(this);
            $action = $button.closest('.box-field-gallery .gallery-column').remove();
            $('input[name="savewidget"]').prop('disabled', false);
        });
    });
}