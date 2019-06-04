document.addEventListener('DOMContentLoaded', () => {
    // Menu Hamburger
    document.getElementById('btn-hamburger').addEventListener('click', () => {
        const sClass = 'view';
        const navigation = document.querySelector('nav');

        if (navigation.classList.contains(sClass) === true) {
            navigation.classList.remove(sClass);
        } else {
            navigation.classList.add(sClass);
        }
    })

    // Color's choice
    const color = document.getElementsByClassName('color');
    const borderColor = () => {
        color.style.borderWidth = '2px';
        color.style.borderStyle = 'solid';
        color.style.borderColor = '#ffa31b';
    }

    for (let i = 0; i < color.length; i++) {
        color[i].addEventListener('click', () => {
            color[i].style.borderWidth = '2px';
            color[i].style.borderStyle = 'solid';
            color[i].style.borderColor = '#ffa31b';
        }, false);
    }
})

