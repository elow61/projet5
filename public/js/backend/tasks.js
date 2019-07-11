let formAddTask = document.getElementsByClassName('form-task');
let formTask = document.getElementsByClassName('container-form-task');
let btnTask = document.getElementsByClassName('btn-add-task');
let btnCancel = document.getElementsByClassName('cancel');
let containerTask = document.getElementsByClassName('task-content'); 
const formDeleteTask = document.getElementById('modal-tasks-delete');
const formUpdateTask = document.getElementById('modal-tasks-update');
let tasks = document.getElementsByClassName('task');

addAttribute(tasks, 'data-id', 'input-task-delete');
addAttribute(tasks, 'data-id', 'input-task-update');

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
            task.setAttribute('onclick', 'modal3.viewModal();');
            const attribute = task.getAttribute('data-id');
            task.addEventListener('click', () => {
                const inputDelete = document.getElementById('input-task-delete');
                const inputUpdate = document.getElementById('input-task-update');
                inputDelete.value = attribute;
                inputUpdate.value = attribute;
            })
            tasks.push(task);

            content.appendChild(task);

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
                    }
                })
            } else {
                form[j].style.display = 'none';
            }
        }
    }
}
closeForm(btnCancel, formTask);

const deleteTask = function (data) {
    let tasks = document.getElementsByClassName('task');
    for (let i = 0; i < tasks.length; i++) {
        let taskAttr = tasks[i].getAttribute('data-id');
        if (data == taskAttr) {
            tasks[i].style.display = 'none';
        }
    }
    modal3.closeModal();
}
formSubmit(formDeleteTask, 'deleteTask', deleteTask);
