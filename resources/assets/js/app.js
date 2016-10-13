import Vue from 'vue';
import Pikaday from './components/Pikaday.vue';
import TastingRadar from './components/TastingRadar.vue';
import FlavorsInput from './components/FlavorsInput.vue';

new Vue({
    el: '#main-content',
    components: {
        Pikaday,
        TastingRadar,
        FlavorsInput
    }
});
