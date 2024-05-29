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

function atendimentoNaoLogado() {
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

function servicosNaoLogado() {
  let falhaDiv = document.getElementById("divAtendimentoNaoLogado");
  let falhaP = document.getElementById("pAtendimentoNaoLogado");

  falhaP.innerHTML = "Entre para acessar os serviços";
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

// false -> senha nao a mostra, true -> senha a mostra
let estadoSenha = false;
function exibirEsconderSenha(olho, input) {
  if (estadoSenha) {
    $(`#${olho}`).attr("src", "../images/olhoMostrar.png");
    $(`#${input}`).attr("type", "password");
  } else {
    $(`#${olho}`).attr("src", "../images/olhoFechar.png");
    $(`#${input}`).attr("type", "text");
  }
  estadoSenha = !estadoSenha;
}
