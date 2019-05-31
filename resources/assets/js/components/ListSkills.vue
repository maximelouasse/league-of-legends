<template>
	<li>
		<a :href="'/skills/' + skill.id">
			<img v-bind:src="'http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/' + skill.key + '.png'" alt="">
			<p>{{ champion.name }} - {{ skill.name }}</p>
		</a>
		<!-- <button v-on:click="updateSkill(skill)"><img :src="'/img/edit.png'" alt=""></button>
		<button v-on:click="deleteSkill(skill)"><img :src="'/img/delete.png'" alt=""></button> -->
	</li>
</template>

<script>
    export default {
		props: [
			'skill',
			'champion'
		],
        mounted() {
            console.log('Component list skills mounted.')
		},
		methods: {
			deleteSkill: function(summoner_spell) {
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
			getDetailSummonerSpell: function(skill) {
				window.location.href = '/skills/' + skill.id;
			},
			updateSkill: function(skill) {
				window.location.href = '/skills/edit/' + skill.id;
			}
	}
    }
</script>
