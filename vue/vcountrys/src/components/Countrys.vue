<template>
  <div class="countrys container">
    <Alert v-if="alert" v-bind:message="alert" />
    <h1 class ="page-header">Manage Countrys</h1>
    <input class="form-control" placeholder="Enter Country" v-model="filterInput">
    <br />
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Code</th>
          <th>Name</th>
          <th>Continent</th>
          <th>Region</th>
          <th>Surfacearea</th>
          <th>Indepyear</th>
          <th>Population</th>
          <th>Lifeexpectancy</th>
          <th>Gnp</th>
          <th>Gnpold</th>
          <th>Localname</th>
          <th>Governmentform</th>
          <th>Headofstate</th>
          <th>Capital</th>
          <th>Code2</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="country in filterBy(countrys, filterInput)" :key="country.Code">
          <td>{{country.Code}}</td>
          <td>{{country.Name}}</td>
          <td>{{country.Continent}}</td>
          <td>{{country.Region}}</td>
          <td>{{country.SurfaceArea}}</td>
          <td>{{country.IndepYear}}</td>
          <td>{{country.Population}}</td>
          <td>{{country.LifeExpectancy}}</td>
          <td>{{country.GNP}}</td>
          <td>{{country.GNPOld}}</td>
          <td>{{country.LocalName}}</td>
          <td>{{country.GovernmentForm}}</td>
          <td>{{country.HeadOfState}}</td>
          <td>{{country.Capital}}</td>
          <td>{{country.Code2}}</td>
          <td><router-link class="btn btn-default" v-bind:to="'/country/'+country.Code">Edit</router-link></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import Alert from './Alert';
export default {
  name: 'countrys',
  data () {
    return {
      countrys: [],
      alert:'',
      filterInput: ''
    }
  },
  methods : {
    fetchCountrys(){
      this.$http.get('http://localhost/dataprocessing/public/api/country')
      .then(function(response){
        this.countrys = JSON.parse(JSON.stringify(response.body));
      });
    },
    filterBy(list, value){
      value = value.charAt(0).toUpperCase() + value.slice(1);
      return list.filter(function(country){
        return country.Name.indexOf(value) > -1;
      });
    }
  },
  created: function(){
    if(this.$route.query.alert){
      this.alert = this.$route.query.alert;
    }
    this.fetchCountrys();
  },
  updated: function(){
    this.fetchCountrys();
  },
  components: {
    Alert
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
