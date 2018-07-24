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
            console.log($(target));
            if ($(target).length) {
                $(target).parent('.form-group').remove();
            }

            if ($('#appbundle_interventiondms_Common').length) {
                $('#appbundle_interventiondms_Common').parent('.form-group').remove();
            }
            if ($('#appbundle_interventiondms_Unit').length) {
                $('#appbundle_interventiondms_Unit').parent('.form-group').remove();
            }
            if ($('#appbundle_interventiondms_Parking').length) {
                $('#appbundle_interventiondms_Parking').parent('.form-group').remove();
            }


            $input.insertAfter($field.parent('.form-group'));
        })
    });

    // you may need to change this code if you are not using Bootstrap Datepicker
    $('.js-datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
});