// Function request ajax generic for method POST
function ajaxPost (url, data, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.addEventListener('load', () => {
        if (xhr.status >= 200 && xhr.status < 400) {
            callback(xhr.responseText);
        } else {
            console.error(xhr.status);
        }
    });
    xhr.addEventListener('error', () => {
        console.error('Erreur réseau avec l\'url ' + url);
    });
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.send(data);
}

const form = document.getElementById('form');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const input = new FormData(form);

    ajaxPost('lists', input, (response) => {
        const data = JSON.parse(response);

        if (data['error']) {
            const errorsKey = Object.keys(data);
            for (let i = 0; i < errorsKey.length; i++) {
                let key = errorsKey[i];
                let errors = data[key];
                const p_error = document.getElementById('error');

                p_error.textContent = errors;
            }
        } else {
            const container = document.getElementById('container-list');

            const list = document.createElement('div');
            list.classList.add('list');

            const title = document.createElement('h2');
            title.textContent = data;

            const btnRemove = document.createElement('div');
            btnRemove.classList.add('remove-list');
            btnRemove.classList.add('btn-list');
            btnRemove.setAttribute('onclick', 'modal2.viewModal();');

            container.appendChild(list);
            list.appendChild(title);
            list.appendChild(btnRemove);

            modal.closeModal();
        }
    });
    
})

const formDelete = document.getElementById('form-delete');
formDelete.addEventListener('submit', (e) => {
    e.preventDefault();
    const input = new FormData(formDelete);

    ajaxPost('removeLists', input, (response) => {
        const data = JSON.parse(response);

        if (data['error']) {
            const errorsKey = Objet.keys(data);

            for (let i = 0; i < errorsKey.length; i++) {
                let key = errorsKey[i];
                let errors = data[key];
                const p_error = document.getElementById('error-delete');

                p_error.textContent = errors;
            }
        } else {
            const container = document.getElementById('container-list').childNodes;
            
            for (let child of container) {
                console.log(child);
                console.log(child.innerHTML);
            }
            console.log(container);
            modal2.closeModal();
        }
    }) 
})

// Function request ajax generic for method GET
function ajaxGet(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.addEventListener('load', () => {
        if (xhr.status >= 200 && xhr.status < 400) {
            callback(xhr.responseText);
        } else {
            console.error(xhr.status);
        }
    });
    xhr.addEventListener('error', () => {
        console.error('Erreur réseau avec l\'url ' + url);
    });
    xhr.send(null);
}

// let btnRemove = document.getElementsByClassName('remove-list');

// for (let i = 0; i < btnRemove.length; i++) {
    
//     btnRemove[i].addEventListener('click', () => {
//         ajaxGet('removeLists', (response) => {
//             const data = JSON.parse(response);

//             return(confirm('Êtes-vous sûr de vouloir supprimer cette liste ?'));
        
//         })
//     });
// }