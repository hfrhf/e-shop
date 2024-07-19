

@extends('base')
@section('title','Products')



@include('admin.sidebar')
@section('content')

<x-form method='post' METHOD='POST' :update='$update' :categories='$categories'  />



@endsection


