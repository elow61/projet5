class Slider {
    
    constructor (cible, time) {
        this.image = document.getElementsByClassName(cible);
        this.time = time;
        this.index = 0;

        this.moveSlider();
    }

    changeImage () {
        this.image[this.index].style.display = "none";
        if (this.index < this.image.length - 1) {
            this.index++;
        } else {
            this.index = 0;
        }
        this.image[this.index].style.display = "block";
    }

    moveSlider () {
        setInterval(this.changeImage.bind(this), this.time);
    }

}
const slider = new Slider('slide', 5000);