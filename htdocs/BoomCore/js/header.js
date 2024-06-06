// $("#user").hover(function() {
//   $("#opcoesUsuario").show();
//   $("#user").css("padding-bottom", "50px");

// }, function() {
//   $("#opcoesUsuario").hide();
//   $("#user").css("padding-bottom", "0px");
// });
function fechar_clicando_fora(elemento_pai, elemento_toggle) {
  let ePai = $(elemento_pai);
  let eToggle = $(elemento_toggle);
  $(document).mouseup(function (e) {
    console.log(!eToggle.is(e.target), ePai.has(e.target).length);
    if (!ePai.is(e.target) && ePai.has(e.target).length === 0) {
      eToggle.hide();
    }
  });
}
$("#user img").click(function (e) {
  e.preventDefault();
  if (e.target === this) {
    $("#opcoesUsuario").toggle();
  }
});
fechar_clicando_fora("#user", "#opcoesUsuario");

$("#notificacao img").click(function (e) {
  e.preventDefault();
  if (e.target === this) {
    $("#tela-notificacoes").toggle();
  }
});
fechar_clicando_fora("#notificacao", "#tela-notificacoes");

window.addEventListener("beforeunload", function () {
  // Define o cookie com uma data de expiração no passado
  document.cookie =
    "naoLogado=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
});
