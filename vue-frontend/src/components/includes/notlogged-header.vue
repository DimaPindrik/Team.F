<template>
  <nav class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand"><span class="khand">Widget-Dashboard Project</span></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/quotes">Message board</router-link></li>
        <li><router-link to="/new-quote">Write a message</router-link></li>
        <li><router-link to="/dashboard">Dashboard</router-link></li>
      </ul>
    </div>
  </nav>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {

      }
    },
    methods: {
      logout() {
        const token = localStorage.getItem('token');
        axios.post('http://localhost:8000/api/user/logout?token=' + token)
        .then(
          (response) => {
            this.$router.push('/');
          }
        )
        .catch(
          (error) => console.log(error)
        );
      }
    }
  }
</script>
