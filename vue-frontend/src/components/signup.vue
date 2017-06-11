<template>
    <form>
        <div class="form-group">

          <label for="username">Username</label>
          <label class="text-green" v-if="error['name']">{{error['name'][0]}}</label>
          <input type="text" id="username" name="username" class="form-control" v-model="username" />
        </div>
        <div class="form-group">
          <label for="email">email</label>
          <label class="text-green" v-if="error['email']">{{error['email'][0]}}</label>
          <input type="email" id="email" name="email" class="form-control" v-model="email" />
        </div>
        <div class="form-group">

          <label for="password">password</label>
          <label class="text-green" v-if="error['password']">{{error['password'][0]}}</label>
          <input type="password" id="password" name="password" class="form-control" v-model="password" />
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="signup">Signup</button>
        <p class="text-green raleway">{{ message }}</p>
      </form>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        error: '',
        message: '',
        username: '',
        email: '',
        password: ''
      }
    },
    methods: {
      signup() {
        axios.post('http://localhost:8000/api/user',
        { name: this.username, email: this.email, password: this.password },
        { headers: {'X-Requested-With': 'XMLHttpRequest' }})
        .then(
          (response) => this.message = response.data.message
        )
        .catch(
          (error) => this.error = error.response.data
        );
      }
    }
  }

</script>

<style>

</style>
