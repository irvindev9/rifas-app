import { createApp } from 'vue';
import CarouselComponent from  './components/carouselComponent';
import TicketComponent from  './components/TicketComponent';
import buyTicketComponent from  './components/buyTicketComponent';
require('./bootstrap');

require('alpinejs');



 const app = createApp({
    components: {
		CarouselComponent,
        TicketComponent,
        buyTicketComponent
	}
});

app.mount('#app')

