    //Script para cambio de tema
    
    const body = document.body;

    // Aplica el tema guardado o automático si no hay
    document.addEventListener('DOMContentLoaded', () => {
      const savedTheme = localStorage.getItem('theme') || 'light';
      setTheme(savedTheme);
    });

    // Asigna evento a las opciones del dropdown
    document.querySelectorAll('.dropdown-item').forEach(item => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        const selectedTheme = item.getAttribute('data-theme');
        setTheme(selectedTheme);
        localStorage.setItem('theme', selectedTheme);
      });
    });

    // Función para aplicar tema
    function setTheme(theme) {
      if (theme === 'auto') {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        body.setAttribute('data-bs-theme', prefersDark ? 'dark' : 'light');
      } else {
        body.setAttribute('data-bs-theme', theme);
      }
    }