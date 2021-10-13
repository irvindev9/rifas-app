<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h3 class="mb-3 align-center">O BUSCA TU NUMERO AQUÍ:</h3>
            </div>
            <div class="col-10 col-md-8 col-lg-5">
                <div class="form-label-group mb-4">
                    <input id="textInputExample" v-on:keyup="checkValue" type="text" class="form-control" :placeholder="'Número de boleto (' + cifras + ' cifras)'" v-model.number="searchNumber">
                    <label for="textInputExample">Número de boleto ({{cifras}} cifras)</label>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-2 CONTAINER-BTN">
                <a v-on:click="checkTicket" href="#!" class="btn btn-blue rounded-pill mb-2 me-1 BTN-FIND">BUSCAR</a>
            </div>
            <div class="col-12 mt-2 text-center" v-if="!available && available2">
                <a v-on:click="addextraTickets" href="#!" class="btn btn-green rounded-pill mb-2 me-1">Boleto disponible, click para comprar!</a>
            </div>
            <div class="col-12 mt-2 text-center" v-if="available">
                <a href="#!" class="text-red mb-2 me-1 text-center">No disponible, intenta con otro!</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 mx-auto ticket-container text-center mb-1">
                <span class="ticket">
                    <a>&nbsp;</a>
                </span>
                 Disponible
                <span class="ticket filled">
                    <a>&nbsp;</a>
                </span>
                 Vendido
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 mx-auto ticket-container">
                <span class="ticket" v-for="item in numberTickets" :key="item" :class="{filled : (buyedTickets.includes(item))}" v-show="isFinded(item)">
                    <a :href="'/ticket/' + idLotto + '/' + fillZero(item)" v-if="!buyedTickets.includes(item)">{{fillZero(item)}}</a>
                    <label for="ticket" v-else>{{fillZero(item)}}</label>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'ticket-component',
        data() {
            return {
                idLotto : 1,
                buyedTickets : [],
                searchNumber : '',
                available : false,
                available2 : false,
                numberTickets : 0,
                cifras: 4
            }
        },
        methods: {
             checkTicket(){
                this.available2 = true
                axios.post('/api/checkTicket',{
                    idLottery: this.idLotto,
                    ticket: this.searchNumber
                })
                .then(res => {
                    this.available = false
                })
                .catch(err => {
                    console.log(err)
                    this.available = true
                })
            },
            addextraTickets(){
                window.location.href = "/ticket/"+this.idLotto+"/"+this.searchNumber;
            },
            fillZero(string){
                const numZeroes = 4 - string.toString().length + 1;
                if (numZeroes > 0) {
                    return Array(+numZeroes).join("0") + string;
                }
                return string
            },
            isFinded(number){
                if(this.searchNumber == 0 || this.searchNumber == ''){
                    return true
                }
                return (this.searchNumber+'').includes(number.toString());
            },
            checkValue(){
                if(this.searchNumber.toString().length > 4){
                    this.searchNumber = this.searchNumber.toString().slice(0,4)
                }
            }
        },
        created(){
            this.numberTickets = parseInt(this.$attrs.numbertickets);

            if(this.numberTickets == 10000){
                this.cifras = 5;
            }

            this.idLotto = this.$attrs.idlotto;


            axios.post('/get_ticket_buyed', {
                lottery_id : this.idLotto
            }).then(response => {
                this.buyedTickets = response.data
            }).catch(err => {
                console.log(err)
            })
        }
    }

</script>

<style lang="scss">
.CONTAINER-BTN {
    text-align: center;
    @media (min-width: 768px) {
        text-align: left;
    }
}

</style>
