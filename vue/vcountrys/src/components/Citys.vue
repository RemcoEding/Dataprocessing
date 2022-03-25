<template>
  <div style="float:left;" class="citys container">
    <Alert v-if="alert" v-bind:message="alert" />
    <h1 class ="page-header">Manage Citys</h1>
    <input class="form-control" placeholder="Enter City" v-model="filterInput">
    <br />
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>CountryCode</th>
          <th>District</th>
          <th>Population</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="city in filterBy(citys, filterInput)" :key="city.ID">
          <td>{{city.ID}}</td>
          <td>{{city.Name}}</td>
          <td>{{city.CountryCode}}</td>
          <td>{{city.District}}</td>
          <td>{{city.Population}}</td>
          <td><router-link class="btn btn-default" v-bind:to="'/city/'+city.ID">View</router-link></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import Alert from './Alert';
export default {
  name: 'citys',
  data () {
    return {
      citys: [],
      alert:'',
      filterInput: ''
    }
  },
  methods : {
    fetchCitys(){
      this.$http.get('http://localhost/dataprocessing/public/api/city')
      .then(function(response){
        this.citys = JSON.parse(JSON.stringify(response.body));
      });
    },
    filterBy(list, value){
      value = value.charAt(0).toUpperCase() + value.slice(1);
      return list.filter(function(city){
        return city.Name.indexOf(value) > -1;
      });
    }
  },
  created: function(){
    if(this.$route.query.alert){
      this.alert = this.$route.query.alert;
    }
    this.fetchCitys();
  },
  updated: function(){
    this.fetchCitys();
  },
  components: {
    Alert
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
