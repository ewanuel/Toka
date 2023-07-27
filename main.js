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

  window.addEventListener('scroll', handleScrollAnimation);
  handleScrollAnimation(); // Executar a função no carregamento inicial



