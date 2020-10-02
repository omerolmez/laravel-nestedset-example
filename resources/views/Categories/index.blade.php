@extends('Layouts.app')
@section('title', 'Category Create')

@section("content")
    <x-TreeBuilder :categories="$categories" type="list"/>
@endsection

