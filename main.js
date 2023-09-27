AOS.init({
  duration: 1000, // Duração da animação em milissegundos
  offset: 50,    // Deslocamento (em pixels) do início da animação
  easing: 'ease-out', // Efeito de easing (linear, ease-out, ease-in-out, etc.)
});

var swiper = new Swiper('.swiper-container', {
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function handleScrollAnimation() {
    const elements = document.querySelectorAll('.sr:not(.visible)');
    elements.forEach((element) => {
      if (isElementInViewport(element)) {
        element.classList.add('visible');
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
  
  function isAndroid() {
    return /Android/i.test(navigator.userAgent);
  }
  
  function applyScrollAnimations() {
    window.addEventListener('scroll', handleScrollAnimation);
    handleScrollAnimation(); // Executar a função no carregamento inicial
  }
  
  // Adicione a classe .loja_txt_android ao elemento .loja_txt se o dispositivo for Android
  document.addEventListener("DOMContentLoaded", function () {
    const lojaTxtElement = document.querySelector(".loja_txt");
    if (isAndroid() && lojaTxtElement) {
      lojaTxtElement.classList.add("loja_txt_android");
    }
  
    applyScrollAnimations(); // Aplicar animações de scroll para elementos .sr
  });

// Função para criar um elemento visual aleatório em um dos cantos
function criarElementoVisualAleatorio() {
  const elemento = document.createElement("div");
  elemento.className = "corner-box"; // Use a classe CSS para estilizar
  // Defina outras propriedades, como tamanho, posição, etc.
  const cantoAleatorio = Math.floor(Math.random() * 4); // Escolhe um canto aleatório (0 a 3)

  if (cantoAleatorio === 0) {
    elemento.classList.add("top-left");
  } else if (cantoAleatorio === 1) {
    elemento.classList.add("top-right");
  } else if (cantoAleatorio === 2) {
    elemento.classList.add("bottom-left");
  } else {
    elemento.classList.add("bottom-right");
  }

  document.body.insertBefore(elemento, document.body.firstChild); // Adicione o elemento ao início do corpo da página
}

// Chame a função para criar elementos visuais aleatórios nos cantos
criarElementoVisualAleatorio();
criarElementoVisualAleatorio();
criarElementoVisualAleatorio();