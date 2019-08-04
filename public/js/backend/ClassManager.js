class ClassManager {

	constructor (aClass, element, target) {
		this.aClass = aClass;
		this.element = document.getElementById(element);
		this.target = document.querySelector(target);

		document.addEventListener('DOMContentLoaded', () => {
			this.element.addEventListener('click', () => {
				this.editClass();
			})
		})
	}

	editClass () {
		if (this.target.classList.contains(this.aClass) === true) {
			this.target.classList.remove(this.aClass);
		} else {
			this.target.classList.add(this.aClass);
		}
	}
}

const menu = new ClassManager('view', 'btn-hamburger', 'nav');
const menuFirstBar = new ClassManager('move', 'btn-hamburger', '#b-1');
const menuTwoBar = new ClassManager('move', 'btn-hamburger', '#b-2');
