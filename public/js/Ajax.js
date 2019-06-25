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

// The form's management to add a list
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
            list.setAttribute('data-name', data.id);
            console.log(JSON.parse(data.id));

            const containerTitle = document.createElement('div');
            containerTitle.classList.add('title-list');

            const title = document.createElement('h2');
            title.textContent = data.success;

            const btnRemove = document.createElement('div');
            btnRemove.classList.add('remove-list');
            btnRemove.classList.add('btn-list');
            btnRemove.setAttribute('onclick', 'modal2.viewModal();');
            btnRemove.setAttribute('data-name', data.id);
            const attribute = btnRemove.getAttribute('data-name');
            btnRemove.addEventListener('click', () => {
                const inputTitle = document.getElementById('input-list');
                inputTitle.value = attribute;
            })

            // add tasks
            const containerTask = document.createElement('div');
            containerTask.classList.add('task');

            const btnTask = document.createElement('div');
            btnTask.classList.add('btn-add-task');
            btnTask.setAttribute('data-name', data.id);
            btnTask.textContent = '+ tâches';
            containerTask.appendChild(btnTask);

            container.appendChild(list);
            list.appendChild(containerTitle);
            list.appendChild(containerTask);
            containerTitle.appendChild(title);
            containerTitle.appendChild(btnRemove);

            modal.closeModal();
        }
    });
    
})

// Add the value for the input
let btnRemoved = document.getElementsByClassName('remove-list');
for (let i = 0; i < btnRemoved.length; i++) {
    let attribute = btnRemoved[i].getAttribute('data-name');

    btnRemoved[i].addEventListener('click', () => {
        const inputTitle = document.getElementById('input-list');
        inputTitle.value = attribute;
    })
}

// The form's management to remove a list
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
            let list = document.getElementsByClassName('list');
            for (let i = 0; i < list.length; i++) {
                let attrList = list[i].getAttribute('data-name');
                console.log(attrList);

                if (data == attrList) {
                    list[i].animate([
                        {transform: 'translateY(0px)'},
                        {transform: 'translateY(-800px)'}
                    ], {
                        duration: 1000,
                        easeing: 'ease'
                    });
                    list[i].style.display = 'none';
                } else {
                    console.log('Error');
                }
            }
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
