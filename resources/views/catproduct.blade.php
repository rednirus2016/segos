@extends('layouts.app')
@section('meta_title','')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-12 col-md-12">
         <div class="table-responsives">
               <table class="table table-bordered table-striped table-hover datatable datatable-User myTable">
                  <thead>
                     <tr>
                        <th>Generic Name</th>
                        <th>Dosage Form</th>
                        <th>Drug Category</th>
                        <th>Enquiry Now</th>
                       
                        
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($products as $item)
                     <tr>
                            
                              <td width="70">{{ $item->name }}</td>  
                              <td width="10">{{ $item->composition }}</td>     
                              <td width="10">{{ $item->packing }}</td> 
                              <td width="10">{{ $item->packing }}</td>       
                       
                       
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
    </div>
</div>

@endsection