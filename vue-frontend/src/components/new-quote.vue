<template>
  <section class="jumbotron">
    <form @submit.prevent="onSubmitted">
      <div class="form-group">
        <label for="content">Content:</label>
        <input type="text" id="content" class="form-control" v-model="quoteContent">
      </div>
      <button class="btn btn-primary" type="submit">Submit</button>
      <center><p class="text-green khand font150">{{ message }}</p></center>
    </form>
  </section>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        error: '',
        message: '',
        quoteContent: ''
      }
    },
    methods: {
      onSubmitted() {
        const token = localStorage.getItem('token'); // Get user token
        axios.post('http://localhost:8000/api/quote?token=' + token,
         { content: this.quoteContent })
         .then(
          (response) => this.message = response.data.message
          )
          .catch(
          (error) => this.message = 'Please login to create message!'
        );
      }
    }
  }
</script>
