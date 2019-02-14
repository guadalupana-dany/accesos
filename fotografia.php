<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <title>FOTOGRAFIA</title>
    
</head>
<body>
<div id="app">
        <center>
        <img src="assets/img/micoope1.png" class="img-responsive" style="width: 50%;height: 200px;"> 
        </center>
        <div class="container">
                    <table id="example" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cif</th>
                                    <th>Nombre</th>
                                    <th>Agencia</th>
                                    <th>Derecho</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="aso in asociados" :key="aso.id">
                                    <td v-text="aso.cif"></td>
                                    <td v-text="aso.nombre"></td>
                                    <td v-text="aso.areaFinanciera"></td>
                                    <template v-if="aso.derecho == 'VERDE'">
                                        <td ><span class="badge badge-pill badge-success">{{ aso.derecho }}</span></td>
                                    </template>
                                    <template v-else>
                                        <td ><span class="badge badge-pill badge-danger">{{ aso.derecho }}</span></td> 
                                    </template>
                                    
                                    <td>
                                        <button type="button" class="btn btn-info" @click="cargar(aso.id)" data-toggle="modal" data-target="#exampleModal">
                                          tomar Foto
                                        </button>
                                    </td>
                                </tr>
                            </thead>
                    </table>
        </div>

                    <div class="modal fade" id="exampleModal" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tomar Foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cerrarModal">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Nombre: {{ nombre }}</h6>
                                <h6>Derecho : {{ derecho }}</h6>
                                <div v-if="derecho == 'VERDE'">
                                
                                    <h6>Numero:</h6>
                                    <input type="number" class="form-control">
                                
                                </div>
                                <h6>Subir Foto</h6>
                                <input type="file" v-model="foto">

                                <img src="foto" alt="">
                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"  @click="cerrarModal">Cerrar</button>
                                <button type="button" class="btn btn-primary" @click="siguiente(id_socio)">Siguiente</button>
                            </div>
                            </div>
                        </div>
                    </div>

</div>
</body>
<script src="assets/js/jquery-3.3.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/vue.js"></script>
<script src="assets/js/axios.min.js"></script>
<script src="assets/js/fotografia.js"></script>
</html>