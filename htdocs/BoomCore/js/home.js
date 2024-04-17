//FIXME - telaEdit nao sumindo ao apertar outros botoes p3
ajeita aí 
function drop(dropdown, classe, dropdown2 = "") {
  let abertos = document.getElementsByClassName("mostrar"); //elementos abertos
  for (const elemento of abertos) {
    console.log(elemento);
    //T0DOS que estiverem abertos mas nao forem filhas da respectiva classe do produto:
    if (!elemento.matches(`.${classe} *`)) {
      elemento.classList.remove("mostrar"); // some, perdendo a classe 'mostrar'
      console.log("bbbbbbbb");
    }
  }

  document.getElementById(dropdown).classList.toggle("mostrar");
  let drop2 = document.getElementById(dropdown2);
  if (dropdown2 && drop2.classList.contains("mostrar")) {
    drop2.classList.remove("mostrar");
  }
  console.log(document.getElementsByClassName("mostrar")); 
}
//  Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
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
