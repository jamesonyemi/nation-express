<template>
<div>

  <form class="container w-100">
  <div class="mt-5 row g-3">
    <div class="col-sm-3 col-lg-3 col-md-3">
     <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="bg-white input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </div>
                    </div>
                    <input
                    type="search"
                    class="form-control"
                    id="q"
                    v-model.trim="search"
                    placeholder="Search people..."
                    @keyup="searchCountryDetail"
                    @change="searchCountryDetail"
                 />
          </div>
    </div>
    <div class="col-sm-6"></div>
    <div class="col-sm-3">
      <div class="input-group">
        <div class="form-group" >
            <select class="custom-select" name="" v-model="region" id=""  @change="filterCountryByRegion" >
                <option disabled value="" selected="selected" >Select one</option>
                <option
                    v-for="region in regions" :key="region.id"
                    :value="region.region"
                     >
                        {{ region.region }}
                </option>
            </select>
        </div>
      </div>
    </div>
  </div>
</form>
    <div class="m-5 row row-cols-1 row-cols-md-4 row-cols-lg-4 row-col-sm-4" >
  <div class="mb-4 col-sm-4" v-for="country in countries" :key="country.id">
        <div class="card h-100">
      <router-link :to="{ name: 'show', params: { countryId: country.name }}"
       class="w-100">
        <img :src="country.flag" class="card-img-top w-100" alt="..." >
      </router-link>
        <div class="h-100 card-body">
            <h5 class="mb-4 card-title font-weight-bolder">{{ country.name }}</h5>
            <div class="row">
                <div class="col-12 card-text"><span class="font-weight-bold">Population: {{ country.population }}</span> </div>
                <div class="col-12 card-text"><span class="font-weight-bold">Region: {{ country.region }}</span> </div>
                <div class="col-12 card-text"><span class="font-weight-bold">Capital: {{ country.capital }}</span> </div>
            </div>
        </div>
        </div>
  </div>

</div>

</div>

</template>

<script>
    export default {
        data() {
            return {
                countries: [],
                search:'',
                regions: [],
                region: ''
            }
        },

        mounted() {
            this.getAllCountries();
            this.getUniqueRegionNames();
        },

        created() {
            this.searchCountryDetail();
            this.filterCountryByRegion();
        },

        methods: {

            getAllCountries() {
                this.axios
                .get('https://restcountries.eu/rest/v2/all')
                .then(response => {
                    this.countries = response.data;
                     console.log(this.countries);
                });
            },

            getUniqueRegionNames() {
                this.axios
                .get('https://restcountries.eu/rest/v2/all')
                .then(response => {
                    this.regions = response.data;
                     this.regions =  this.removeDuplicates(this.regions, item => item.region);
                });
            },

            removeDuplicates(data, key) {

                return [
                    ...new Map(data.map(item => [key(item), item])).values()
                ]

            },

            searchCountryDetail() {
                if (this.search !== '') {

                    this.axios
                    .get(`https://restcountries.eu/rest/v2/name/${this.search}`)
                    .then(response => {
                        this.countries = response.data;
                            this.countries.filter(country =>
                            country.name.toLowerCase().includes(this.search.toLowerCase())
                            );

                    });
                }
                this.getAllCountries();
            },

            filterCountryByRegion() {

                if (this.region !== '') {

                    this.axios
                    .get(`https://restcountries.eu/rest/v2/region/${this.region}`)
                    .then(response => {
                        this.countries = response.data;
                        const result = this.countries.reduce((unique, o) => {
                            if(!unique.some(obj => obj.region === o.region)) {
                            unique.push(o);
                            }
                            return unique;
                        },[]);
                        console.log(result);

                    });
                }
            }
        }

    }

</script>
