@extends('includes.header')
@section('pageTitle', 'TravelGear')

@push('styles')
<style>
*{
	margin: 0px;
	padding: 0px;
}
body{
	font-family: arial;
}
.main{

	margin: 2%;
}

.card{
	width: 20%;
	display: inline-block;
	box-shadow: 2px 2px 20px black;
	border-radius: 5px; 
	margin: 2%;
}

.image img{
	width: 100%;
	border-top-right-radius: 5px;
	border-top-left-radius: 5px;



}

.title{

	text-align: center;
	padding: 10px;

}

h1{
	font-size: 20px;
}

.des{
	padding: 3px;
	text-align: center;

	padding-top: 10px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px;
}
button{
	margin-top: 40px;
	margin-bottom: 10px;
	background-color: white;
	border: 1px solid black;
	border-radius: 5px;
	padding:10px;
}
button:hover{
	background-color: black;
	color: white;
	transition: .5s;
	cursor: pointer;
}
.most{
	padding-left: 8px;
	padding-bottom:15px;
}

</style>
@endpush

@section('content')
<div class="most">
	<h3 class="text-secondary font-weight-bold "> Travel Gears  </h3>
</div>

<div class="row">


	<div class="card">

		<div class="image">
			<img src="assets/images/bag1.jpg">
		</div>
		<div class="title">
			<h5 class="font-weight-bold">HIKING BACKPACK </h5> 
			<h6>30L NH100 - OLIVE </h6> <span class="label alert-success text-secondary">NEW!</span>
		</div>
		<hr>
		<div class="des">
			<p class=" text-dark" >Looking for a backpack for your adventures? Our comfortable NH100 model has great accessories, making it ideal for your walks across flatter terrain, without cramping your style!</p>

			<button onclick="document.location='https://www.decathlon.com.bd/a02450-nh-100-30l.html'" class="btn btn-outline-dark">CHECK PRICE</button>
			
		</div>
	</div>
	<!--cards -->


	<div class="card">

		<div class="image">
			<img src="assets/images/bag2.jpg">
		</div>
		<div class="title">
			<h5 class="font-weight-bold">TREKKING BACKPACK</h5> 
			<h6>TREK 100 EASYFIT 50L - BLACK</h6> <span class="label alert-success text-secondary">NEW!</span>
		</div>
		<hr>
		<div class="des">
			<p class=" text-dark" >this bag offers simplicity and comfort without giving up its technical features. An eco-designed bag with its mass-dyed polyester and recycled buckles.</p>

			<button onclick="document.location='https://www.decathlon.com.bd/a02458-mbp-trek-100.html'" class="btn btn-outline-dark">CHECK PRICE</button>
			
			
		</div>
	</div>
	<!--cards -->
	

	<div class="card">

		<div class="image">
			<img src="assets/images/head1.jpg">
		</div>
		<div class="title">
			<h5 class="font-weight-bold">TREKKING HEAD TORCH</h5> 
			<h6>USB TREK 500 - BLUE</h6> <span class="label alert-success text-secondary">NEW!</span>
		</div>
		<hr>
		<div class="des">
			<p class=" text-dark" >The FORCLAZ TREK 500 head lamp is a powerful, sturdy head torch which is shock-proof and splash-resistant. USB rechargeable battery so there's no need to carry spare batteries!</p>

			<button onclick="document.location='https://www.decathlon.com.bd/a02053-hl-trek-500-usb.html'" class="btn btn-outline-dark">CHECK PRICE</button>
			
			
		</div>
	</div>
	<!--cards -->

	<div class="card">

		<div class="image">
			<img src="assets/images/camp1.jpg">
		</div>
		<div class="title">
			<h5 class="font-weight-bold">CAMPING TENT</h5> 
			<h6>TENT MH100 - 2 PERSON</h6> <span class="label alert-success text-secondary">NEW!</span>
		</div>
		<hr>
		<div class="des">
			<p class=" text-dark" >An accessible tent that passes all our durability and waterproofing tests. The free-standing dome structure enables you to move it once it has been assembled, to find the best location.</p>

			<button onclick="document.location='https://www.decathlon.com.bd/a02935-mh100-2p.html'" class="btn btn-outline-dark">CHECK PRICE</button>
			
			
		</div>
	</div>
	<!--cards -->


	<div class="card">

		<div class="image">
			<img src="assets/images/pole1.jpg">
		</div>
		<div class="title">
			<h5 class="font-weight-bold">MOUNTAIN WALKING POLE</h5> 
			<h6>MH500 1X - BLACK</h6> <span class="label alert-success text-secondary">NEW!</span>
		</div>
		<hr>
		<div class="des">
			<p class=" text-dark" >Our designers have developed this versatile pole for regular hikers and mountain trekkers on rugged terrain.Easy and quick adjustment system.</p>

			<button onclick="document.location='https://www.decathlon.com.bd/a01138-1-hiking-pole-m-hiking-500.html'" class="btn btn-outline-dark">CHECK PRICE</button>
			
			
		</div>
	</div>
	<!--cards -->


	<div class="card">

		<div class="image">
			<img src="assets/images/pole2.jpg">
		</div>
		<div class="title">
			<h5 class="font-weight-bold"> COUNTRY WALKING POLE</h5> 
			<h6>A100 - BLUE</h6> <span class="label alert-success text-secondary">NEW!</span>
		</div>
		<hr>
		<div class="des">
			<p class=" text-dark" >Our design team has created this 1st price pole so you can walk safely during your occasional country outings.Ultra-simple, reliable push pin adjustment system.</p>

			<button onclick="document.location='hhttps://www.decathlon.com.bd/a01142-1-hiking-pole-arpenaz-100.html'" class="btn btn-outline-dark">CHECK PRICE</button>
			
			
		</div>
	</div>
	<!--cards -->

	<div class="card">

		<div class="image">
			<img src="assets/images/sandal1.jpg">
		</div>
		<div class="title">
			<h5 class="font-weight-bold">MEN'S HIKING SANDAL </h5> 
			<h6>NH110 - BLACK</h6> <span class="label alert-success text-secondary">NEW!</span>
		</div>
		<hr>
		<div class="des">
			<p class=" text-dark" >Our designers have developed this versatile pole for regular hikers and mountain trekkers on rugged terrain.Easy and quick adjustment system.</p>

			<button onclick="document.location='https://www.decathlon.com.bd/a02216-nh110-men-sandal.html'" class="btn btn-outline-dark">CHECK PRICE</button>
			
			
		</div>
	</div>
	<!--cards -->

	<div class="card">

		<div class="image">
			<img src="assets/images/shoes1.jpg">
		</div>
		<div class="title">
			<h5 class="font-weight-bold">MEN'S HIKING SHOES</h5> 
			<h6>NH150 - BLACK</h6> <span class="label alert-success text-secondary">NEW!</span>
		</div>
		<hr>
		<div class="des">
			<p class=" text-dark" >Benefiting from an eco-design approach, these country walking shoes offer the lightness and comfort of a pair of trainers, combined with the grip and traction of a hiking sole.</p>

			<button onclick="document.location='https://www.decathlon.com.bd/a03184-nh150-low-men-shoes.html'" class="btn btn-outline-dark">CHECK PRICE</button>
			
			
		</div>
	</div>

	
</div>

@endsection

@push('scripts') 

<script type="text/javascript">
	$(document).ready(function() {


		$('#addBtn').click(function(event) {
			$('#modalHeader').html('Details');
			$('#addModal').modal('show');
		});
	});

</script>
@endpush
