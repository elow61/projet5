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
})

