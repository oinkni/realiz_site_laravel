@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Members Directory</h2>


    <form method="GET" action="{{ route('members.index') }}" class="d-flex flex-column flex-md-row gap-2 mb-4 align-middle">
        <div class="form-group">
            <input type="text" value="{{ $filter->profession }}"
                name="profession" class="form-control form-control-sm" placeholder="Profession">
        </div>
        <div class="form-group">
            <input type="text" value="{{ $filter->company }}"
                name="company" class="form-control form-control-sm" placeholder="Company">
        </div>

        <div class="form-group">
            <select name="sort_by" class="form-control form-control-sm">
                <option value="created_at" {{ $filter->sort_by == 'created_at' ? 'selected' : '' }}>Newest</option>
                <option value="name" {{ $filter->sort_by == 'name' ? 'selected' : '' }}>Full Name</option>
            </select>
        </div>
        <button type="submit" class="btn btn-sm btn-secondary">Filter</button>
    </form>


    @if ($members->isEmpty())
    <div class="alert alert-info" role="alert">
        No members found.
    </div>
    @endif
    <div class="d-flex flex-column flex-md-row flex-wrap">
        @foreach ($members as $member)
        <div class="col-12 col-md-3 pb-4 pe-3">
            <div class="card">
                @if($member->profile_picture != null)
                <img src="{{ Storage::url($member->profile_picture) }}" class="card-img-top" />
                @else
                <img src="{{ asset('images/profile_default.jpg') }}" class="card-img-top" />
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $member->first_name . ' ' .  $member->last_name}}</h5>

                    <p class="card-text">
                        <strong>Profession:</strong> {{ $member->profession }} <br />
                        <strong>Company:</strong> {{ $member->company }}
                    </p>

                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mb-4">
        {{ $members->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection