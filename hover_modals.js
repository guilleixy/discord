const padres = document.querySelectorAll('.padre');

padres.forEach(padre => {
  const hijo = padre.querySelector('.hijo');

  padre.addEventListener('mouseenter', () => {
    hijo.style.display = 'inline-block';
  });

  padre.addEventListener('mouseleave', () => {
    hijo.style.display = 'none';
  });
});