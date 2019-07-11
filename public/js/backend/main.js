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

// Close forms with same class
function closeForm (element, cible) {
    for (let i = 0; i < element.length; i++) {
        element[i].addEventListener('click', () => {
            for (let j = 0; j < cible.length; j++) {
                cible[j].style.display = 'none';
            }
        })
    }
}

function addAttribute(elmtClick, attName, cible) {
    for (let i = 0; i < elmtClick.length; i++) {
        let attribute = elmtClick[i].getAttribute(attName);
        elmtClick[i].addEventListener('click', () => {
            let input = document.getElementById(cible);
            input.value = attribute;
        })
    }
}