$(document).ready(function(){
    $(document).on('change', '#appbundle_intervention_condominium', function () {

        let $field = $(this);
        let $buildingField = $('#appbundle_intervention_condominium');
        let $form = $field.closest('form');
        let target = '#' + $field.attr('id').replace('condominium', 'building');

        // Les données à envoyer en Ajax
        let data = {}
        data[$buildingField.attr('name')] = $buildingField.val()
        data[$field.attr('name')] = $field.val()

        // On soumet les données
        $.post($form.attr('action'), data).then(function (data) {
            //console.log($data.liste)

            // On récupère le nouveau <select>
            let $input = $(data).find(target).parent('.form-group');

            console.log($input);
            // On remplace notre <select> actuel
            //$(target).replaceWith($input)
            $input.insertAfter($field.parent('.form-group'));
        })
    })
})