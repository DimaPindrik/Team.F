<template>
  <section class="jumbotron">
    <div class="row">
      <div class="col-md-6">
        <app-signup></app-signup>
      </div>
      <div class="col-md-6">
        <app-signin></app-signin>
      </div>
    </div>
  </section>
</template>

<script>
  import axios from 'axios';
  import Signup from './signup.vue';
  import Signin from './signin.vue';

  export default {
    data() {
      return {
        
      }
    },
    methods: {

    },
    components: {
      'app-signup': Signup,
      'app-signin': Signin
    }
  }
</script>
