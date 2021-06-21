@extends('includes.header')
@section('pageTitle', 'Dashboard')

@push('styles')
<style>
.border-left-primary{
  border-left-style: solid;
  border-left-color:#2f3640;
}
.border-left-danger{
  border-left-style: solid;
  border-left-color:#2f3640;
}
.border-left-info{
  border-left-style: solid;
  border-left-color:#2f3640;
}

.border-left-success{
  border-left-style: solid;
  border-left-color:#2f3640;
}
.custom_row{
  width: 100%;
  margin-left: 15px;
  margin-right: 15px;
  margin-bottom: 0px;
}
.vl {
  border-left: 2px solid #E5E5E5;
  margin-bottom: 10px;
}
.fonticon-list{
  list-style: none;
  margin: 20px 0;
  padding: 0;
}
.mt-10{
  margin-top: 22px;
}
.most{
  padding-top: 50px;
  padding-left: 5px;

} 
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
  box-shadow: 5px 5px 20px black;
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
  background-color:#576574;
  color: white;
  transition: .5s;
  cursor: pointer;
}


</style>
@endpush

@section('content')
<div class="row">

 <div class="custom_row">
  <h3 class="text-secondary font-weight-bold ">Dashboard</h3>
</div>

<div class="custom_row">
  <div class="row "> 

    <div class="col-sm-3 ">
      <div class="mt-10 rounded bg-info border-left-info">
        <div class="card-body">
          <div class="d-flex">
            <div class="mr-3 align-self-center">
              <i class="icon-layers text-light" style="font-size:40px;"></i>
            </div>
            <div class="text-center">
              <h3 class="text-light mt-2 mb-1" >Total Packages</h3>
              <h2 class="mt-0 text-light" id="total_call_data">16</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="mt-10 rounded bg-success border-left-success">
        <div class="card-body">
          <div class="d-flex">
            <div class="mr-3 align-self-center">
              <i class="icon-notebook text-light" style="font-size:40px;"></i>
            </div>
            <div class="text-center">
              <h3 class="text-light mt-2 mb-1" >Total Bookings</h3>
              <h2 class="mt-0 text-light" id="monthly_call_data" >5</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="mt-10 rounded bg-primary border-left-primary">
        <div class="card-body">
          <div class="d-flex">
            <div class="mr-3 align-self-center">
              <i class="icon-home text-light" style="font-size:40px;"></i>
            </div>
            <div class="text-center">
              <h3 class="text-light mt-2 mb-1" >Total Hotels</h3>
              <h2 class="mt-0 text-light" id="weekly_call_data" >15</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="mt-10 rounded bg-danger border-left-danger">
        <div class="card-body">
          <div class="d-flex">
            <div class="mr-3 align-self-center "> 
              <i class="icon-people text-light" style="font-size:40px;"></i>
            </div>
            <div class="text-center"> 
              <h3 class="text-light mt-2 mb-1" >Total Travellers</h3>
              <h2 class="mt-0 text-light" id="total_staff_data">55</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="col-12">
  <div class="most">
    <h3 class="text-secondary font-weight-bold ">Most Visited Places </h3>
  </div>
</div>


<div class="row">


  <div class="card">

    <div class="image">
     <img src="assets/images/amiakhum.jpg" alt="amiakhum" >
   </div>
   <div class="title">
    <h1 class="font-weight-bold">Bandarban</h1>
  </div>
  <div class="des">
    <p class="card-text">
      Bandarban is a popular destination for its adventurous, distinctive and scenic landscape. The beauty of its forests, numerous waterfalls, tallest peaks.
    </p>
    <button onclick="document.location='https://en.wikipedia.org/wiki/Bandarban_District'" >Read More...</button>
  </div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/cox.jpg" alt="cox">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">Cox's Bazar</h1>
 </div>
 <div class="des">
   <p class="card-text">
    Cox's Bazar is famous for its long natural sandy sea beach.Cox's Bazar has the world's largest unbroken sea beach which stretches more than 120 km.
  </p>
  <button onclick="document.location='https://en.wikipedia.org/wiki/Cox%27s_Bazar'">Read More...</button>
</div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/saint.jpg" alt="saint">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">St. Martin's Island</h1>
 </div>
 <div class="des">
  <p class="card-text">
   Saint Martin is a tropical cliché and the only coral island in Bangladesh, with beaches fringed with coconut palms and laid-back locals.
 </p>
 <button onclick="document.location='https://en.wikipedia.org/wiki/St._Martin%27s_Island'">Read More...</button>
</div>
</div>
<div class="card">

  <div class="image">
   <img src="assets/images/sajek.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">Sajek Valley</h1>
 </div>
 <div class="des">
   <p class="card-text">
     Sajek valley is known for its natural environment and is surrounded by mountains, dense forest, and grassland hill tracks.
   </p>
   <button onclick="document.location='https://en.wikipedia.org/wiki/Sajek_Valley'" >  Read More...</button>
 </div>
</div>
</div>
</div>
@endsection

@push('scripts')

<script type="text/javascript">

</script>
@endpush
