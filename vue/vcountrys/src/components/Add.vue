<template>
  <div class="add container">
      <Alert v-if="alert" v-bind:message="alert" />
   <h1 class = "page-header">Add Country</h1>
   <form v-on:submit="addCountry">
       <div class="well">
           <h4>Country</h4>
           <div class="form-group">
               <label>Code</label>
               <input type="text" class="form-control" placeholder="Code" v-model="country.Code">
           </div>
           <div class="form-group">
               <label>Name</label>
               <input type="text" class="form-control" placeholder="Name" v-model="country.Name">
           </div>
           <div class="form-group">
               <label>Continent</label>
               <input type="text" class="form-control" placeholder="Continent" v-model="country.Continent">
           </div>
           <div class="form-group">
               <label>Region</label>
               <input type="text" class="form-control" placeholder="Region" v-model="country.Region">
           </div>
           <div class="form-group">
               <label>Surfacearea</label>
               <input type="text" class="form-control" placeholder="Surfacearea" v-model="country.SurfaceArea">
           </div>
           <div class="form-group">
               <label>Indepyear</label>
               <input type="text" class="form-control" placeholder="Indepyear" v-model="country.IndepYear">
           </div>
           <div class="form-group">
               <label>Population</label>
               <input type="text" class="form-control" placeholder="Population" v-model="country.Population">
           </div>
           <div class="form-group">
               <label>Lifeexpectancy</label>
               <input type="text" class="form-control" placeholder="Lifeexpectancy" v-model="country.LifeExpectancy">
           </div>
           <div class="form-group">
               <label>Gnp</label>
               <input type="text" class="form-control" placeholder="Gnp" v-model="country.GNP">
           </div>
           <div class="form-group">
               <label>Gnpold</label>
               <input type="text" class="form-control" placeholder="Gnpold" v-model="country.GNPOld">
           </div>
           <div class="form-group">
               <label>Localname</label>
               <input type="text" class="form-control" placeholder="Localname" v-model="country.LocalName">
           </div>
           <div class="form-group">
               <label>Governmentform</label>
               <input type="text" class="form-control" placeholder="Governmentform" v-model="country.GovernmentForm">
           </div>
           <div class="form-group">
               <label>Headofstate</label>
               <input type="text" class="form-control" placeholder="Headofstate" v-model="country.HeadOfState">
           </div>
           <div class="form-group">
               <label>Capital</label>
               <input type="text" class="form-control" placeholder="Capital" v-model="country.Capital">
           </div>
           <div class="form-group">
               <label>Code2</label>
               <input type="text" class="form-control" placeholder="Code2" v-model="country.Code2">
           </div>
        </div>
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
      country: {},
      alert:''
    }
  },
  methods: {
      addCountry(e){
          if(!this.country.Code || !this.country.Name || !this.country.Continent || !this.country.Region || !this.country.SurfaceArea || !this.country.IndepYear || !this.country.Population || !this.country.LifeExpectancy || !this.country.GNP || !this.country.GNPOld || !this.country.LocalName || !this.country.GovernmentForm || !this.country.HeadOfState || !this.country.Capital || !this.country.Code2){
              this.alert = 'Please fill in all required fields';
          } else {
              let newCountry = {
                Code: this.country.Code,
                Name: this.country.Name,
                Continent: this.country.Continent,
                Region: this.country.Region,
                SurfaceArea: this.country.SurfaceArea,
                IndepYear: this.country.IndepYear,
                Population: this.country.Population,
                LifeExpectancy: this.country.LifeExpectancy,
                GNP: this.country.GNP,
                GNPOld: this.country.GNPOld,
                LocalName: this.country.LocalName,
                GovernmentForm: this.country.GovernmentForm,
                HeadOfState: this.country.HeadOfState,
                Capital: this.country.Capital,
                Code2: this.country.Code2
              }
              this.$http.post('http://localhost/dataprocessing/public/api/country/add', newCountry)
                .then(function(response){
                    this.$router.push({path: '/', query: {alert: 'Country Added'}});
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