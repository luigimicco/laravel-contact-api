import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// Componenti
import HomePage from './pages/Homepage.vue';
import ContactPage from './pages/ContactPage.vue';
import NotFoundPage from './pages/NotFoundPage.vue';

// Rotte
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: '/', component: HomePage, name: 'home' },
        { path: '/contacts', component: ContactPage, name: 'contacts' },

        // pagina 404 
        { path: '*', component: NotFoundPage, name: 'not-found' }
    ]
});

export default router;