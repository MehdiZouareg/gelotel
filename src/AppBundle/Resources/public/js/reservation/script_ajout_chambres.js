$('').on('input', function () {
    $.ajax
    ({
        url: Routing.generate('', true),
        method: "POST",
        data: "hotel=" + $('#search-input').val(),
        success: function (data) {
            $('#results').html('');
            $prevajax = null;


            //En cas d'absence de resultats
            if (data.length < 3) {
                $('#nofound-message').removeClass("hidden");
            }

            //Le JSON est transformé en objet ici
            var objData = jQuery.parseJSON(data);

            for (i = 0; i <= objData.length - 1; i++) {

                
                
            }


        }


    });
})