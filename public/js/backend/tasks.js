let formAddTask = document.getElementsByClassName('form-task');
let containerFormTask = document.getElementsByClassName('container-form-task');
let btnTask = document.getElementsByClassName('btn-add-task');
let btnCancel = document.getElementsByClassName('cancel');
let contentTask = document.getElementsByClassName('task-content'); 
const formDeleteTask = document.getElementById('modal-tasks-delete');
const formUpdateTask = document.getElementById('modal-tasks-update');
let tasks = document.getElementsByClassName('task');
let arrayTasks = [];
arrayTasks.push(tasks);
addAttribute(tasks, 'data-id', 'input-task-delete', 'title-name-task');
addAttribute(tasks, 'data-id', 'input-task-update', 'title-name-task');

// Task form open with button (+tâches)
function openFormToAddTask() {
    for (let i = 0; i < btnTask.length; i++) {
        let attributeId = btnTask[i].getAttribute('data-id');

        for (let j = 0; j < containerFormTask.length; j++) {
            if (containerFormTask[j].style.display === 'none') {
                btnTask[i].addEventListener('click', () => {
                    const formAttr = containerFormTask[j].getAttribute('data-id');
            
                    if (attributeId == formAttr) {
                        containerFormTask[j].style.display = 'block';
                    }
                })
            } else {
                containerFormTask[j].style.display = 'none';
            }
        }
    }
}
closeForm(btnCancel, containerFormTask);
openFormToAddTask();

function createTask(data) {
    let task = document.createElement('div');
    task.classList.add('task');
    task.innerHTML = data.name;
    task.setAttribute('data-id', data.id_task.id);
    task.setAttribute('onclick', 'modal4.viewModal();');
    arrayTasks.push(task);

    addAttribute(task, 'data-id', 'input-task-delete', 'title-name-task');
    addAttribute(task, 'data-id', 'input-task-update', 'title-name-task');

    if (contentTask instanceof HTMLCollection) {
        for (let i = 0; i < contentTask.length; i++) {
            let attribute = contentTask[i].getAttribute('data-id');
            if (attribute == data['list']) {
                contentTask[i].appendChild(task);
            }
        }
    } else {
        contentTask.appendChild(task);
    }

    for (let y = 0; y < containerFormTask.length; y++) {
        containerFormTask[y].style.display = 'none';
    }
}

const deleteTask = function (data) {
    let tasks = document.getElementsByClassName('task');
    for (let i = 0; i < tasks.length; i++) {
        let taskAttr = tasks[i].getAttribute('data-id');
        if (data == taskAttr) {
            tasks[i].style.display = 'none';
        }
    }
    modal4.closeModal();
}

const updateTask = function (data) {
    let tasks = document.getElementsByClassName('task');
    for (let i = 0; i < tasks.length; i++) {
        let taskAttr = tasks[i].getAttribute('data-id');
        if (data['id'] == taskAttr) {
            tasks[i].innerHTML = data.name;
        } else {
        }
    }
    modal4.closeModal();
}

formSubmit(formAddTask, 'addTask', createTask, openFormToAddTask);
formSubmit(formDeleteTask, 'deleteTask', deleteTask);
formSubmit(formUpdateTask, 'updateTask', updateTask);