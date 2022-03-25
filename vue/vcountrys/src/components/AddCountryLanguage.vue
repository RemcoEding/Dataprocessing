<template>
  <div class="addcountrylanguage container">
      <Alert v-if="alert" v-bind:message="alert" />
   <h1 class = "page-header">Add Country Language</h1>
   <form v-on:submit="addcountrylanguage">
       <div class="well">
           <h4>Country language</h4>
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
               <input type="text" class="form-control" placeholder="IsOfficial (T/F)" v-model="countrylanguage.IsOfficial">
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
  name: 'addcountrylanguage',
  data () {
    return {
      countrylanguage: {},
      alert:''
    }
  },
  methods: {
      addcountrylanguage(e){
          if(!this.countrylanguage.CountryCode || !this.countrylanguage.Language || !this.countrylanguage.IsOfficial || !this.countrylanguage.Percentage){
              this.alert = 'Please fill in all required fields';
          } else {
              let newcountrylanguage = {
                CountryCode: this.countrylanguage.CountryCode,
                Language: this.countrylanguage.Language,
                IsOfficial: this.countrylanguage.IsOfficial,
                Percentage: this.countrylanguage.Percentage,
              }
              this.$http.post('http://localhost/dataprocessing/public/api/countrylanguage/add', newcountrylanguage)
                .then(function(response){
                    this.$router.push({path: '/countrylanguage', query: {alert: 'Countrylanguage Added'}});
                });
              e.preventDefault();
          }
          e.preventDefault();
      }
  },
  components: {
      Alert
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>