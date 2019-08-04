class Slider {
    
    constructor (cible, step) {
        this.image = document.getElementsByClassName(cible);
        this.step = document.getElementsByClassName(step);
        this.index = 0;

        this.touchSlider();
    }

    changeImage () {
        this.image[this.index].style.display = "none";
        this.step[this.index].classList.remove('active');
        
        if ((this.index < this.image.length - 1) && (this.index < this.step.length - 1)) {
            this.index++;
        } else {
            this.index = 0;
        }

        this.image[this.index].style.display = "block";
        this.step[this.index].classList.add('active');
    }

    returnImage () {
        this.image[this.index].style.display = "none";
        this.step[this.index].classList.remove('active');

        if (this.index === 0) {
            this.index = this.image.length -1;
        } else {
            this.index -= 1;
        }
        this.image[this.index].style.display = "block";
        this.step[this.index].classList.add('active');
    } 

    touchSlider () {
        document.addEventListener('keyup', (e) => {
            switch (e.keyCode) {
                case 37:
                    this.returnImage();
                    break;
                case 39:
                    this.changeImage();
                    break;
            };
        });
    }
}
const slider = new Slider('slide', 'step');