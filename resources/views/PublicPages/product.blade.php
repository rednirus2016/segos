@extends('layouts.app')
@section('meta_title',$product->name)
@section('meta_keywords',$product->name)
@section('meta_description',$product->name)

@section('content')

<div class="rs-breadcrumbs img3">
   <div class="breadcrumbs-inner text-center">
      <h1 class="page-title">{{$product->name}}</h1>
      <ul>
         <li title="{{$product->name}}">
            <a class="active" href="/">Home</a>
         </li>
         <li title="Go To Services">
            <a class="active" href="#"> {{$product->name}}</a>
         </li>
         <li>{{$product->name}}</li>
      </ul>
   </div>
   <p></p>
</div>

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="row">
            <div class="col-lg-12 col-md-12">
               <div class="row">
                 <div class="col-lg-6">
                  <div class="product-image">
  
                     <img src="/{{$product->image}}">
                        
                   </div>
                  </div>
                 <div class="col-lg-6">
                   <div class="content">
                     <h5>{{$product->packing}}</h5>
                   <h2>{{$product->name}}</h2>
                   <p>{{$product->composition}}</p>
                   </div>
                 </div>
                 <div class="col-lg-12">
                     <div class="des">
                     <?php
                  echo html_entity_decode($product->description);
                  ?>
                     </div>
                 </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<br>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <div id="register-form">
               <h2 class="text-center">SEND ENQUIRY</h2>
               <p class="text-center mt-1 mb-2 text-danger"> ( DO NOT POST JOB ENQUIRY )</p>
               <form action="/enquiry/store" method="POST">
                  @csrf
                  <div class="form-group">
                     <label for="email">Name:</label>
                     <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                     <label for="pwd">Email:</label>
                     <input type="email" class="form-control" id="pwd" name="email">
                  </div>
                  <div class="form-group">
                     <label for="pwd">Phone:</label>
                     <input type="phone" class="form-control" id="pwd" name="phone">
                  </div>
                  <div class="form-group">
                     <label for="pwd">State:</label>
                     <input type="text" class="form-control" id="pwd " name="state" >
                  </div>
                  <div class="form-group">
                     <label for="pwd">City:</label>
                     <input type="text" class="form-control" id="pwd" name="city">
                  </div>
                  <div class="form-group">
                     <label for="pwd">About:</label>
                     <input type="text" class="form-control" id="pwd" name="about" value="{{$product->name}}">
                  </div>
                  <div class="form-group">
                     <label for="pwd">Message:</label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="Write Message"></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
               </form>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
@endsection
