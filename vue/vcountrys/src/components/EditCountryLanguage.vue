<template>
  <div class="edit container">
    <Alert v-if="alert" v-bind:message="alert" />
   <h1 class = "page-header">Edit Country Language</h1>
   <form v-on:submit="updatecountrylanguage">
       <div class="well">
           <h4>Country Language</h4>
           <div class="form-group">
               <label>CountryCode</label>
               <input type="text" class="form-control" placeholder="CountryCode" v-model="countrylanguage.CountryCode">
           </div>
           <div class="form-group">
               <label>Language</label>
               <input type="text" class="form-control" placeholder="Language" v-model="countrylanguage.Language">
           </div>
           <div class="form-group">
               <label>IsOfficial (T/F)</label>
               <input type="text" class="form-control" placeholder="IsOfficial" v-model="countrylanguage.IsOfficial">
           </div>
           <div class="form-group">
               <label>Percentage</label>
               <input type="text" class="form-control" placeholder="Percentage" v-model="countrylanguage.Percentage">
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
      countrylanguage: {},
      alert:''
    }
  },
  methods: {
      fetchcountrylanguage(ID){
          this.$http.get('http://localhost/dataprocessing/public/api/countrylanguage/'+ID)
        .then(function(response){
            this.countrylanguage = JSON.parse(JSON.stringify(response.body));
        });
      },
      updatecountrylanguage(e){
          if(!this.countrylanguage.CountryCode || !this.countrylanguage.Language || !this.countrylanguage.IsOfficial || !this.countrylanguage.Percentage){
              this.alert = 'Please fill in all required fields';
          } else {
              let updatecountrylanguage = {
                CountryCode: this.countrylanguage.CountryCode,
                Language: this.countrylanguage.Language,
                IsOfficial: this.countrylanguage.IsOfficial,
                Percentage: this.countrylanguage.Percentage
              }
              this.$http.put('http://localhost/dataprocessing/public/api/countrylanguage/update/'+this.$route.params.ID, updatecountrylanguage)
                .then(function(response){
                    this.$router.push({path: '/countrylanguage', query: {alert: 'Countrylanguage Updated'}});
                });
              e.preventDefault();
          }
          e.preventDefault();
      }
  },
  created: function(){
      this.fetchcountrylanguage(this.$route.params.ID);
  },
  components:{
      Alert
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>