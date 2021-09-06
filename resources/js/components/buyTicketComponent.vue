<template>
    <div>
        <section class="wrapper bg-light">
            <div class="container pt-10 pt-md-14 pb-0 text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="display-6 mb-3">BOLETO {{ticket}}</h1>
                        <h2 class="display-7 mb-3">INCLUYE:</h2>
                        <p>
                            <a class="ticket-extra" v-for="(extra_ticket, index) in extra_tickets" :key="index">
                                {{extra_ticket}}
                            </a>
                        </p>
                    </div>
                </div>
                <hr class="my-3">
            </div>
        </section>

        <section class="wrapper bg-light">
            <div class="container pt-3 text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="display-7 mb-3">LLENA TUS DATOS Y DA CLICK EN APARTAR</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-label-group mb-4">
                        <input id="textInputExample" v-on:keyup="checkValueWhats" type="number" class="form-control" placeholder="NÚMERO WHATSAPP (10 dígitos)" v-model.number="whatsapp">
                        <label for="textInputExample">NÚMERO WHATSAPP (10 dígitos)</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-select-wrapper">
                        <select class="form-select" aria-label="Default select example" v-model="estado">
                            <option selected="">Estado</option>
                            <option>Chihuahua</option>
                            <option>Estados Unidos</option>
                            <option>Aguascalientes</option>
                            <option>Baja California</option>
                            <option>Baja California Sur</option>
                            <option>Campeche</option>
                            <option>Ciudad de México</option>
                            <option>Coahuila</option>
                            <option>Colima</option>
                            <option>Chiapas</option>
                            <option>Durango</option>
                            <option>Estado de México</option>
                            <option>Guanajuato</option>
                            <option>Guerrero</option>
                            <option>Hidalgo</option>
                            <option>Jalisco</option>
                            <option>Michoacán</option>
                            <option>Morelos</option>
                            <option>Nayarit</option>
                            <option>Nuevo León</option>
                            <option>Oaxaca</option>
                            <option>Puebla</option>
                            <option>Querétaro</option>
                            <option>Quintana Roo</option>
                            <option>San Luis Potosí</option>
                            <option>Sinaloa</option>
                            <option>Sonora</option>
                            <option>Tabasco</option>
                            <option>Tamaulipas</option>
                            <option>Tlaxcala</option>
                            <option>Veracruz</option>
                            <option>Yucatán</option>
                            <option>Zacatecas</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-label-group mb-4">
                        <input id="textInputExample2" type="text" class="form-control" placeholder="Nombre(s)" v-model="nombre" v-on:keyup="upperCaseN()">
                        <label for="textInputExample2">Nombre(s)</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-label-group mb-4">
                        <input id="textInputExample3" type="text" class="form-control" placeholder="Apellido Paterno" v-model="apellido" v-on:keyup="upperCaseA()">
                        <label for="textInputExample3">Apellido Paterno</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-label-group mb-4">
                        <input id="textInputExample4" type="text" class="form-control" placeholder="Apellido Materno" v-model="apellidoM" v-on:keyup="upperCaseAM()">
                        <label for="textInputExample4">Apellido Materno</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mx-auto text-center text-red">
                        {{message}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mx-auto text-center text-blue">
                        Al enviar confirmo que he leído y acepto las <a class="underline" :href="'/bases/' + lottery">BASES DEL SORTEO</a>
                    </div>
                    <div class="col-12 mx-auto text-center text-green">
                        ¡Al finalizar serás redirigido a whatsapp para enviar la información de tu boleto!
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 mx-auto text-center">
                        <!-- <a href="#" class="btn btn-blue rounded-pill mb-2 me-1">ESCOGER MÁS BOLETOS</a> -->
                        <a v-on:click="submit" href="#" class="btn btn-green rounded-pill mb-2 me-1">FINALIZAR Y APARTAR</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mx-auto text-center text-red">
                        El boleto queda apartado por 72 hrs.
                    </div>
                </div>
                <hr class="my-3">
            </div>
        </section>
    </div>

</template>

<script>
export default {
    name: "BuyTicket",
    data() {
        return {
            ticket : 0,
            extra_tickets: [],
            other_tickets : [],
            other_extra_tickets: [],
            whatsapp: '',
            estado: 'Estado',
            nombre: '',
            apellido: '',
            apellidoM: '',
            lottery: null,
            message: ''
        }
    },
    methods: {
        checkValueWhats(){
            if(this.whatsapp.toString().length > 10){
                this.whatsapp = this.whatsapp.toString().slice(0,10)
            }
        },
        upperCaseN(){
            this.nombre = this.nombre.toUpperCase()

            if (/^[a-zA-Z]+$/.test(this.nombre)) {
            } else {
                this.nombre = this.nombre.toString().slice(0,(this.nombre.toString().length - 1))
            }
        },
        upperCaseA(){
            this.apellido = this.apellido.toUpperCase()

            if (/^[a-zA-Z]+$/.test(this.apellido)) {
            } else {
                this.apellido = this.apellido.toString().slice(0,(this.apellido.toString().length - 1))
            }
        },
        upperCaseAM(){
            this.apellidoM = this.apellidoM.toUpperCase()

            if (/^[a-zA-Z]+$/.test(this.apellidoM)) {
            } else {
                this.apellidoM = this.apellidoM.toString().slice(0,(this.apellidoM.toString().length - 1))
            }
        },
        submit(){
            this.message = "";
            this.upperCaseN

            if(this.whatsapp.toString().length == 10){
                if(this.nombre.toString().length > 3){
                    if(this.apellido.toString().length > 3){
                        if(this.estado != "Estado"){
                            axios.post('/save/ticket', {
                                idLottery: this.lottery,
                                ticket: this.ticket,
                                extra_tickets: this.extra_tickets,
                                whatsapp: this.whatsapp,
                                nombre: this.nombre,
                                apellido: this.apellido,
                                apellidoM: this.apellidoM,
                                estado: this.estado,
                            }).then(response => {
                                this.message = "Enviado con exito!";
                                // Redirect
                                setTimeout(() => {
                                    window.location.replace(response.data);
                                }, 1000);
                            }).catch(err => {
                                this.message = err.response.data;
                            })
                        }else{
                            this.message = "Ingrese su estado";
                        }
                    }else{
                        this.message = "Ingrese su apellido";
                    }
                }else{
                    this.message = "Ingrese su nombre";
                }
            }else{
                this.message = "Revise el formato del teléfono";
            }
        }
    },
    created(){
        this.lottery = this.$attrs.lottery;
        this.ticket = this.$attrs.ticket;

        axios.get('/ticket/random', {id : this.lottery}).
            then(response => {
                this.extra_tickets = response.data
            }).catch(error => {
                alert("Tenemos problemas tecnicos, consulte al administrador.")
            })
    }
}
</script>
