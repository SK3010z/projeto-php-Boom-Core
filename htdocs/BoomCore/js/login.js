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
  falhaP.innerHTML = "O nome de usuário e/ou a senha estão incorretos.";
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
