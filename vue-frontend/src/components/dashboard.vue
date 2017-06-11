<template>

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="khand"><span class="font150">WIDGET<span class="text-red">DASHBOARD</span></span></h1>
      <p class="lead text-muted">This is the dashboard menu for the widgets</p>

    </div>
    <div>
      <p class="text-green khand">{{ message }}</p>
      <button v-show="showWidgets" class="btn btn-primary" @click="onGetWidgets">Get Widgets</button>
      <div class="row">
        <app-widget v-for="widget in widgets" v-bind:data="widget" v-bind:key="widgets" :w="widget"></app-widget>
      </div>
    </div>
  </section>
</template>

<script>
  import Widget from './widget.vue';
  import axios from 'axios';

  export default{
    data(){
      return {
        name: localStorage.getItem('user'),
        widgets: [],
        showWidgets: true,
        message: ''
      }
    },
    methods: {
      onGetWidgets() {
        this.showWidgets = !this.showWidgets;
        const token = localStorage.getItem('token');
        axios.get('http://localhost:8000/api/widgets?token=' + token )
        .then(
          response => {
            this.message = 'Welcome ' + response.data.user.name + '!';
            this.widgets = response.data.widgets;
          }
        )
        .catch(
          error => {
            this.message = 'Please login to see the widgets!';
            this.showWidgets = false;
          }
        );
      }
    },
    components: {
      'app-widget': Widget
    }
  }
</script>

<style>
.container {
  cursor:auto;
}
</style>
