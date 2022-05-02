@extends('app-layout')

@section('content')
    <h2>{{ $listing->title }}</h2>
    <p>{{ $listing->description }}</p>

    <a href="{{url()->previous()}}">Back</a>
@endsection

