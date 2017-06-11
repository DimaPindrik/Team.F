<template>
  <form>
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
        <button type="submit" class="btn btn-primary" @click.prevent="signin">Signin</button>
        <label v-if="error['error']" class="col-md-offset-3 text-green">{{ error['error'] }}</label>
  </form>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        error: '',
        email: '',
        password: ''
      }
    },
    methods: {
      signin() {
        axios.post('http://localhost:8000/api/user/signin',
        { email: this.email, password: this.password },
        { headers: {'X-Requested-With': 'XMLHttpRequest' }})
        .then(
          (response) => {
            const name = response.data.name;
            const token = response.data.token;
            const base64URL = token.split('.')[1];
            const base64 = base64URL.replace('-','+').replace('_','/');
            console.log(JSON.parse(window.atob(base64)));
            localStorage.setItem('token',token);
            localStorage.setItem('user',name);
            setTimeout(function () {
                        location.reload(true)
                    }, 1)
            this.$router.push('/dashboard');

          }
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
