import { createApp } from 'vue';
import CarouselComponent from  './components/carouselComponent';
import TicketComponent from  './components/TicketComponent';

require('./bootstrap');

require('alpinejs');



 const app = createApp({
    components: {
		CarouselComponent,
        TicketComponent
	}
}).mount('#app');
