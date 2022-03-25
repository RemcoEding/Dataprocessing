<template>
  <div class="details container">
      <router-link to="/countrylanguage">Back</router-link>
   <h1 class = "page-header">{{countrylanguage.CountryCode}}
       <span class="pull-right">
           <router-link class="btn btn-primary" v-bind:to="'/editcountrylanguage/'+countrylanguage.ID">Edit</router-link>
           <button class="btn btn-danger" v-on:click="deletecountrylanguage(countrylanguage.ID)">Delete</button>
        </span>
   </h1>
   <ul class="list-group">
       <li class ="list-group-item">{{countrylanguage.CountryCode}}</li>
       <li class ="list-group-item">{{countrylanguage.Language}}</li>
       <li class ="list-group-item">{{countrylanguage.IsOfficial}}</li>
       <li class ="list-group-item">{{countrylanguage.Percentage}}</li>
   </ul>
  </div>
</template>

<script>
export default {
  name: 'countrylanguagedetails',
  data () {
    return {
      countrylanguage: ''
    }
  },
  methods:{
      fetchcountrylanguage(ID){
        this.$http.get('http://localhost/dataprocessing/public/api/countrylanguage/'+ID)
        .then(function(response){
            this.countrylanguage = JSON.parse(JSON.stringify(response.body));
        });
      },
      deletecountrylanguage(ID){
          this.$http.delete('http://localhost/dataprocessing/public/api/countrylanguage/delete/'+ID)
        .then(function(response){
            this.$router.push({path: '/countrylanguage', query: {alert: 'Countrylanguage Deleted'}});
        });
      }
  },
  created: function(){
      this.fetchcountrylanguage(this.$route.params.Code);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>