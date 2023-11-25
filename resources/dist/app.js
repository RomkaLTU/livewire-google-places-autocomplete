document.addEventListener("DOMContentLoaded", () => {
  if (window.Livewire) {
    Livewire.on('focusNext', (nextIndex) => {
      document.querySelector(`[tabindex="${nextIndex}"]`).focus();
    });

    Livewire.on('focusPrev', (prevIndex) => {
      if (prevIndex >= 0) {
        document.querySelector(`[tabindex="${prevIndex}"]`).focus();
      }
    });
  }
});
