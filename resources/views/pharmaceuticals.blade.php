@extends('layouts.app')
@section('meta_title','')
@section('content')

<ul>
@foreach($res as $r)
<li><a href="/category/{{$r->composition}}/">{{$r->composition}}</a></li>
@endforeach
</ul>

<div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-white display-3">Pharmaceuticals</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="/">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Pharmaceuticals</p>
            </div>
        </div>
    </div>
    <div class="tablets">
       <div class="container">
          <div class="row">
             <div class="col-lg-12">
                   <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"><a href="/tablets">Tablets</a></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antacid">Antacid</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/anaesthetics">Anaesthetics</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antiemetic">Antiemetic</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/anthelmintics">Anthelmintics</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/anti-thyroid-drug">Anti Thyroid Drug</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antiandrogen">Antiandrogen</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antianginals">Antianginals</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antianxiety">Antianxiety</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antianxiolytic">Antianxiolytic</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antiasthmatic-drug">Antiasthmatic Drug</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antibacterials">Antibacterials</h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="tab-img">
                                  <h4><a href="/antibiotics">Antibiotics</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
            </div>
          </div>
       </div>
    </div>
@endsection