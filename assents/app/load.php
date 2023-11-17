<div class="pre-load">
	<div class="container">
		<div class="load">
			<center>
				<i class="fi fi-ts-rocket-lunch icon-load"></i>
			</center>
		</div>
	</div>
</div>
<style type="text/css">
	.load{
		color: #fff;
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		background-color: #141B47;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.icon-load{
		font-size: 60px;
	}
	.disppear{
  	animation: vanish 1s forwards;
	}
	@keyframes vanish {
	  100%{
	    opacity: 0;
	    visibility: hidden;
	}
</style>
<script type="text/javascript">
	var loader = document.querySelector(".pre-load")

	window.addEventListener("load", vanish);

	function vanish() {
	  loader.classList.add("disppear");
	}
</script>