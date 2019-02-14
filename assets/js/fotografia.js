var app = new Vue({

    el: '#app',
    data: {
        asociados : [],
        
        id_asociado : 0,

        //datos del asociado
        asociado : [],
        nombre : '',
        id_socio : 0,
        derecho : '',
        foto : '',
        numero : '',
    },
    
    methods: {
        getAsociados(){
            let url = 'controller/search.php?mostrando=listo';
            axios.get(url).then(response => {                    
                   app.asociados = response.data;
            });
        },
        cargar(id){
            this.id_asociado = id;
            let url = 'controller/search.php?mostrandoAsociado='+id;
            axios.get(url).then(response => {                    
                   app.asociado = response.data;
                   app.nombre =   app.asociado[0].nombre;
                   app.id_socio = app.asociado[0].id;
                   app.derecho =  app.asociado[0].derecho;
            });
        },
        cerrarModal(){
            console.log("cerrando")
            this.id_asociado = 0;
        },
        siguiente(id){
            console.log("siguiente ------->"+id)
            $("#exampleModal").modal('hide');
        },

    },
    mounted() {

      
       // this.getAsociados();
        setInterval(function(){
            console.log("listo")
           app.getAsociados();
        },500);

        setTimeout(function(){
            $('#example').DataTable();
        },2000);
    },


})