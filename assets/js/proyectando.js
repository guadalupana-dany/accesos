var app = new Vue({

    el: '#app',
    data: {
        numero: '',
        asociado: [],
        foto1: 'fotos/',
        nombre1: '',
        cif1: '',
        cronometro: 0,
    },
    //alertaasociado 1 = no esta , 0 = entra , 2 = no estra ir a informacion
    methods: {
        buscarOpinando() {
            this.asociado = [];
            this.foto1 = 'fotos/';
            this.nombre1 = '';
            this.cif1 = '';
            let url = 'controller/search.php?numero=0';


            axios.get(url).then(response => {
                console.log(response.data)
                app.asociado = response.data;
                app.nombre1 = app.asociado[0].nombre;
                app.cif1 = app.asociado[0].cif;
                app.foto1 += app.asociado[0].foto;
                app.numero = '';
                console.log("fot = " + app.foto1)
            });

            console.log(app.foto1)
        },
        buscarNumero() {
            let url = 'controller/search.php?opinion=' + this.numero;
            axios.get(url).then(response => {
                app.buscarOpinando();
            });
        }
    },
    mounted() {
        /*   this.buscarOpinando();
           setInterval(() => {
               app.cronometro ++;
              // if(app.cronometro == 120){
                       app.cronometro = 0;
                       app.buscarOpinando();
            //   }
           }, 1000);
          //108*/
    },


})