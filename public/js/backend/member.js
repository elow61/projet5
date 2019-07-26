// Add attribute for remove a member
let img = document.getElementsByClassName('img-min');
for (let i = 0; i < img.length; i++) {
    var getId = img[i].getAttribute('data-id');
    var getMain = img[i].getAttribute('data-main');

    img[i].addEventListener('click', () => {
        var inputIdMember = document.getElementById('input-id-member');
        var inputIdMain = document.getElementById('input-id-main');
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
formSubmit(formDeleteMember, 'removeMember', deleteMember);