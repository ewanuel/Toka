document.addEventListener("DOMContentLoaded", function () {
  // Inicializar a biblioteca AOS.js
  AOS.init({
    duration: 1000, // Duração da animação em milissegundos
    offset: 50,    // Deslocamento (em pixels) do início da animação
    easing: 'ease-out', // Efeito de easing (linear, ease-out, ease-in-out, etc.)
  });

  // Função para verificar se um elemento está no viewport
  function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  // Função para aplicar animações de scroll
  function applyScrollAnimations() {
    const elements = document.querySelectorAll('.sr:not(.visible)');
    elements.forEach((element) => {
      if (isElementInViewport(element)) {
        element.classList.add('visible');
        // Use a biblioteca ScrollReveal para animações
        ScrollReveal().reveal(element, {
          duration: 1000,         // Duração da animação em milissegundos
          origin: 'bottom',       // Origem da animação (top, bottom, left, right)
          distance: '50px',       // Distância do elemento em relação ao ponto de origem
          delay: 200,             // Atraso antes da animação começar em milissegundos
          easing: 'ease-out',     // Efeito de easing (linear, ease-out, ease-in-out, etc.)
        });
      }
    });
  }

  // Adicione a classe .loja_txt_android ao elemento .loja_txt se o dispositivo for Android
  const lojaTxtElement = document.querySelector(".loja_txt");
  if (isAndroid() && lojaTxtElement) {
    lojaTxtElement.classList.add("loja_txt_android");
  }

  // Aplicar animações de scroll no carregamento inicial
  applyScrollAnimations();

  // Adicionar evento de scroll para aplicar animações durante o scroll
  window.addEventListener('scroll', applyScrollAnimations);
});

document.addEventListener("DOMContentLoaded", function () {
  const lojaPngElement = document.querySelector(".loja_png");
  const imagens = [
    "img/fts/Corpo/loja1.png",
    "img/fts/Corpo/loja2.jpg",
    "img/fts/Corpo/loja3.jpg"
    // Adicione mais URLs de imagem conforme necessário
  ];
  let imagemAtual = 0;

  // Função para atualizar a imagem do elemento loja_png
  function atualizarImagem() {
    lojaPngElement.src = imagens[imagemAtual];
  }

  // Função para avançar para a próxima imagem
  function avancarImagem() {
    imagemAtual = (imagemAtual + 1) % imagens.length;
    atualizarImagem();
  }

  // Atualize a imagem inicial
  atualizarImagem();

  // Configure um intervalo para alternar automaticamente as imagens a cada 5 segundos (5000 milissegundos)
  setInterval(avancarImagem, 5000);

  // Ocultar todas as imagens, exceto a primeira, no carregamento inicial
  const imagensOcultas = document.querySelectorAll(".loja_png:not(:first-child)");
  imagensOcultas.forEach(function (imagem) {
    imagem.style.display = "none";
  });
});