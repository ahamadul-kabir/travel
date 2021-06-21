@extends('includes.header')
@section('pageTitle', 'TourPackages')

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
  <h3 class="text-secondary font-weight-bold "> All Tour Packages </h3>
</div>

<div class="row">


  <div class="card">

    <div class="image">
      <img src="assets/images/sundarbans.jpg">
    </div>
    <div class="title">
      <h1 class="font-weight-bold">Sundarban</h1>
    </div>
    <div class="des">
      <p class="font-weight-bold text-primary" >package 1</p>
      <p>4 nights / 3 days package </p>
      <p>Cost : 10,000 tk </p>
      <button id = addBtn >Read More...</button>
    </div>
  </div>
  <!--cards -->


  <div class="card">

    <div class="image">
     <img src="assets/images/coxs.jpg">
   </div>
   <div class="title">
     <h1 class="font-weight-bold">Cox's Bazar</h1>
   </div>
   <div class="des">
    <p class="font-weight-bold text-primary">package 2</p>
    <p>4 nights / 3 days package </p>
    <p>Cost : 7,000 tk </p>
    <button>Read More...</button>
  </div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/saint.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">St. Martin's Island</h1>
 </div>
 <div class="des">
  <p class="font-weight-bold text-primary">package 3</p>
  <p>3 nights / 3 days package </p>
  <p>Cost : 7,000 tk </p>
  <button>Read More...</button>
</div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/sajek.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">Sajek Valley</h1>
 </div>
 <div class="des">
  <p class="font-weight-bold text-primary">package 4</p>
  <p>2 nights / 3 days package </p>
  <p>Cost : 7,000 tk </p>
  <button>Read More...</button>
</div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
    <img src="assets/images/sundarbans.jpg">
  </div>
  <div class="title">
    <h1 class="font-weight-bold">Sundarban</h1>
  </div>
  <div class="des">
    <p class="font-weight-bold text-primary" >package 1</p>
    <p>4 nights / 3 days package </p>
    <p>Cost : 10,000 tk </p>
    <button  >Read More...</button>
  </div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/coxs.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">Cox's Bazar</h1>
 </div>
 <div class="des">
  <p class="font-weight-bold text-primary">package 2</p>
  <p>4 nights / 3 days package </p>
  <p>Cost : 7,000 tk </p>
  <button>Read More...</button>
</div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/saint.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">St. Martin's Island</h1>
 </div>
 <div class="des">
  <p class="font-weight-bold text-primary">package 3</p>
  <p>3 nights / 3 days package </p>
  <p>Cost : 7,000 tk </p>
  <button>Read More...</button>
</div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/sajek.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">Sajek Valley</h1>
 </div>
 <div class="des">
  <p class="font-weight-bold text-primary">package 4</p>
  <p>2 nights / 3 days package </p>
  <p>Cost : 7,000 tk </p>
  <button>Read More...</button>
</div>
</div>
<!--cards -->
<div class="card">

  <div class="image">
    <img src="assets/images/sundarbans.jpg">
  </div>
  <div class="title">
    <h1 class="font-weight-bold">Sundarban</h1>
  </div>
  <div class="des">
    <p class="font-weight-bold text-primary" >package 1</p>
    <p>4 nights / 3 days package </p>
    <p>Cost : 10,000 tk </p>
    <button >Read More...</button>
  </div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/coxs.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">Cox's Bazar</h1>
 </div>
 <div class="des">
  <p class="font-weight-bold text-primary">package 2</p>
  <p>4 nights / 3 days package </p>
  <p>Cost : 7,000 tk </p>
  <button>Read More...</button>
</div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/saint.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">St. Martin's Island</h1>
 </div>
 <div class="des">
  <p class="font-weight-bold text-primary">package 3</p>
  <p>3 nights / 3 days package </p>
  <p>Cost : 7,000 tk </p>
  <button>Read More...</button>
</div>
</div>
<!--cards -->


<div class="card">

  <div class="image">
   <img src="assets/images/sajek.jpg">
 </div>
 <div class="title">
   <h1 class="font-weight-bold">Sajek Valley</h1>
 </div>
 <div class="des">
  <p class="font-weight-bold text-primary">package 4</p>
  <p>2 nights / 3 days package </p>
  <p>Cost : 7,000 tk </p>
  <button>Read More...</button>
</div>
</div>
<!--cards -->
</div>

<!-- popup model -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h4 class="modal-title text-white" id="modalHeader"></h4>
        <button type="button" class="close white" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">

        <div class="form-body">
          {{ csrf_field() }}
          <div class="row p-t-20 ">

            <div class="col-12">
              <div class="form-group row ">
                <label class="col-sm-4 control-label text-dark font-weight-bold text-center ">Duration :</label>
                <div class="col-sm-8">
                  <p  class="col-sm-4 control-label text-center">4 nights / 3 days</p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label  class="col-sm-4 control-label text-dark font-weight-bold text-center">Locations :</label>
                <div class="col-sm-8">
                  <div class="controls">
                    <label class="col-sm-4 control-label text-center">Sundarban</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label  class="col-sm-4 control-label text-dark font-weight-bold text-center">Attractions :</label>
                <div class="col-sm-8">
                  <ul>
                    <li >Harbaria Eco-Tourism Center</li>
                    <li>Kotka Wildlife Sanctuary</li>
                    <li>Kochikhali Wildlife Sanctuary</li>
                    <li>Jamtola Sea Beach</li>
                    <li>Fishing Village</li>
                    <li>Karamjal Crocodile Breeding Centre</li>
                  </ul> 
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label  class="col-sm-4 control-label text-dark font-weight-bold text-center">Facilities :</label>
                <div class="col-sm-8">
                  <ul>
                    <li> Up-down Transportation Facilities. </li>
                    <li> Food Service Facilities. </li>
                    <li> Accommodation Facilities.  </li>
                    <li> Fish/Chicken BBQ Party.  </li>
                    <li> Entertainment Facilities.  </li>
                    
                  </ul> 
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label  class="col-sm-4 control-label text-dark font-weight-bold text-center">Travel Date :</label>
                <div class="col-sm-8">
                  <div class="controls">
                    <label  class="col-sm-4 control-label text-center">5/12/2021</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label  class="col-sm-4 control-label text-dark font-weight-bold text-center">Cost:</label>
                <div class="col-sm-8">
                  <div class="controls">
                   <label  class="col-sm-4 control-label text-center">10,000 tk </label>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-12">
            <div class="form-group row">
              <label  class="col-sm-4 control-label text-dark font-weight-bold text-center">Travel Agency:</label>
              <div class="col-sm-8">
                <div class="controls">
                 <label  class="col-sm-4 control-label text-center">Tour Group BD </label>
               </div>
             </div>
           </div>
         </div>

       </div>

     </div>

   </div>
 </div>
</div>

<!-- /end popup modal -->
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
