class Ajax {
    
    contructor (url, callback) {
        this.url = url;
        this.callback = callback;
    }

    ajaxGet(url, callback) {
        this.url = url;
        this.callback = callback;
        const req = new XMLHttpRequest();
        req.open('GET', this.url);
        req.addEventListener('load', () => {
            if (req.status >= 200 && req.status < 400) {
                this.callback(req.responseText);
            } else {
                console.error(req.status + ' ' + req.statusText + ' ' + this.url);
            }
        });
        req.addEventListener('error', () => {
            console.error("Erreur réseau avec l'URL " + this.url);
        });
        req.send(null);
    }
}
console.log(window.location);
const ajax = new Ajax('window.location.origin + ajax');