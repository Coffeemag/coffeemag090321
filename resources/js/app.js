require('./bootstrap');

require('alpinejs');



import { createApp } from 'vue'
import AttributeValues from './components/AttributeValues.vue'
import CreatePost from './components/CreatePost.vue'
const app = createApp({});
app.component('attribute-values', AttributeValues);
app.component('create-post', CreatePost );
app.mount('#app');


