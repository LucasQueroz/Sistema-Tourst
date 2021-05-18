$(document).ready(function(){/*
    $('#viagem').keyup(function () { 
        $('form').submit(function () { 
            var dados = $(this).serialize();

            $.ajax({
                type: "PORT",
                url: "pesquisa_cliente.php",
                data: "dados",
                dataType: "html",
                success: function (data) {
                    $('resultatdo').empty().html(data);
                }
            });
            return false;
        });
        $('form').trigger('submit');
    });
    
});