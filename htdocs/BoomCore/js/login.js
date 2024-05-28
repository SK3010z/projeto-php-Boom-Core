function falhaConexao() {
  let falhaDiv = document.getElementById("divFalha");
  let falhaP = document.getElementById("pFalha");
  falhaP.innerHTML =
    "Falha na conexão com o servidor. Tente novamente mais tarde.";
  falhaDiv.style = `
        background-color: #ff00007e;
        border-radius: 5px;
        height: fit-content;
        width: 100%;
        margin: 15px 0px;
    `;
  falhaP.style = `
        padding: 10px 10px;
        font-size: 1em;
    `;
}

function incorreto() {
  let falhaDiv = document.getElementById("divFalha");
  let falhaP = document.getElementById("pFalha");
  falhaP.innerHTML = "O nome de usuário e/ou senha estão incorretos.";
  falhaDiv.style = `
    background-color: #ff00007e;
    border-radius: 5px;
    height: fit-content;
    width: 100%;
    margin: 15px 0px;
`;
  falhaP.style = `
    padding: 10px 10px;
    font-size: 1em;
`;
}

function AtendimentoNaoLogado() {
  let falhaDiv = document.getElementById("divAtendimentoNaoLogado");
  let falhaP = document.getElementById("pAtendimentoNaoLogado");
  falhaP.innerHTML = "Entre para acessar o atendimento";
  falhaDiv.style = `
        background-color: #ff00007e;
        border-radius: 5px;
        height: fit-content;
        width: fit-content;
        margin: auto;
        

    `;
  falhaP.style = `
        padding: 10px 10px;
        font-size: 1.2em;
    `;
}

false -> senha nao a mostra, true -> senha a mostra
let estadoSenha = false;
function exibirEsconderSenha(olho, input) {
  let olhoSenha = document.getElementById(olho);
  let inputSenha = document.getElementById(input);
  if (estadoSenha) {
    olhoSenha.src = "../images/olhoMostrar.png";
    inputSenha.type = "password";
  } else {
    olhoSenha.src = "../images/olhofechar.png";
    inputSenha.type = "text";
  }
  estadoSenha = !estadoSenha;
}

// let estadoSenha = false;
// function exibirEsconderSenha(olho, input) {
//   // let olhoSenha = document.getElementById(olho);
//   // let inputSenha = document.getElementById(input);
//   if (estadoSenha) {
//     $(`.${olho}`).src = "../images/olhoMostrar.png";
//     $(`.${input}`).type = "password";
//     // olhoSenha.src = "../images/olhoMostrar.png";
//     // inputSenha.type = "password";
//   } else {
//     $(`.${olho}`).src = "../images/olhoFechar.png"
//     $(`.${input}`). 
//     olhoSenha.src = "../images/olhofechar.png";
//     inputSenha.type = "text";
//   }
//   estadoSenha = !estadoSenha;
// }
