require('./bootstrap');

window.Vue = require('vue');

Vue.component('list-champions', require('./components/ListChampions.vue'));

const app = new Vue({
	el: '#app',	
	data () {
		return {
			champions: [],
			reponse_message: ''
		}
	},
	mounted () {
		console.log('Mounted app');
		// axios.get('/champions').then(function (response) {
		// 	console.log(response.data.pagination);
		// 	console.log(response.data.champions);
		// 	app.champions = response.data.champions.data;
		// });
	},
	methods: {
		onSubmit: function(submitEvent)
		{
			var edit = submitEvent.target.elements.edit.value;
			var name_champion = submitEvent.target.elements.name.value;
			var item_0 = submitEvent.target.elements.item_0.value;
			var item_1 = submitEvent.target.elements.item_1.value;
			var item_2 = submitEvent.target.elements.item_2.value;
			var item_3 = submitEvent.target.elements.item_3.value;
			var item_4 = submitEvent.target.elements.item_4.value;
			var item_5 = submitEvent.target.elements.item_5.value;
			var summoner_0 = submitEvent.target.elements.summoner_spell_0.value;
			var summoner_1 = submitEvent.target.elements.summoner_spell_1.value;

			if(edit == "true")
			{
				var id_champion = submitEvent.target.elements.id.value;

				axios.put('/champions/update', { name_champion: name_champion, id_champion: id_champion, list_items: [item_0, item_1, item_2, item_3, item_4, item_5], list_summoner_spells: [summoner_0, summoner_1] }).then(response => {
					console.log(response);
					if(response.data)
					{
						app.reponse_message = 'Le champion a été modifié';
					}
					else
					{
						app.reponse_message = 'Le champion n\'a pas été modifié';
					}
				});
			}
			else
			{
				axios.post('/champions/store', { name_champion: name_champion, list_items: [item_0, item_1, item_2, item_3, item_4, item_5], list_summoner_spells: [summoner_0, summoner_1] }).then(response => {
					console.log(response);
					if(response.data.error)
					{
						app.reponse_message = 'Le champion existe déjà';
					}
					else
					{
						app.reponse_message = 'Le champion a bien été ajouté';
					}
				});
			}
		},
		updateChampion: function(item) {
			window.location.href = '/champions/edit/' + item;
		},
		deleteChampion: function(item) {
			axios.post('/champions/delete/' + item).then(function (response) {
				if(response.status === 200)
				{
					app.champions.forEach(function(element, index) {
						if(element.id == item)
						{
							app.champions.splice(index, 1);
						}
					});
					window.location.href = '/champions';
				}
			});
		},
	}
});
