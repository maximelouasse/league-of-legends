<template>
	<li>
		<a :href="'/items/' + item.key">
			<img v-bind:src="'http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/' + item.key + '.png'" alt="" />
			<p>{{ item.name }}</p>
		</a>
		<button v-on:click="updateItem(item)"><img :src="'/img/edit.png'" alt=""></button>
		<button v-on:click="deleteItem(item)"><img :src="'/img/delete.png'" alt=""></button>
	</li>
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
