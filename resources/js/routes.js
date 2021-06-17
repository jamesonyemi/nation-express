import AllCountries from './components/AllCountries.vue';
import ShowCountry from './components/ShowCountry.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllCountries
    },

    {
        name: 'show',
        path: '/show/:countryId',
        component: ShowCountry,
        props:true
    }
];
