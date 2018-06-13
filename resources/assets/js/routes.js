module.exports = (Vue) => {
  // define pages
  const main_page = Vue.component('main_page', require('./components/table.vue'))
  const edit_page = Vue.component('edit_page', require('./components/edit.vue'))

  //return vue-route paths
  return [
    { path: '/', component: main_page},
    { path: '/edit/:id?', component: edit_page},
  ]
}
