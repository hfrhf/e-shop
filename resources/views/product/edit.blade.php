@extends('base')
@section('title','Edit')



@include('admin.sidebar')
@section('content')

<x-form method='post' :product='$product'   METHOD='PUT'  :update='$update' :categories='$categories' />



@endsection

