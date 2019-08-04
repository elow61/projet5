class Submit {
	
	constructor (form, url, fCreate) {
		this.form = form;
		this.url = url;
        this.fCreate = fCreate;
		if (this.form instanceof HTMLCollection) {
			this.getForms();
		} else {
			this.getForm();
		}
	}

	getForms () {
		for (let i = 0; i < this.form.length; i++) {
			this.openForm();
			this.form[i].addEventListener('submit', (e) => {
				e.preventDefault();
				const element = new FormData(this.form[i]);
				this.ajax(element);
			})
		}
	}

	getForm () {
		this.form.addEventListener('submit', (e) => {
			e.preventDefault();
			const element = new FormData(this.form);
			this.ajax(element);
		})
	}

	openForm () {
        openFormToAddTask();
	}

	create (data) {
		this.fCreate(data);
	}

	ajax (element) {
		ajaxPost(this.url, element, (response) => {
			const data = JSON.parse(response);
			if (data['error']) {
				const errorsKey = Object.keys(data);
				for (let j = 0; j < errorsKey.length; j++) {
					let key = errorsKey[j];
					let error = data[key];
					alert(error);
				}
			} else {
				this.create(data);
			}
		})
	}
}