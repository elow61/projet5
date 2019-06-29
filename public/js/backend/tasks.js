const formAddTask = document.getElementsByClassName('form-task');
const formTask = document.getElementsByClassName('container-form-task');
let btnTask = document.getElementsByClassName('btn-add-task');
const btnCancel = document.getElementsByClassName('cancel');
const containerTask = document.getElementsByClassName('task-content'); 

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
                const task = document.createElement('div');
                task.classList.add('task');
                task.textContent = data.name;

                for (let k = 0; k < containerTask.length; k++) {
                    containerTask[i].appendChild(task);
                }
            }
        })
    })
}


// Task form
function formTaskAction(element) {
    for (let i = 0; i < element.length; i++) {
        let attributeId = element[i].getAttribute('data-id');
        
        element[i].addEventListener('click', () => {
    
            for (let j = 0; j < formTask.length; j++) {
                const formAttr = formTask[j].getAttribute('data-id');
    
                if (attributeId == formAttr) {
                    formTask[j].style.display = 'block';
                    
                    closeForm(btnCancel, formTask[j], 'click');
                }
            }
        })
    }
    console.log(element);
}
formTaskAction(btnTask);


// Close task form
function closeForm (element, cible, event) {
    for (let i = 0; i < element.length; i++) {
        element[i].addEventListener(event, () => {
            cible.style.display = 'none';
        })
    }
}

// Add task

// Menu for delete or update a task
function menuTask() {
    tasks = document.getElementsByClassName('task');
    for (let i = 0; i < tasks.length; i++) {
        taskAttr = tasks[i].getAttribute('data-id');
    }

    // Create Menu
    containerMenuTask = document.createElement('div');
    container.classList.add('container-menu-task');

    updateTask = document.createElement('a');
    updateTask.classList.add('update-task');
    update.task.href = '/updateTask&id=' + taskAttr;

    deleteTask = document.createElement('a');
    deleteTask.classList.add('delete-task');
    deleteTask.href = '/deleteTask&id=' + taskAttr;

    containerMenuTask.appendChild(updateTask);
    containerMenuTask.appendChild(deleteTask);

    for (let i = 0; i < updateTask.length; i++) {
        updateTask[i].addEventListener('click', () => {
            ajaxGet(updateTask[i].href, (response) => {
                const data = JSON.parse(response);
            });
        })
    }

    for (let i = 0; i < deleteTask.length; i++) {
        deleteTask[i].addEventListener('click', () => {
            ajaxGet(deleteTask[i].href, (response) => {
                const data = JSON.parse(response);
            });
        })
    }
}
