require('./bootstrap');

window.Vue = require('vue');

Vue.component('list-skills', {
	props: [
	  'skill',
	  'champion'
	],
	template: '<span>{{ skill.name }} - {{ champion.name }}<button v-on:click="getDetailSkill(skill)">Détail</button></span>',
	mounted: function() {
		this.$parent.skills.push(this.skill);
	},
	methods: {
		getDetailSkill: function(skill) {
			window.location.href = '/skills/' + skill.id;
		}
	}
});

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
