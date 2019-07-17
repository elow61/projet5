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

function addAttribute(elmtClick, attName, cible, getTitle) {
    let input = document.getElementById(cible);
    const title = document.getElementById(getTitle);

    if (elmtClick instanceof HTMLCollection) {
        for (let i = 0; i < elmtClick.length; i++) {
            let attribute = elmtClick[i].getAttribute(attName);
            let textHTML = elmtClick[i].innerHTML;
            elmtClick[i].addEventListener('click', () => {
                input.value = attribute;
                title.textContent = textHTML;
            })
        }
    } else {
        elmtClick.addEventListener('click', () => {
            const attribute = elmtClick.getAttribute(attName);
            title.textContent = elmtClick.innerHTML;
            input.value = attribute;
        })
    }
}