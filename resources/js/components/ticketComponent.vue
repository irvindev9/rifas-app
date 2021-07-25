<template>
    <div>
        <div class="row">
            <div class="col-10 col-md-8 col-lg-6 mx-auto">
                <h3 class="mb-3 align-center">O BUSCA TU NUMERO AQUÍ:</h3>
                <div class="form-label-group mb-4">
                    <input id="textInputExample" v-on:keyup="checkValue" type="text" class="form-control" placeholder="Número de boleto (4 cifras)" v-model.number="searchNumber">
                  <label for="textInputExample">Número de boleto (4 cifras)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 mx-auto ticket-container">
                <span class="ticket" v-for="item in 3333" :key="item" :class="{filled : (buyedTickets.includes(item))}" v-show="isFinded(item)">
                    <a :href="'/ticket/1/' + fillZero(item)" v-if="!buyedTickets.includes(item)">{{fillZero(item)}}</a>
                    <label for="ticket" v-else>{{fillZero(item)}}</label>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ticket-component',
        data() {
            return {
                buyedTickets : [
                    1,
                    2,
                    3,
                    200,
                    1000
                ],
                searchNumber : 0
            }
        },
        methods: {
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
                console.log(this.searchNumber.toString().length)
                if(this.searchNumber.toString().length > 4){
                    this.searchNumber = this.searchNumber.toString().slice(0,4)
                }
            }
        }
    }

</script>
