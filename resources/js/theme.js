(function () {

    const savedTheme = localStorage.getItem('techhub-theme');

    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark-mode');
    }

    window.toggleTechHubTheme = function () {

        document.documentElement.classList.toggle('dark-mode');

        const isDark =
            document.documentElement.classList.contains('dark-mode');

        localStorage.setItem(
            'techhub-theme',
            isDark ? 'dark' : 'light'
        );

        updateThemeButtons();
    };

    function updateThemeButtons() {

        const isDark =
            document.documentElement.classList.contains('dark-mode');

        document.querySelectorAll('.theme-toggle').forEach(function (button) {

            const moon = button.querySelector('.moon-icon');
            const sun = button.querySelector('.sun-icon');

            if (moon) {
                moon.style.display = isDark ? 'none' : 'inline';
            }

            if (sun) {
                sun.style.display = isDark ? 'inline' : 'none';
            }

            button.setAttribute(
                'title',
                isDark
                    ? 'Switch to white mode'
                    : 'Switch to dark mode'
            );

        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        updateThemeButtons();
    });

})();