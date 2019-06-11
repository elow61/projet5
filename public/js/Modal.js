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