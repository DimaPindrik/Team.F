<template>
  <div id="app">
    <center>
      <label v-if="logged" class="text-green khand font120"> You're logged in as <span class="text-blue">{{user}}</span></label>
    </center>
    <app-logged-header v-if="logged"></app-logged-header>
    <app-notlogged-header v-else="logged"></app-notlogged-header>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <router-view></router-view>
        </div>
      </div>
    </div>
    <app-footer></app-footer>
  </div>
</template>

<script>
  import axios from 'axios';
  import LoggedHeader from './components/includes/logged-header.vue';
  import NotLoggedHeader from './components/includes/notlogged-header.vue';
  import Footer from './components/includes/footer.vue';

  export default {
    data () {
      return {
        message: '',
        logged: false,
        user: ''
        }
    },
    methods: {
      checkLogin() {
        const token = localStorage.getItem('token');
        axios.get('http://localhost:8000/api/user/loggedin?token=' + token )
        .then(
          response => {
            if (response.data.logged == true){
              this.logged = true;
              this.user = response.data.user.name;
             }
            else {
              this.logged = false; }
           })
        .catch(
          error => { this.logged = false; }
        );
      }
    },
    components: {
      'app-logged-header': LoggedHeader,
      'app-notlogged-header': NotLoggedHeader,
      'app-footer': Footer
    },
    created: function() {
      this.checkLogin();
    }
  }
</script>

<style>
  #app {
    margin: 30px;
    cursor:pointer;
  }
</style>
