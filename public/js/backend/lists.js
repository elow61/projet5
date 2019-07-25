// The form's management to add a list
const form = document.getElementById('form');
const formDelete = document.getElementById('form-delete');
let btnRemoved = document.getElementsByClassName('remove-list');
const container = document.getElementById('container-list');
const btnAddList = document.getElementsByClassName('add-list');
let arrLists = [];

// Add attribute for the removed Button
for (let i = 0; i < btnRemoved.length; i++) {
    let attribute = btnRemoved[i].getAttribute('data-id');

    btnRemoved[i].addEventListener('click', () => {
        let inputTitle = document.getElementById('input-list');
        inputTitle.value = attribute;
    })
}

const createList = function (data) {
    // lists
    const list = document.createElement('div');
    list.classList.add('list');
    list.setAttribute('data-id', data.id);

    // Title list
    const containerTitle = document.createElement('div');
    containerTitle.classList.add('title-list');
    const title = document.createElement('h2');
    title.textContent = data.success;

    // Button add list placement
    for (let i = 0; i < btnAddList.length; i++) {
        container.insertBefore(list, btnAddList[i]);
    }

    // Button delete a list
    const btnRemove = document.createElement('div');
    btnRemove.classList.add('remove-list');
    btnRemove.classList.add('btn-list');
    btnRemove.setAttribute('onclick', 'modal2.viewModal();');
    btnRemove.setAttribute('data-id', data.id);
    const attribute = btnRemove.getAttribute('data-id');
    btnRemove.addEventListener('click', () => {
        const inputTitle = document.getElementById('input-list');
        inputTitle.value = attribute;
    })
    
    // Container manager task
    const firstContainerTask = document.createElement('div');
    firstContainerTask.classList.add('container-task');

    // Container form for add a task
    const containerFormTask = document.createElement('div');
    containerFormTask.classList.add('container-form-task');
    containerFormTask.setAttribute('data-id', data.id);

    // Container only task
    const contentTask = document.createElement('div');
    contentTask.classList.add('task-content');
    contentTask.setAttribute('data-id', data.id);

    // Form
    const formPost = document.createElement('form');
    formPost.method = 'POST';
    formPost.classList.add('form-task');
    const inputNameList = document.createElement('input');
    inputNameList.type = 'hidden';
    inputNameList.name = 'name_list';
    // inputNameList.id = 'name_list';
    const inputIdList = document.createElement('input');
    inputIdList.type = 'hidden';
    inputIdList.name = 'input_id_list';
    inputIdList.classList.add('input_id_list');
    // inputIdList.id = 'id_list';
    inputIdList.value = data.id;
    const texts = document.createElement('textarea');
    texts.name = 'name_task';
    texts.cols = '30';
    texts.rows = '5';
    const containerBtn = document.createElement('div');
    containerBtn.classList.add('container-button');
    const btnSubmit = document.createElement('button');
    btnSubmit.type = 'submit';
    btnSubmit.textContent = 'Nouvelle tâche';
    const btnCancel = document.createElement('button');
    btnCancel.type = 'button';
    btnCancel.classList.add('cancel');
    btnCancel.textContent = 'X';

    // Button "+ taches"
    const btnTask = document.createElement('div');
    btnTask.classList.add('btn-add-task');
    btnTask.setAttribute('data-id', data.id);
    btnTask.textContent = '+ tâches';
    btnTask.addEventListener('click', () => {
        containerFormTask.style.display = 'block';
    })

    list.appendChild(containerTitle);
    list.appendChild(firstContainerTask);
    containerTitle.appendChild(title);
    containerTitle.appendChild(btnRemove);

    firstContainerTask.appendChild(contentTask);
    firstContainerTask.appendChild(containerFormTask);
    firstContainerTask.appendChild(btnTask);

    containerFormTask.appendChild(formPost);
    formPost.appendChild(inputNameList);
    formPost.appendChild(inputIdList);
    formPost.appendChild(texts);
    formPost.appendChild(containerBtn);

    containerBtn.appendChild(btnSubmit);
    containerBtn.appendChild(btnCancel);
    openFormToAddTask();
    closeForm(btnCancel, containerFormTask);
    arrLists.push(list);
    formSubmit(formPost, 'addTask', createTask, openFormToAddTask);
    modal.closeModal();
}

const deleteList = function (data) {
    let list = document.getElementsByClassName('list');
        for (let i = 0; i < list.length; i++) {
            let attrList = list[i].getAttribute('data-id');
            if (data == attrList) {
                list[i].animate([
                    {transform: 'translateY(0px)'},
                    {transform: 'translateY(-800px)'}
                ], {
                    duration: 1000,
                    easeing: 'ease'
                });
                list[i].style.display = 'none';
            }
        }
        modal2.closeModal();
}

formSubmit(form, 'lists', createList);
formSubmit(formDelete, 'removeLists', deleteList);
