export default function Repeater () {
    jQuery(document).ready(function ($) {
        //repeater
        $(document).on('click', '.add_row_button', function(e) {
            e.preventDefault(e);
            var $this = $(this),
                $repeater = $this.closest('.repeaters').find('[data-repeatable]'),
                count = ($repeater.length - 1),
                $clone = $repeater.first().clone();

            $clone.find('input').each(function() {
                var $this = $(this);
                $this.attr('id', $this.attr('id').replace('rowCloneindex', 'row-' + count + ''));
                $this.attr('name', $this.attr('name').replace('rowCloneindex', 'row-' + count + ''));
                $this.attr('disabled', false);

            });

            $clone.find('input:not(:checkbox):not(:radio)').each(function() {
                var $this = $(this);
                $this.attr('value', '');
            });

            $clone.find('textarea').each(function() {
                var $this = $(this);
                $this.attr('id', $this.attr('id').replace('rowCloneindex', 'row-' + count + ''));
                $this.attr('name', $this.attr('name').replace('rowCloneindex', 'row-' + count + ''));
                $this.attr('disabled', false);
                $this.text('');
            });

            $clone.find('img').each(function() {
                var $this = $(this);
                $this.attr('src', '');
            });

            $clone.find('select').each(function() {
                var $this = $(this);
                $this.attr('id', $this.attr('id').replace('rowCloneindex', 'row-' + count + ''));
                $this.attr('name', $this.attr('name').replace('rowCloneindex', 'row-' + count + ''));
                $this.find('option:not(:disabled)').attr('selected', false);
                $this.attr('disabled', false);
            });

            $clone.find('input[type="radio"]').each(function() {
                var $this = $(this);
                $this.attr('checked', false);
            });

            $clone.find('input[type="checkbox"]').each(function() {
                var $this = $(this);
                $this.attr('checked', false);
            });

            $clone.find('label').each(function() {
                var $this = $(this);
                $this.attr('for', $this.attr('for').replace('rowCloneindex', 'row-' + count + ''));
            });

            $clone.find('#get_result_gallery').each(function() {
                var $this = $(this);
                $this.attr('data-gallery_id', $this.attr('data-gallery_id').replace('rowCloneindex', 'row-' + count + ''));
                $this.attr('data-gallery_name', $this.attr('data-gallery_name').replace('rowCloneindex', 'row-' + count + ''));
            });

            $clone.find('.render-gallery-images').each(function() {
                var $this = $(this);
                $this.html('');
            });

            $clone.find('.box-row-head span').each(function() {
                var $this = $(this);
                $this.text(count + 1);
            });

            $clone.attr('data-row_id', count);

            $clone.removeClass('rowCloneindex');

            $clone.insertBefore($this);

            $clone.find('.box-field-gallery').each(function() {
                var $this = $(this);
                WidgetMakeUlSortGallery();
            });

            WidgetMakeUlSortable();

            $('input[name="savewidget"]').prop('disabled', false);
        });

        // row remove
        $(document).on('click', '.remove_row_button', function(e) {
            e.preventDefault(e);
            if (confirm('Bạn muốn xóa dòng này ?')) {
                var $this = $(this),
                    $repeater = $this.closest('.repeaters').find('[data-repeatable]'),
                    count = $repeater.length;

                $this.closest('.field-row-repeater').remove();
                $('input[name="savewidget"]').prop('disabled', false);
            } else {
                return false;
            }
        });

        // show/hide row
        $(document).on('click', '.box-row-head', function(e) {
            e.preventDefault(e);
            var $box = $(this);
            if ($box.closest('.field-row-repeater').find('.box-row-repeaters').hasClass('hide')) {
                $box.closest('.field-row-repeater').find('.box-row-repeaters').removeClass('hide');
                $box.closest('.field-row-repeater').find('.box-row-repeaters').show();
            } else {
                $box.closest('.field-row-repeater').find('.box-row-repeaters').addClass('hide');
                $box.closest('.field-row-repeater').find('.box-row-repeaters').hide();
            }
        });
    });
}