// The form's management to add a list
const form = document.getElementById('form');
const formDelete = document.getElementById('form-delete');
let btnRemoved = document.getElementsByClassName('remove-list');
const container = document.getElementById('container-list');
const btnAddList = document.getElementsByClassName('add-list');

// Add the value for the input
for (let i = 0; i < btnRemoved.length; i++) {
    let attribute = btnRemoved[i].getAttribute('data-id');

    btnRemoved[i].addEventListener('click', () => {
        const inputTitle = document.getElementById('input-list');
        inputTitle.value = attribute;
    })
}

const createList = function (data) {

    const list = document.createElement('div');
    list.classList.add('list');
    list.setAttribute('data-id', data.id);

    const containerTitle = document.createElement('div');
    containerTitle.classList.add('title-list');

    const title = document.createElement('h2');
    title.textContent = data.success;

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
    // Button placement
    for (let i = 0; i < btnAddList.length; i++) {
        container.insertBefore(list, btnAddList[i]);
    }

    // Create the form for add a task
    const formTask = document.createElement('div');
    formTask.classList.add('container-form-task');
    formTask.setAttribute('data-id', data.id);
    const formPost = document.createElement('form');
    formPost.method = 'POST';
    formPost.classList.add('form-task');
    const inputNameList = document.createElement('input');
    inputNameList.type = 'hidden';
    inputNameList.name = 'name_list';
    inputNameList.id = 'name_list';
    const inputIdList = document.createElement('input');
    inputIdList.type = 'hidden';
    inputIdList.name = 'id_list';
    inputIdList.classList.add('input_id_list');
    inputIdList.id = 'id_list';
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

    // add btn tasks
    const containerTask = document.createElement('div');
    containerTask.classList.add('container-task');

    const btnTask = document.createElement('div');
    btnTask.classList.add('btn-add-task');
    btnTask.setAttribute('data-id', data.id);
    // btnTask.setAttribute('onclick', 'formTaskAction(btnTask);');
    btnTask.textContent = '+ tâches';
    containerTask.appendChild(btnTask);
    btnTask.addEventListener('click', () => {
        formTask.style.display = 'block';
    })

    list.appendChild(containerTitle);
    list.appendChild(containerTask);
    containerTask.appendChild(formTask);
    containerTitle.appendChild(title);
    containerTitle.appendChild(btnRemove);
    formTask.appendChild(formPost);
    formPost.appendChild(inputNameList);
    formPost.appendChild(inputIdList);
    formPost.appendChild(texts);
    formPost.appendChild(containerBtn);
    containerBtn.appendChild(btnSubmit);
    containerBtn.appendChild(btnCancel);
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
