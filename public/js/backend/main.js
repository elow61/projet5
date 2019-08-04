// Update project name
function updateProject(btnRadio) {
     if (btnRadio.checked) {
         input = document.getElementById('newName');
         input.style.display = 'block';
     }
}

// Close forms with same class
function closeForm (element, cible) {
    
    if (element instanceof HTMLCollection) {
        for (let i = 0; i < element.length; i++) {
            element[i].addEventListener('click', () => {
                for (let j = 0; j < cible.length; j++) {
                    cible[j].style.display = 'none';
                }
            })
        }
    } else {
        element.addEventListener('click', () => {
            cible.style.display = 'none';
        })
    }
    
}

