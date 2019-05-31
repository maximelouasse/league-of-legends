<template>
    <div class="card" v-bind:style="{'backgroundImage': 'url(http://ddragon.leagueoflegends.com/cdn/img/champion/splash/' + champion.avatar_url + ')' }">
		<a :href="'/champions/' + champion.id">
			<span>{{ champion.name }}</span>
		</a>
	</div>
</template>

<script>
    export default {
		props: [
			'champion'
		],
        mounted() {
            console.log('Component list champions mounted.')
		},
		methods: {
		deleteChampion: function(item) {
			axios.post('/champions/delete/' + item.id).then(function (response) {
				if(response.status === 200)
				{
					app.champions.forEach(function(element, index) {
						if(element.id == item.id)
						{
							app.champions.splice(index, 1);
						}
					});
					location.reload();
				}
			});
		},
		getDetailChampion: function(item) {
			window.location.href = '/champions/' + item.id;
		},
		updateChampion: function(item) {
			window.location.href = '/champions/edit/' + item.id;
		}
	}
    }
</script>
