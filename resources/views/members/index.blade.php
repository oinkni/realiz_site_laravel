@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Members List</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="GET" action="{{ route('members.index') }}">
        <input type="text" name="profession" placeholder="Profession">
        <input type="text" name="company" placeholder="Company">
        <select name="status">
            <option value="">-- Select Status --</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Add New Member</a>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Profession</th>
                <th>Company</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->last_name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->profession }}</td>
                <td>{{ $member->company }}</td>
                <td>{{ $member->status }}</td>
                <td>
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Areyou sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $members->links() }}
</div>
@endsection