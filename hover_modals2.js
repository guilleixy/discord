const padres2 = document.querySelectorAll('.padre');

padres2.forEach(padre => {
  const hijo = padre.querySelector('.hijo');

  padre.addEventListener('mouseenter', () => {
    hijo.style.display = 'inline-block';
  });

  padre.addEventListener('mouseleave', () => {
    hijo.style.display = 'none';
  });
});