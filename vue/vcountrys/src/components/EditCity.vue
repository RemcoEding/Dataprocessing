<template>
  <div class="edit container">
    <Alert v-if="alert" v-bind:message="alert" />
   <h1 class = "page-header">Edit City</h1>
   <form v-on:submit="updatecity">
       <div class="well">
           <h4>City</h4>
           <div class="form-group">
               <label>Name</label>
               <input type="text" class="form-control" placeholder="Name" v-model="city.Name">
           </div>
           <div class="form-group">
               <label>CountryCode</label>
               <input type="text" class="form-control" placeholder="CountryCode" v-model="city.CountryCode">
           </div>
           <div class="form-group">
               <label>District</label>
               <input type="text" class="form-control" placeholder="District" v-model="city.District">
           </div>
           <div class="form-group">
               <label>Population</label>
               <input type="text" class="form-control" placeholder="Population" v-model="city.Population">
           </div>
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Submit</button>
   </form>
  </div>
</template>

<script>
import Alert from './Alert'
export default {
  name: 'add',
  data () {
    return {
      city: {},
      alert:''
    }
  },
  methods: {
      fetchcity(ID){
          this.$http.get('http://localhost/dataprocessing/public/api/city/'+ID)
        .then(function(response){
            this.city = JSON.parse(JSON.stringify(response.body));
        });
      },
      updatecity(e){
          if(!this.city.Name || !this.city.CountryCode || !this.city.District || !this.city.Population){
              this.alert = 'Please fill in all required fields';
          } else {
              let updatecity = {
                Name: this.city.Name,
                CountryCode: this.city.CountryCode,
                District: this.city.District,
                Population: this.city.Population
              }
              this.$http.put('http://localhost/dataprocessing/public/api/city/update/'+this.$route.params.ID, updatecity)
                .then(function(response){
                    this.$router.push({path: '/city', query: {alert: 'City Updated'}});
                });
              e.preventDefault();
          }
          e.preventDefault();
      }
  },
  created: function(){
      this.fetchcity(this.$route.params.ID);
  },
  components:{
      Alert
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>