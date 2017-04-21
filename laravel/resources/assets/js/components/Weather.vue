<template>
  <div class="weather">
    <div class="container">
      <section class="panel">
          <input type="text" class="form-control" placeholder="Enter Location ..." v-model="location"/>
          <ul>
            <li>Description: {{ description }}</li>
            <li>Temperature: {{ temperature }}</li>
            <li>Humidity: {{ humidity }}</li>
          </ul>
      </section>
    </div>
  </div>

</template>

<script>

  export default {
    data() {
      return {
        location: '',
        humidity: '',
        temperature: '',
        description: ''
      }
    },
    watch: {
        location: function() {
          this.description = ''
          this.humidity = ''
          this.temperature =''
          if (this.location != ''){
            this.lookupBylocation()
          }
        }
    },
    methods: {
      lookupBylocation: _.debounce( function() {
        var vm = this
        var apikey = 'f24447722c05d531229018c2c64e6c13'
        vm.byLocation = "Searching ..."
        axios.get('http://api.openweathermap.org/data/2.5/weather?q='+vm.location+ '&units=metric' +'&appid='+apikey)
              .then(function (response) {
                vm.description = response.data.weather[0].description
                vm.temperature = response.data.main.temp
                vm.humidity = response.data.main.humidity
              })
              .catch(function (error) {
                vm.description = "Invalid city name"
              })
      }, 500)
    }
}
</script>

<style scoped>
.container {
	width: 80%;
	margin: 1em auto 3em;
}
.panel, li {
  list-style-type: none;
  padding: 2px;
  border-radius: 5px;
  font-weight: 600;
	background-color: coral;
}
</style>
