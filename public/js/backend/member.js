// Add attribute for remove a member
let img = document.getElementsByClassName('img-min');
for (let i = 0; i < img.length; i++) {
    let getId = img[i].getAttribute('data-id');
    let getMain = img[i].getAttribute('data-main');

    img[i].addEventListener('click', () => {
        let inputIdMember = document.getElementById('input-id-member');
        let inputIdMain = document.getElementById('input-id-main');
        inputIdMember.value = getId;
        inputIdMain.value = getMain;
    })
}

const deleteMember = function (data) {
    for (let i = 0; i < img.length; i++) {
        var getId = img[i].getAttribute('data-id');
        if (data['id-member'] == getId) {
            img[i].classList.add('bye');
        }
    }
    modalMember.closeModal();
}
const formDeleteMember = document.getElementById('form-delete-member');
const removeMember = new Submit(formDeleteMember, 'removeMember', deleteMember);