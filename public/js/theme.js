var toggle_icon = document.getElementById('theme-toggle');
var body = document.getElementsByTagName('body')[0];
var sun_class = 'bi-sun-fill';
var moon_class = 'bi-moon-fill';
var dark_theme_class = 'dark-theme';

toggle_icon.addEventListener('click', function () {
    if (body.classList.contains(dark_theme_class)) {
        toggle_icon.classList.add(moon_class);
        toggle_icon.classList.remove(sun_class);

        body.classList.remove(dark_theme_class);

        setCookie('theme', 'light');
    } else {
        toggle_icon.classList.add(sun_class);
        toggle_icon.classList.remove(moon_class);

        body.classList.add(dark_theme_class);

        setCookie('theme', 'dark');
    }
});

function setCookie(name, value) {
    if (typeof map !== 'undefined') {
        map.setStyle('mapbox://styles/mapbox/' + value + '-v10');
    }
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}
