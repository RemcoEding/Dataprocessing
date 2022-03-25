<template>
  <div style="float:left;" class="countrylanguages container">
    <Alert v-if="alert" v-bind:message="alert" />
    <h1 class ="page-header">Manage Countrylanguages</h1>
    <input class="form-control" placeholder="Enter Countrycode" v-model="filterInput">
    <br />
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>CountryCode</th>
          <th>Language</th>
          <th>IsOfficial</th>
          <th>Percentage</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="countrylanguage in filterBy(countrylanguages, filterInput)" :key="countrylanguage.ID">
          <td>{{countrylanguage.ID}}</td>
          <td>{{countrylanguage.CountryCode}}</td>
          <td>{{countrylanguage.Language}}</td>
          <td>{{countrylanguage.IsOfficial}}</td>
          <td>{{countrylanguage.Percentage}}</td>
          <td><router-link class="btn btn-default" v-bind:to="'/countrylanguage/'+countrylanguage.ID">View</router-link></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import Alert from './Alert';
export default {
  name: 'countrylanguages',
  data () {
    return {
      countrylanguages: [],
      alert:'',
      filterInput: ''
    }
  },
  methods : {
    fetchCountrylanguages(){
      this.$http.get('http://localhost/dataprocessing/public/api/countrylanguage')
      .then(function(response){
        this.countrylanguages = JSON.parse(JSON.stringify(response.body));
      });
    },
    filterBy(list, value){
      value = value.toUpperCase();
      return list.filter(function(countrylanguage){
        return countrylanguage.CountryCode.indexOf(value) > -1;
      });
    }
  },
  created: function(){
    if(this.$route.query.alert){
      this.alert = this.$route.query.alert;
    }
    this.fetchCountrylanguages();
  },
  updated: function(){
    this.fetchCountrylanguages();
  },
  components: {
    Alert
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
