// Переключение темы
function toggleTheme() {
    const html = document.documentElement;
    const currentTheme = html.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);

    // Переключаем иконки
    const darkIcon = document.querySelector('.theme-icon-dark');
    const lightIcon = document.querySelector('.theme-icon-light');

    if (newTheme === 'dark') {
        darkIcon.style.display = 'none';
        lightIcon.style.display = 'inline-block';
    } else {
        darkIcon.style.display = 'inline-block';
        lightIcon.style.display = 'none';
    }
}

// Загрузка сохраненной темы при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {
    const savedTheme = localStorage.getItem('theme') || 'light';
    const html = document.documentElement;
    html.setAttribute('data-theme', savedTheme);

    // Устанавливаем правильную иконку
    const darkIcon = document.querySelector('.theme-icon-dark');
    const lightIcon = document.querySelector('.theme-icon-light');

    if (savedTheme === 'dark') {
        darkIcon.style.display = 'none';
        lightIcon.style.display = 'inline-block';
    } else {
        darkIcon.style.display = 'inline-block';
        lightIcon.style.display = 'none';
    }
});
