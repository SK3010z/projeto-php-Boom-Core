//FIXME - telaEdit nao sumindo ao apertar outros botoes p3
// ajeita aí
function drop(dropdown, classe, dropdown2 = "") {
  document.getElementById(dropdown).classList.toggle("mostrar"); //abre a tela recebida
  let abertos = document.getElementsByClassName("mostrar"); //elementos abertos
  for (let i = 0; i < abertos.length; i++) {
    let elemento = abertos[i];
    if (!elemento.matches(`.${classe} *`)) { //abertos mas nao filhas da respectiva classe
      setTimeout(() => elemento.classList.remove("mostrar"));// some, perdendo a classe 'mostrar'
    }
  }

  //fa
  let drop2 = document.getElementById(dropdown2);
  if (dropdown2 && drop2.classList.contains("mostrar")) {
    drop2.classList.remove("mostrar");
  }
}
//  Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  console.log(document.getElementsByClassName("mostrar"));
  if (
    !event.target.matches(["#p3", "#btnEdit", ".telaEditar", ".telaEditar *"])
  ) {
    var dropdowns = document.getElementsByClassName("dropdown");
    for (let i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("mostrar")) {
        openDropdown.classList.remove("mostrar");
      }
    }
  }
};


// TODO - OBTER INFORMAÇÕES DE CADA PRODUTO PRA MOSTRAR A TELA 
$(".comprar, .buy-now").click(function (e) { 
  e.preventDefault();
  $("#fundo-compra").toggle();
  $("body").toggleClass("overflow");
});


