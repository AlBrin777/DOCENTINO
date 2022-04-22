$(document).ready(function () {
    $("form").bind("submit", function () {
    var  div =  $("div").find(".alert");
    var BtnEnter = $("form").find(".btnEnter3");
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function (data) {
                BtnEnter.val("Validando...");
                BtnEnter.attr("disabled", "disabled");
            },
            complete: function (data) {
                div.val("Listo");
                div.removeAttr("disabled");
            },
            success: function (data) {
                div.html(data); 
            },
            error: function (data) {
                $("#error-send").removeClass("d-none");
            }
        });
        return false;
    });
});