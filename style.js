
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.querySelector('.tog_btn');
        const links = document.querySelector('.links');

        // Check if elements exist before adding event listener
        if (toggleBtn && links) {
            toggleBtn.addEventListener('click', () => {
                links.classList.toggle('active');
            });
        } else {
            console.error('Toggle button or links container not found. Check class names: .tog_btn and .links');
        }
    });
