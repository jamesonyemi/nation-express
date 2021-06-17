<template>
    <div class="container-fluid w-75 ">

            <div class="mt-5 col-12 card-text"> 
    </div>
    <div class="row g-0" v-for="countryInfo in showCountryInfo" :key="countryInfo.id">
    <div class="col-md-4" >
       <router-link :to="{ name: 'show', params: { countryId: countryInfo.name }}"
       class="w-100">
        <img :src="countryInfo.flag" class="card-img-top" alt="" >
      </router-link>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title font-weight-bolder ">{{ countryInfo.name }}</h3>
        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
        <div class="card-group">
            <div class="card">
                <div class="border border-0 card-body bg-light">
                    <p class="card-text">{{ countryInfo.name }}</p>
                </div>
            </div>
            <div class="card">
                <div class="border border-0 card-body bg-light">
                    <p class="card-text"> <span class="font-weight-bold">Top level Domain:</span>  {{ countryInfo.topLevelDomain[0] }}</p>
                    <p class="card-text"> <span class="font-weight-bold" >Currency:</span>  {{  countryInfo.currencies.map((currency) => currency.name  ).toString() }}
                        </p>
                    <p class="card-text"> <span class="font-weight-bold">Languages:</span>  {{ countryInfo.languages.map((lang) => lang.nativeName).join(", ").toString() }}</p>
                </div>
            </div>
        </div>
      </div>
      <div class="justify-content-center" >
        <h5 class="ml-3 card-text text-capitalize font-weight-bold">neighbouring countries</h5>
        <div class="m-3 row row-cols-1 row-cols-md-4 row-cols-lg-4 row-col-sm-4">
            <button type="button" class="mx-1 my-1 btn btn-primary btn-sm col-3" 
                v-for="ne in countryInfo.borders" :key="ne.id" >
                 {{ ne }} 
            <span class="badge bg-secondary">4</span>
            </button>
        </div>  
      </div>
    </div>
  </div>
    </div>
</template>

<script>
    export default {
        props:['countryId'],
        data() {
            return {
                currencies: {},
                // languages: {},
                showCountryInfo: [],
            }
        },
        

        mounted() {
            this.showCountryDetails();
            // this.currencies();
            this.currencies = () => {
                for (const {name} of this.showCountryInfo.currencies) {
                    return name;
                }
            }
        },
        
        created() {
            
        },

        methods: {
            showCountryDetails() {
                this.axios
                    .get(`https://restcountries.eu/rest/v2/name/` + this.countryId)
                    .then(response => {
                        if(response.status ===  200) {

                            this.showCountryInfo = response.data;
                            console.log(this.showCountryInfo);
                        }
                    });
            },
            
        
    }
  }
</script>
