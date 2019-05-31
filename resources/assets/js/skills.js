require('./bootstrap');

window.Vue = require('vue');

Vue.component('list-skills', require('./components/ListSkills.vue'));

const app = new Vue({
	el: '#app',	
	data () {
		return {
			skills: [],
			reponse_message: ''
		}
	},
	mounted () {
		// axios.get('/champions').then(function (response) {
		// 	console.log(response);
		// 	app.champions = response.data;
		// });
	}
});
