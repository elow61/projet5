const formAddTask = document.getElementsByClassName('form-task');
const formTask = document.getElementsByClassName('container-form-task');
const btnTask = document.getElementsByClassName('btn-add-task');
const btnCancel = document.getElementsByClassName('cancel');
const containerTask = document.getElementsByClassName('task-content'); 

function addTask(element, content) {
        for (let i = 0; i < element.length; i++) {
            function createTask (data) {
                const task = document.createElement('div');
                task.classList.add('task');
                task.textContent = data.name;
                task.setAttribute('data-id', data.id_task.id);
                const attrTask = task.getAttribute('data-id');
                console.log(task);
                // if (content.length > 1) {
                    for (let j = 0; j < content.length; j++) {
                        for (let k = 0; k < btnTask.length; k++) {
                            const attr = btnTask[k].getAttribute('data-id');
                            if (data.list == attr) {
                                content[k].appendChild(task);
                            }
                        }
                        // content[i].appendChild(task);
                    }
                // } else {
                //     for (let j = 0; j < btnTask.length; j++) {
                //         const attr = btnTask[i].getAttribute('data-id');
                //         if (data.list == attr) {
                //             content.appendChild(task);
                //         }
                //     }
                    
                //     console.log(content);
                // }
            }
            formSubmit(element[i], 'addTask', createTask);
        }
}
addTask(formAddTask, containerTask);

// Task form
function formTaskAction(element, form) {
    for (let i = 0; i < element.length; i++) {
        let attributeId = element[i].getAttribute('data-id');
        
        element[i].addEventListener('click', () => {
    
            for (let j = 0; j < form.length; j++) {
                const formAttr = form[j].getAttribute('data-id');
    
                if (attributeId == formAttr) {
                    form[j].style.display = 'block';
                    
                    closeForm(btnCancel, form[j], 'click');
                }
            }
        })
    }
}
formTaskAction(btnTask, formTask);


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
