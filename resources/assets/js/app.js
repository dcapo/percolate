import Vue from 'vue';
import Pikaday from './components/Pikaday.vue';
import TastingRadar from './components/TastingRadar.vue';
import FlavorsInput from './components/FlavorsInput.vue';
import $ from 'jquery';

new Vue({
    el: '#main-content',
    components: {
        Pikaday,
        TastingRadar,
        FlavorsInput
    }
});

var $toggle = $('.nav-toggle');
var $menu = $('.nav-menu');

$toggle.click(function() {
    $(this).toggleClass('is-active');
    console.log($menu);
    $menu.toggleClass('is-active');
});
