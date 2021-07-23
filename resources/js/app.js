import { createApp } from 'vue';
import CarouselComponent from  './components/carouselComponent';

require('./bootstrap');

require('alpinejs');



 const app = createApp({
    components: {
		CarouselComponent,
	}
}).mount('#app');

