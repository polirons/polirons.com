document.addEventListener('DOMContentLoaded', function() {
    const languageModalTrigger = document.getElementById('languageModalTrigger');
    const languageModal = document.getElementById('languageModal');
    
    languageModalTrigger.addEventListener('click', function() {
        languageModal.style.display = 'block';
    });
    
    languageModal.addEventListener('click', function(event) {
        if (event.target === languageModal) {
            languageModal.style.display = 'none';
        }
    });
});