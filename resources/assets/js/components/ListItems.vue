<template>
    <span>{{ item.name }}
		<button v-on:click="getDetailItem(item)">Détail</button>
		<button v-on:click="updateItem(item)">Modifer</button>
		<button v-on:click="deleteItem(item)">Supprimer</button>
	</span>
</template>

<script>
    export default {
		props: [
			'item'
		],
        mounted() {
            console.log('Component list items mounted.')
		},
		methods: {
			deleteItem: function(item) {
				axios.post('/items/delete/' + item.id).then(function (response) {
					if(response.status === 200)
					{
						app.items.forEach(function(element, index) {
							if(element.id == item.id)
							{
								app.items.splice(index, 1);
							}
						});
					}
				});
			},
			getDetailItem: function(item) {
				window.location.href = '/items/' + item.key;
			},
			updateItem: function(item) {
				window.location.href = '/items/edit/' + item.id;
			}
	}
    }
</script>
