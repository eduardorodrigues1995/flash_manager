document.addEventListener("DOMContentLoaded", function () {
  const headerContainer = document.getElementById("header-container");

  // Encontrar a tag do script main.js e extrair o caminho base
  const scriptTag = document.querySelector('script[src*=main]');
  const basePath = scriptTag.src.replace('/Scripts/JS/main.js', '');

fetch('http://localhost/flash_manager/Header/header.html')
    .then((response) => response.text())
    .then((html) => {
      headerContainer.innerHTML = html;
    })
    .catch((error) => {
      console.warn("Erro ao carregar o cabeçalho:", error);
    });
});
