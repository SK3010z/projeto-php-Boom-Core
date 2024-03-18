function start(str) {
  let traco = document.getElementById(str);
  traco.style.animation = "start 0.2s ease forwards";
}

function end(str) {
  let traco = document.getElementById(str);
  traco.style.animation = "end 0.2s ease forwards";
}

let opcoesUsuarioSwitch = false;
function opcoesUsuario(str){
  let opcoesUsuario = document.getElementById('opcoesUsuario')

  if (opcoesUsuarioSwitch === false){
    opcoesUsuario.style.transform = "translateY(0%)";
    opcoesUsuarioSwitch = true;
  }
  else{
    opcoesUsuario.style.transform = "translateY(-1000%)";
    opcoesUsuarioSwitch = false;
  }
}

