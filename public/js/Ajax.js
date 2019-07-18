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

// Form POST for Ajax
function formSubmit(form, url, fCreate, fOpenForm = null) {
    if (form instanceof HTMLCollection) {
        for (let i = 0; i < form.length; i++) {
            fOpenForm();
            form[i].addEventListener('submit', (e) => {
                e.preventDefault();
                const element = new FormData(form[i]);
    
                ajaxPost(url, element, (response) => {
                    const data = JSON.parse(response);
                    
                    if (data['error']) {
                        const errorsKey = Object.keys(data);
                        for (let j = 0; j < errorsKey.length; j++) {
                            let key = errorsKey[j];
                            let error = data[key];
                            alert(error);
                        } 
                    } else {
                        fCreate(data);
                    }
                })
            })
        }
    } else {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const element = new FormData(form);
    
            ajaxPost(url, element, (response) => {
                const data = JSON.parse(response);
                
                if (data['error']) {
                    const errorsKey = Object.keys(data);
                    for (let i = 0; i < errorsKey.length; i++) {
                        let key = errorsKey[i];
                        let error = data[key];
                        alert(error);
                    } 
                } else {
                    fCreate(data);
                }
            })
        })
    }
}