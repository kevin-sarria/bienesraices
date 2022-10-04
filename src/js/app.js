



document.addEventListener('DOMContentLoaded', function () {


    eventListeners();

    darkMode();

});


function darkMode() {

    const prefiereDarkMode = window.matchMedia('prefers-color-scheme: dark');
    const nuevoDarkMode = window.localStorage.getItem('Dark Mode');
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    
    if(prefiereDarkMode.matches == true) {
        document.body.classList.add('dark-mode');
    }else {
        if(nuevoDarkMode != 'On') {
            document.body.classList.remove('dark-mode');
        }else {
            document.body.classList.add('dark-mode');
        }
        
    }

    prefiereDarkMode.addEventListener('change', () => {
        if(prefiereDarkMode.matches == true) {
            document.body.classList.add('dark-mode');
        }else {
            document.body.classList.remove('dark-mode');
        }   
    });

    botonDarkMode.addEventListener('click', () => {
        

        if(localStorage.getItem('Dark Mode') != 'On'  ) {
            document.body.classList.add('dark-mode');
            window.localStorage.setItem('Dark Mode', 'On');
        }else {
            document.body.classList.remove('dark-mode');
            window.localStorage.removeItem('Dark Mode');
        }
    });

}


function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

}






function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}




