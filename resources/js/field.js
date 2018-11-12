Nova.booting((Vue, router) => {
    Vue.component('index-nova-select2', require('./components/IndexField'));
    Vue.component('detail-nova-select2', require('./components/DetailField'));
    Vue.component('form-nova-select2', require('./components/FormField'));
})
