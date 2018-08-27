window.$ = window.jQuery = require('jquery');
require('bootstrap');
var Vue = require('vue');

$(function() {
    $('.autoinit-modal').modal();
});

Vue.component('tabela-de-anexos', require('./tabela-de-anexos.vue'));

new Vue({
    el: '#luno'
});