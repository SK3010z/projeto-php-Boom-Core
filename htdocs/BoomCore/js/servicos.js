$("button.contratar").click(function (e) { 
    e.preventDefault();
    let tipoServico = $(e.target).attr("tipoServico");
    $("#Contratar").show();
    $(".telaContratarServico").show();
    $("#servico").text(tipoServico);

    $("body").addClass("noOverflow");
    
});

$("#close, #okConfimacao").click(function (e) { 
    e.preventDefault();
    $("#Contratar").hide();
    $("body").removeClass("noOverflow");

    
});

function confirmacao() {
    $("body").addClass("noOverflow");

    $("#Contratar").show();
    $(".confirmacao").show();
}

