require('./bootstrap');

window.Vue = require('vue');

Vue.component('list-items', require('./components/ListItems.vue'));

const app = new Vue({
	el: '#app',	
	data () {
		return {
			items: [],
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

			if(edit == "true")
			{
				var name_item = submitEvent.target.elements.name.value;
				var id_item = submitEvent.target.elements.id.value;

				axios.put('/items/update', { name_item: name_item, id_item: id_item }).then(response => {
					console.log(response);
					if(response.data)
					{
						app.reponse_message = 'L\'objet a été modifié';
					}
					else
					{
						app.reponse_message = 'L\'objet n\' pas été modifié';
					}
				});
			}
			else
			{
				var name_item = submitEvent.target.elements.name.value;

				axios.post('/items/store', { name_item: name_item }).then(response => {
					if(response.data.error)
					{
						app.reponse_message = 'L\'objet existe déjà';
					}
					else
					{
						app.reponse_message = 'L\'objet a bien été ajouté';
					}
				});
			}
		}
	}
});
