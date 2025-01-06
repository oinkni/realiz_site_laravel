@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Member</h1>
    <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('members.form', ['member' => $member])
    </form>
</div>
@endsection