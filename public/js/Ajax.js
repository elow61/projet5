// Function request ajax generic
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
        const container = document.getElementById('container-list');
        const list = document.createElement('div');
        list.classList.add('list');
        const title = document.createElement('h2');
        title.textContent = data;
        container.appendChild(list);
        list.appendChild(title);

        modal.closeModal();
    });
    
})
