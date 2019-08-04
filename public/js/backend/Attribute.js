class Attribute {

	constructor (element, name, target, title) {
		this.element = element;
		this.name = name;
		this.target = document.getElementById(target);
		this.title = document.getElementById(title);

		if (this.element instanceof HTMLCollection) {
			this.addForNodeList();
		} else {
			this.add();
		}
	}

	add () {
		this.element.addEventListener('click', () => {
			const attribute = this.element.getAttribute(this.name);
			this.title.textContent = this.element.textContent;
			this.target.value = attribute;
		});
	}

	addForNodeList () {
		for (let i = 0; i < this.element.length; i++) {
			let attribute = this.element[i].getAttribute(this.name);
			let textHTML = this.element[i].textContent;
			this.element[i].addEventListener('click', () => {
				this.target.value = attribute;
				this.title.textContent = textHTML;
			});
		}
	}
}