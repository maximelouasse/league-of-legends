<template>
	<li>
		<a :href="'/summoner_spells/' + summoner_spell.id">
			<img v-bind:src="'http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/' + summoner_spell.key + '.png'" alt="">
			<p>{{ summoner_spell.name }}</p>
		</a>
		<button v-on:click="updateSummonerSpell(summoner_spell)"><img :src="'/img/edit.png'" alt=""></button>
		<button v-on:click="deleteSummonerSpell(summoner_spell)"><img :src="'/img/delete.png'" alt=""></button>
	</li>
</template>

<script>
    export default {
		props: [
			'summoner_spell'
		],
        mounted() {
            console.log('Component list summoner spells mounted.')
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
						location.reload();
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
    }
</script>
