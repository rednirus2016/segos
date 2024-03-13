@extends('layouts.app')
@section('meta_title',$category->name)
@section('meta_keywords',$category->name)
@section('meta_description',$category->name)
@section('meta_image')
@if($category->image)
content="{{ Request::root() }}/storage/{{$category->image}}"
@else
content="{{ Request::root() }}/images/logo-2.png"
@endif
@endsection
@section('content')


<div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-7">
                        <h2>{{$category->name}}</h2>
                    </div>

                    <div class="col-md-6 col-lg-5">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>{{$category->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<br><br>
<section class=" pb-80">
   <div class="container">
      <div class="row">
         
         <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="sidebar-cat">
               <h4 class="catr">All Categories</h4>
               <div class="list-group">
                  @foreach ($categories as $item)
                  @if($category->id == $item->id)
                  <a href="{{ $item->slug }}" class="active">
                  {{ $item->name }}
                  </a>
                  @else
                  <a href="{{ $item->slug }}" class="">
                  {{ $item->name }}
                  </a>
                  @endif
                  @endforeach
               </div>
            </div>
            <div class="form-groups">
               <h4 class="catr">Enquiry Now</h4>
               <form  class="row" method="post" action="/enquiry/store">
                  @csrf
                  <div id="formmessage"></div>
                  <div class="form-group col-md-12">
                     <input id="form_name" type="text" name="name" class="form-control" placeholder="Name" required="required">
                  </div>
                  <div class="form-group col-md-12">
                     <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required="required">
                  </div>
                  <div class="form-group col-md-12">
                     <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone" required="required">
                  </div>
                 
                  <div class="form-group col-md-12">
                     <textarea id="form_message" name="message" class="form-control" placeholder="Message" rows="3" required="required"></textarea>
                  </div>
                  <div class="col-md-12">
                     <button class="btn btn-theme" type><span>Send Messages</span>
                     </button>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-8 col-md-12">
         <div class="table-responsives">
               <table class="table table-bordered table-striped table-hover datatable datatable-User myTable">
                  <thead>
                  <tr>
                                       
                                        
                                       <!--<th>Image</th>-->
                                       <th>Sr</th>
                                       <th>Name</th>
                                       <th>Composition</th>
                                        
                                       <th>Dosage</th>
                                   </tr>
                  </thead>
                  <tbody>
                  <?php $x= 1 ?>
                                     @foreach ($products as $item)
                                        <tr>
                                            
                                              <!--<td>@if($item->image)-->
                                              <!--<img src="/{{$item->image}}" width="100px">-->
                                              <!--@else-->
                                              <!--<img src="/front_asset/images/p-demo.jpg" width="100px">-->
                                              <!--@endif</td>-->
                                            <td>{{$x++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->composition }}</td>
                                            <td>
                                                {{ $item->packing }}   
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="description">
               <p> <?php
                  echo html_entity_decode($category->description);
                  ?></p>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection