// Modal

class Modal {
    

    constructor (dialog, attribute) {
        this.dialog = document.getElementById(dialog);
        this.attribute = attribute;

        this.clickWindow();
    }

    viewModal () {
        if(this.attribute !== false) {
            this.dialog.setAttribute(this.attribute, false);
        } else {
            this.dialog.setAttribute(this.attribute, true);
        }
    }

    closeModal () {
        this.dialog.setAttribute(this.attribute, true);
    }

    clickWindow () {
        window.addEventListener('click', (e) => {
            if (e.target === this.dialog) {
                this.closeModal();
            }
        })
    }
}
const modal = new Modal('dialog', 'aria-hidden');
const modal2 = new Modal('dialog2', 'aria-hidden');
const modal3 = new Modal('dialog3', 'aria-hidden');
const modal4 = new Modal('dialog4', 'aria-hidden');
const modalInvit = new Modal('dialog5', 'aria-hidden');
const modalMember = new Modal('dialog-member', 'aria-hidden');