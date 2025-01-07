@extends('layouts.app')

@section('content')
<h2>Dashboard</h2>
<div>
    <h3>Total Members: {{ $totalMembers }}</h3>
    <h3>Profession Distribution:</h3>
    <ul>
        <?php foreach ($professionDistribution as $profession): ?>
            <li class="d-flex flex-column flex-sm-row gap-2 mb-4 align-middle justify-content-sm-left">
                <span>{{ $profession->profession }} : {{ $profession->total }}</span>
                <a class="btn btn-primary btn-sm" href="{{ route('members.index', ['profession' => $profession->profession]) }}">See all</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
@endsection
