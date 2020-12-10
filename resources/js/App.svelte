<script>
  export let userRecord;
  export let allRecord;
	import Play from './pages/Play.svelte'
</script>

<main>
<Play userRecord={userRecord} allRecord={allRecord}/>
</main>

<style>
	main {
		text-align: center;
		padding: 1em;
		max-width: 240px;
		margin: 0 auto;
	}

	:global(body){
		background-image: url('./img/tetris-bg-1.jpg');
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
    background-attachment: fixed;
    background-color:#000000;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>
