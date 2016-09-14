
<style>
	#social-left{
		position: fixed;
		left:0;
		top:250px;
	}

	#social-left div{
		background-color: #bf0000;
		padding:5px;

	}

	#social-left div:hover{
		background-color: white;
	}

	#social-left div:hover i{
		color:#bf0000;
	}

	#social-left i{
		color:white;
		font-size: 1.8em;
	}
	
	@media screen and (max-width: 1180px){
		#social-left{display:none;}
	}

	@media screen and (max-width: 990px){
		#sign-up-header{margin-top:50px;}
	}

</style>

<div id="social-left">
	<div><a href="#"><i class="fa fa-facebook"></i></a></div>
	<div><a href="#"><i class="fa fa-twitter"></i></a></div>
	<div><a href="#"><i class="fa fa-linkedin"></i></a></div>
	<div><a href="#"><i class="fa fa-pinterest"></i></a></div>
</div>