@extends('admin.app')

@section('title')
<x-custom.title></x-custom.title>
@endsection
@section('add-btn')
<li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('projects.create')}}" class="nav-link">New Entry</a>
</li>
@endsection

@section('sidebar')
<x-side-bar></x-side-bar>
@endsection
@section('main-section')
<div class="container-fluid">
@if (session()->has('status'))
    @include('admin.includes.status');
    
  @endif
  
</div><!-- /.container-fluid -->
@endsection

