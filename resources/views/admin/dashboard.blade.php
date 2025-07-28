@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Welcome {{ Auth::user()->name }}</h1>
    <p>This is the main dashboard.</p>
@endsection