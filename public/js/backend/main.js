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

/**
 * List manager
 */
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
            let list = document.getElementsByClassName('list');
            for (let i = 0; i < list.length; i++) {
                let attrList = list[i].getAttribute('data-name');
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

/**
 * Task Manager
 */
const formTask = document.getElementsByClassName('container-form-task');
let btnTask = document.getElementsByClassName('btn-add-task');
for (let i = 0; i < btnTask.length; i++) {
    let attributeId = btnTask[i].getAttribute('data-id');
    
    btnTask[i].addEventListener('click', () => {

        for (let j = 0; j < formTask.length; j++) {
            const formAttr = formTask[j].getAttribute('data-id');

            if (attributeId == formAttr) {
                formTask[j].style.display = 'block';
                
                const btnCancel = document.getElementsByClassName('cancel');
                // for (let k = 0; k < btnCancel.length; k++) {
                //     btnCancel[k].addEventListener('click', () => {
                //         formTask[j].style.display = 'none';
                //     })
                // }
                closeForm(btnCancel, formTask[j], 'click');
            } 

            
    
        }
    })
}

function closeForm (element, cible, event) {
    for (let i = 0; i < element.length; i++) {
        element[i].addEventListener(event, () => {
            cible.style.display = 'none';
        })
    }
}

// Add task
const formAddTask = document.getElementsByClassName('form-task');

for (let i = 0; i < formAddTask.length; i++) {
    formAddTask[i].addEventListener('submit', (e) => {
        e.preventDefault();

        const input = new FormData(formAddTask[i]);

        ajaxPost('addTask', input, (response) => {
            const data = JSON.parse(response);
            if (data['error']) {
                const errorsKey = Objet.keys(data);
    
                for (let j = 0; j < errorsKey.length; j++) {
                    let key = errorsKey[j];
                    let errors = data[key];
                    alert(errors);
                }
            } else {
                console.log(data);
                const task = document.createElement('div');
                task.classList.add('task');
                task.textContent = data.name;

                const containerTask = document.getElementsByClassName('task-content'); 
                for (let k = 0; k < containerTask.length; k++) {
                    containerTask[i].appendChild(task);
                }
                
            }
        })
    })
}
