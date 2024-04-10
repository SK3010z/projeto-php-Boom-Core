function drop(dropdown) {
    document.getElementById(dropdown).classList.toggle("mostrar");
  }
  //  Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches(['#p3','#btnEdit','.telaEditar', '.telaEditar *'])) {
      var dropdowns = document.getElementsByClassName("dropdown");
      for (let i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('mostrar')) {
          openDropdown.classList.remove('mostrar');
        }
      }
    }
  }