
   // Mostrar o botão quando o usuário desce a página
   window.onscroll = function() { showScrollButton() };

   function showScrollButton() {
       const btn = document.getElementById("backToTopBtn");
       if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
           btn.style.display = "block";
       } else {
           btn.style.display = "none";
       }
   }

   // Função para rolar a página para o topo
   function scrollToTop() {
       window.scrollTo({ top: 0, behavior: 'smooth' });
   }
