<template>
  <div class="details container">
      <router-link to="/city">Back</router-link>
   <h1 class = "page-header">{{city.CountryCode}}
       <span class="pull-right">
           <router-link class="btn btn-primary" v-bind:to="'/editcity/'+city.ID">Edit</router-link>
           <button class="btn btn-danger" v-on:click="deletecity(city.ID)">Delete</button>
        </span>
   </h1>
   <ul class="list-group">
       <li class ="list-group-item">{{city.Name}}</li>
       <li class ="list-group-item">{{city.CountryCode}}</li>
       <li class ="list-group-item">{{city.District}}</li>
       <li class ="list-group-item">{{city.Population}}</li>
   </ul>
  </div>
</template>

<script>
export default {
  name: 'citydetails',
  data () {
    return {
      city: ''
    }
  },
  methods:{
      fetchcity(ID){
        this.$http.get('http://localhost/dataprocessing/public/api/city/'+ID)
        .then(function(response){
            this.city = JSON.parse(JSON.stringify(response.body));
        });
      },
      deletecity(ID){
          this.$http.delete('http://localhost/dataprocessing/public/api/city/delete/'+ID)
        .then(function(response){
            this.$router.push({path: '/city', query: {alert: 'City Deleted'}});
        });
      }
  },
  created: function(){
      this.fetchcity(this.$route.params.ID);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>