var app = new Vue({

    el: '#app',
    data: {
        asociado: [],
        cif : '',
        nombre : '',
        buscarpor : 1,
        messageBuscar : '',
        alertnoasociado : 0,
    },
    //alertaasociado 1 = no esta , 0 = entra , 2 = no estra ir a informacion
    methods: {
        buscar() {
            this.alertnoasociado = 0;
            let url = 'controller/search.php?';
            //buscar por cif
            if(this.buscarpor == 1){
                if(!this.cif.length){
                    this.messageBuscar = 'DEBE DE INGRESAR NUMERO DE CIF';
                    return;
                }
                url += 'cif='+this.cif;
            }
            //buscara por nombre
            if(this.buscarpor == 2){
                if(!this.nombre.length){
                    this.messageBuscar = 'DEBE DE INGRESAR NOMBRE';
                    return;
                }
                url += 'nombre='+this.nombre.toLowerCase();
            }
            //limpia los datos
            this.messageBuscar = '';
            this.buscarpor = 1;
            this.nombre = '';
            this.cif = '';

             axios.get(url).then(response => {
                app.asociado = response.data;
                if(app.asociado.length){

                }else{
                    //si el asociado no exite
                    app.alertnoasociado = 1;
                }
            })
        },
        ingresar(id) {

            let url = 'controller/search.php?id=' + id;
            axios.get(url).then(response => {
                    
                    if(response.data.error == "NO"){
                        console.log("vaciar")
                        app.asociado = [];

                    }else{
                        alert("Algo salio mal")
                    }
            });
        },
    },
    mounted() {

    },


})