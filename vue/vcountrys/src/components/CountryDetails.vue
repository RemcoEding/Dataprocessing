<template>
  <div class="details container">
      <router-link to="/country">Back</router-link>
   <h1 class = "page-header">{{country.Name}}
       <span class="pull-right">
           <router-link class="btn btn-primary" v-bind:to="'/editcountry/'+country.Code">Edit</router-link>
           <button class="btn btn-danger" v-on:click="deleteCountry(country.Code)">Delete</button>
        </span>
   </h1>
   <ul class="list-group">
       <li class ="list-group-item">{{country.Code}}</li>
       <li class ="list-group-item">{{country.Name}}</li>
       <li class ="list-group-item">{{country.Continent}}</li>
       <li class ="list-group-item">{{country.Region}}</li>
       <li class ="list-group-item">{{country.SurfaceArea}}</li>
       <li class ="list-group-item">{{country.IndepYear}}</li>
       <li class ="list-group-item">{{country.Population}}</li>
       <li class ="list-group-item">{{country.LifeExpectancy}}</li>
       <li class ="list-group-item">{{country.GNP}}</li>
       <li class ="list-group-item">{{country.GNPOld}}</li>
       <li class ="list-group-item">{{country.LocalName}}</li>
       <li class ="list-group-item">{{country.GovernmentForm}}</li>
       <li class ="list-group-item">{{country.HeadOfState}}</li>
       <li class ="list-group-item">{{country.Capital}}</li>
       <li class ="list-group-item">{{country.Code2}}</li>
   </ul>
  </div>
</template>

<script>
export default {
  name: 'countrydetails',
  data () {
    return {
      country: ''
    }
  },
  methods:{
      fetchCountry(Code){
        this.$http.get('http://localhost/dataprocessing/public/api/country/'+Code)
        .then(function(response){
            this.country = JSON.parse(JSON.stringify(response.body));
        });
      },
      deleteCountry(Code){
          this.$http.delete('http://localhost/dataprocessing/public/api/country/delete/'+Code)
        .then(function(response){
            this.$router.push({path: '/country', query: {alert: 'Country Deleted'}});
        });
      }
  },
  created: function(){
      this.fetchCountry(this.$route.params.Code);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>