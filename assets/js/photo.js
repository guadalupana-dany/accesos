var app = new Vue({

    el: '#app',
    data: {
        video: {},
        canvas: {},
        captures: []
    },
    //alertaasociado 1 = no esta , 0 = entra , 2 = no estra ir a informacion
    methods: {
        
        capture() {
            this.canvas = this.$refs.canvas;
            var context = this.canvas.getContext("2d").drawImage(this.video, 0, 0, 640, 480);
            this.captures.push(canvas.toDataURL("image/png"));
        }
    },
    mounted() {
        
        this.video = this.$refs.video;
        if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
                this.video.src = window.URL.createObjectURL(stream);
                this.video.play();
            });
        }
    },


})