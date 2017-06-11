import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'

import Quotes from './components/quotes.vue'
import NewQuote from './components/new-quote.vue'
import Homepage from './components/homepage.vue'
import Dashboard from './components/dashboard.vue'
import Weather from './components/widgets/weather.vue'
import Todolist from './components/widgets/todolist.vue'
import Gallery from './components/widgets/gallery.vue'
import Wikipedia from './components/widgets/wikipedia.vue'
import Shopping from './components/widgets/shopping.vue'
import Banana from './components/widgets/banana.vue'

Vue.use(VueRouter);

const routes = [
  {path: '/quotes', component: Quotes},
  {path: '/new-quote', component: NewQuote},
  {path: '/', component: Homepage},
  {path: '/dashboard', component: Dashboard},
  {path: '/widgets/weather', component: Weather},
  {path: '/widgets/todo list', component: Todolist},
  {path: '/widgets/wikipedia', component: Wikipedia},
  {path: '/widgets/shopping', component: Shopping},
  {path: '/widgets/banana', component: Banana}
];

const router = new VueRouter({
  mode:'history',
  routes: routes
});

new Vue({
  el: '#app',
  router: router,
  render: h => h(App)
})
