export default function Repeater () {
    jQuery(document).ready(function ($) {
        $(document).on("click",".repeater-add",function(e) {
            e.preventDefault();
            var parent = $(this).closest('.repeater-box'),
                count = parent.find('.repeater-item').length,
                template = $('.repeater-item:last').clone();
                console.log(count);
            template.find('input').val('');
            template.find('input').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/(\[.+\]\[)(\d+)(\])/, '$1'+count+'$3');
                $(this).attr('name', newName);
            });
            template.appendTo('.repeater-container');
        });

        $(document).on("click",".repeater-remove",function(e) {
            e.preventDefault();
            $(this).closest('.repeater-item').remove();
            $('input[name="savewidget"]').prop('disabled', false);
            $('input[name="savewidget"]').attr('value', 'Lưu');
        });
    });
}