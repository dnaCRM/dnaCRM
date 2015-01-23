function preencherMenu(condominio, setor) {
    //var condominio = $("#m_end_condominio").val();

    if (condominio != '') {
        $.ajax({
            type: "get",
            url: "Setor/listByCondId/" + condominio,
            success: function (data) {
                $("#m_end_setor").html(data);
                $(data).appendTo('#responseAjaxError');
            },
            error: function (data) {
                $(data.responseText).appendTo('#responseAjaxError');
            }
        });
    }

    //var setor = $("#m_end_setor").val();

    if (setor != '') {
        $.ajax({
            type: "get",
            url: "Apartamento/listBySetorId/" + setor,
            success: function (data) {
                $("#m_end_apartamento").html(data);
            },
            error: function (data) {
                $(data.responseText).appendTo('#responseAjaxError');
            }
        });
    }
}

