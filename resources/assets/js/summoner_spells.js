require('./bootstrap');

window.Vue = require('vue');

Vue.component('list-summoner-spells', {
	props: [
	  'summoner_spell'
	],
	template: '<span>{{ summoner_spell.name }}<button v-on:click="getDetailSummonerSpell(summoner_spell)">Détail</button><button v-on:click="updateSummonerSpell(summoner_spell)">Modifer</button><button v-on:click="deleteSummonerSpell(summoner_spell)">Supprimer</button></span>',
	mounted: function() {
		this.$parent.summoner_spells.push(this.summoner_spell);
	},
	methods: {
		deleteSummonerSpell: function(summoner_spell) {
			axios.post('/summoner_spells/delete/' + summoner_spell.id).then(function (response) {
				if(response.status === 200)
				{
					app.summoner_spells.forEach(function(element, index) {
						if(element.id == summoner_spell.id)
						{
							app.summoner_spells.splice(index, 1);
						}
					});
				}
			});
		},
		getDetailSummonerSpell: function(summoner_spell) {
			window.location.href = '/summoner_spells/' + summoner_spell.id;
		},
		updateSummonerSpell: function(summoner_spell) {
			window.location.href = '/summoner_spells/edit/' + summoner_spell.id;
		}
	}
});

const app = new Vue({
	el: '#app',	
	data () {
		return {
			summoner_spells: [],
			reponse_message: ''
		}
	},
	mounted () {
		// axios.get('/champions').then(function (response) {
		// 	console.log(response);
		// 	app.champions = response.data;
		// });
	},
	methods: {
		onSubmit: function(submitEvent)
		{
			var edit = submitEvent.target.elements.edit.value;
			var name_summoner_spell = submitEvent.target.elements.name.value;

			if(edit == "true")
			{
				var id_summoner_spell = submitEvent.target.elements.id.value;

				axios.post('/summoner_spells/update', { name_summoner_spell: name_summoner_spell, id_summoner_spell: id_summoner_spell }).then(response => {
					console.log(response);
					if(response.data)
					{
						app.reponse_message = 'Le summoner a été modifié';
					}
					else
					{
						app.reponse_message = 'Le summoner n\' pas été modifié';
					}
				});
			}
			else
			{
				axios.post('/summoner_spells/store', { name_summoner_spell: name_summoner_spell }).then(response => {
					if(response.data.error)
					{
						app.reponse_message = 'Le summoner existe déjà';
					}
					else
					{
						app.reponse_message = 'Le summoner a bien été ajouté';
					}
				});
			}
		}
	}
});
