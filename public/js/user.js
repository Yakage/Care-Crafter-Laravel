document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-links a');
    const cardIds = ['step-tracker', 'sleep-tracker', 'water-intake', 'health-journal'];

    navLinks.forEach(link => {
        link.addEventListener('click', scrollToSection);
    });

    cardIds.forEach(id => {
        const card = document.getElementById(`${id}-card`);
        if (card) {
            card.addEventListener('click', () => {
                scrollToTarget(id);
            });
        }
    });

    function scrollToSection(e) {
        e.preventDefault();
        const targetId = e.target.getAttribute('href').substring(1);
        scrollToTarget(targetId);
    }

    function scrollToTarget(targetId) {
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
});
