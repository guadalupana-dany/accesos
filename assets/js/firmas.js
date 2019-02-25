var app = new Vue({

    el: '#app',
    data: {
        asociados: [],

        id_asociado: 0,

        //datos del asociado
        asociado: [],
        nombre: '',
        id_socio: 0,
        derecho: '',
        foto: '',


        //firmas
        firma: [],

        //numero de botador para los que tengan derecho
        numero: '',
        contador: 0,
    },

    methods: {
        getAsociados() {
            let url = 'controller/search.php?mostrandoFirmas=listo';
            console.log("url = " + url);
            axios.get(url).then(response => {
                console.log(response.data)
                app.asociados = response.data;
            });
        },
        entrar(id) {
            this.id_asociado = id;
            let url = 'controller/search.php?ingresoFinal=' + id + '&newNu=' + this.numero;
            console.log('url = ' + url);
            axios.get(url).then(response => {
                app.numero = '';
                app.getAsociados();

            });
        },
        verificarFirmas() {
            let me = this;
            let url = 'controller/search.php?firma=0';

            axios.get(url).then(response => {

                me.firma = response.data;

                if (me.firma.length == 16) {

                    //manda los 20 usuarios a imprimir  UPDATE `firma` SET `estado`=0

                    let url2 = "controller/firmas.php";
                    axios.post(url2, { firmas: me.firma })
                        .then(response1 => {
                            console.log("IMPRIO")
                            console.log(response1.data)
                            me.contador++;
                            window.open('http://10.60.81.32:81/pdf_firmas/print.php?count=' + me.contador, '_blank');
                            //LEVANTO LA URL DE BIENVENIDA
                            me.firma = [];


                        });


                }
            });
        },
        entrarConNumero(id) {


        }
    },
    mounted() {

        this.getAsociados();
        let me = this;


        setInterval(function() {
            me.verificarFirmas();
            me.getAsociados();
            $('#example1').DataTable();
        }, 1000);

        setTimeout(function() {
            // $('#example1').DataTable();
        }, 2000);
    },


})