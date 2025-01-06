@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Member</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        @include('members.form')
    </form>
</div>
@endsection