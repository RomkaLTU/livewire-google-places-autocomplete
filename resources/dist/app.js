document.addEventListener("DOMContentLoaded", () => {
  if (window.Livewire) {
    Livewire.on('focusNext', (nextIndex) => {
      const nextElement = document.querySelector(`[tabindex="${nextIndex}"]`);
      if (nextElement) {
        nextElement.focus();
      }
    });

    Livewire.on('focusPrev', (prevIndex) => {
      if (prevIndex >= 0) {
        const prevElement = document.querySelector(`[tabindex="${prevIndex}"]`);
        if (prevElement) {
          prevElement.focus();
        }
      }
    });

    document.addEventListener('keydown', (event) => {
      if (event.key === 'ArrowUp') {
        const firstItem = document.querySelector('[tabindex="0"]');
        const currentFocus = document.activeElement;

        if (currentFocus === firstItem) {
          const addressElement = document.getElementById('address');
          if (addressElement) {
            addressElement.focus();
            event.preventDefault();
          }
        }
      }
    });
  }
});
