$(document).ready(function () {
    $(document).on('change', '.dynamicField', function () {
        let $field = $(this);

        if ($field.data('dyn-next') === 'dynamic') {
            $field.data('next', $field.val());
        }

        let $form = $field.closest('form');
        let target = '#' + $form.attr('name') + '_' + $field.data('next');
        // Les données à envoyer en Ajax
        let data = {};


        $('.dynamicField').each(function () {
            data[$(this).attr('name')] = $(this).val();
        });

        // On soumet les données
        $.post($form.attr('action'), data).then(function (data) {
            // On récupère le nouveau <select>
            let $input = $(data).find(target).parent('.form-group');
            // On remplace notre <select> actuel
            //$(target).replaceWith($input)
            if ($(target).length) {
                $(target).parent('.form-group').remove();
            }
            $input.insertAfter($field.parent('.form-group'));
        })
    });

    // you may need to change this code if you are not using Bootstrap Datepicker
    $('.js-datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
});