<template>
  <section class="jumbotron">
    <button class="btn btn-primary" @click="onGetQuotes">Get Messages</button>
    <app-quote v-for="quote in quotes" v-bind:data="quote" v-bind:key="quotes" :qt="quote" @quoteDeleted="onQuoteDeleted($event)"></app-quote>
  </section>
</template>


<script>
  import Quote from './quote.vue';
  import axios from 'axios';

  export default {
    data() {
      return {
          quotes: []
      }
    },
    methods: {
      onGetQuotes() {
        axios.get('http://localhost:8000/api/quotes')
        .then(
          response => {
            this.quotes = response.data.quotes;
          }
        )
        .catch(
          error => console.log(error)
        );
      },
      onQuoteDeleted(id) {
        const position = this.quotes.findIndex((element) => {
          return element.id == id;
        });
        this.quotes.splice(position,1);
      }
    },
    components: {
      'app-quote': Quote
    }
  }
</script>
