let formAddTask = document.getElementsByClassName('form-task');
let formTask = document.getElementsByClassName('container-form-task');
let btnTask = document.getElementsByClassName('btn-add-task');
let btnCancel = document.getElementsByClassName('cancel');
let containerTask = document.getElementsByClassName('task-content'); 

// Without reload
function addTasks(element, content) {
    for (let i = 0; i < element.length; i++) {
        for (let j = 0; j < btnCancel.length; j++) {
            closeForm(btnCancel, formTask);
        }
        
        function createTask (data) {
            let tasks = [];

            let task = document.createElement('div');
            task.classList.add('task');
            task.innerHTML = data.name;
            task.setAttribute('data-id', data.id_task.id);
            tasks.push(task);

            content.appendChild(task);

            tasks.addEventListener('click', () => {
                menuTask();
            })
            
            for (let y = 0; y < formTask.length; y++) {
                formTask[y].style.display = 'none';
            }
        }
    }
    formSubmit(element, 'addTask', createTask);
}

// Add task
for (let i = 0; i < formAddTask.length; i++) {
    formTaskAction(btnTask, formTask);
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
                task.innerHTML = data.name;

                for (let k = 0; k < containerTask.length; k++) {
                    containerTask[i].appendChild(task);
                }
                for (let y = 0; y < formTask.length; y++) {
                    formTask[i].style.display = 'none';
                }
            }
        })
    })
}

// Task form open
function formTaskAction(element, form) {
    for (let i = 0; i < element.length; i++) {
        let attributeId = element[i].getAttribute('data-id');

        for (let j = 0; j < form.length; j++) {
            if (form[j].style.display === 'none') {
                element[i].addEventListener('click', () => {
                    const formAttr = form[j].getAttribute('data-id');
            
                    if (attributeId == formAttr) {
                        form[j].style.display = 'block';
                        // closeForm(btnCancel, form[j]);
                    }
                })
            } else {
                form[j].style.display = 'none';
            }
        }
    }
}
closeForm(btnCancel, formTask);

// Menu for delete or update a task
function menuTask() {
    let tasks = document.getElementsByClassName('task');
    for (let i = 0; i < tasks.length; i++) {
        taskAttr = tasks[i].getAttribute('data-id');
    }

    // Create Menu
    let containerMenuTask = document.createElement('div');
    container.classList.add('container-menu-task');

    let updateTask = document.createElement('a');
    updateTask.classList.add('update-task');
    updateTask.task.href = '/updateTask/' + taskAttr;

    let deleteTask = document.createElement('a');
    deleteTask.classList.add('delete-task');
    deleteTask.href = '/deleteTask/' + taskAttr;

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
