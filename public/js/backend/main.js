// Menu Hamburger
document.addEventListener('DOMContentLoaded', () => {
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

// Update project name
function updateProject(btnRadio) {
     if (btnRadio.checked) {
         input = document.getElementById('newName');
         input.style.display = 'block';
     }
 }

