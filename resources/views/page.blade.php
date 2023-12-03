@extends('layouts.front')

@section('title') {{$page->meta_title}} @endsection
@section('meta') {{$page->meta_description}} @endsection



@section('content')
  
  
   <div class="breadcrumb-area">
    <div class="container">
      <h1 class="breadcrumb-title">{{$page->meta_title}}</h1>
    </div>
   </div>

   <div class="page-content">
   		<div class="container">
   			{!!$page->body!!}
   		</div>
   		
   </div>





@endsection

