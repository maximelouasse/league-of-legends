<template>
    <span>{{ summoner_spell.name }}
		<button v-on:click="getDetailSummonerSpell(summoner_spell)">Détail</button>
		<button v-on:click="updateSummonerSpell(summoner_spell)">Modifer</button>
		<button v-on:click="deleteSummonerSpell(summoner_spell)">Supprimer</button>
	</span>
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
