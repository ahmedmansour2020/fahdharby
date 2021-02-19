{{--
@extends('layout.layout')
@section('title','Home')
--}}
<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
$lang=LaravelLocalization::setLocale();
?>
@section('content')
<div class="container">
Hello
</div>
{{--
@endsection
@section('page_js')

@endsection
--}}