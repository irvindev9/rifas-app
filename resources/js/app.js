import { createApp } from 'vue';
import ExampleComponent from  './components/example';

require('./bootstrap');

require('alpinejs');


createApp({
    components: {
		ExampleComponent,
	}
}).mount('#app');
