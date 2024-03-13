@extends('layouts.app')
@section('meta_title','')
@section('content')
<div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-white display-3">Tablets</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="/">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Tablets</p>
            </div>
        </div>
</div>


<div class="container">
   <div class="row">
   <div class="col-lg-9 col-md-12">
         <div class="table-responsives">
               <table class="table table-bordered table-striped table-hover datatable datatable-User myTable">
                  <thead>
                     <tr>
                        <th>Generic Name</th>
                        <th>Dosage Form</th>
                       
                        
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($product as $item)
                     <tr>
                            
                              <td>{{ $item->name }}</td>  
                              <td>{{ $item->composition }}</td>           
                       
                       
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         <div class="col-sm-12 col-md-12 col-lg-3">
            
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
                  <div class="col-md-12 text-center mt-4">
                     <button class="btn btn-theme" type><span>Send Messages</span>
                     </button>
                  </div>
               </form>
            </div>
         </div>
   </div>

</div>

@endsection