<template>
    <div class="col-md-4">
    <router-link :to="{path: '/widgets/'+w.name}"><img v-bind:src="imgPath"  width="80" height="80"></router-link>
    <p class="khand">{{ w.name }}</p>

    </div>
</template>

<script>
  import axios from 'axios';

  export default {
    props: ['w'],
    data() {
      return {
        imgPath: this.w.image
      }
    },
    methods: {

    }
  }
</script>

<style scoped>
  a {
    cursor:pointer;
  }
</style>
