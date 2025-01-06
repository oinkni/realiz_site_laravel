<form action="{{ route('members.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control"
            value="{{ old('first_name', $member->first_name ??'') }}" required>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control"
            value="{{ old('last_name', $member->last_name ??'') }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control"
            value="{{ old('email', $member->email ??'') }}" required>
    </div>
    <div class="form-group">
        <label for="profession">Profession</label>
        <input type="text" name="profession" id="profession" class="form-control"
            value="{{ old('profession', $member->profession ??'') }}" required>
        <div class="invalid-feedback">Example invalid form file feedback</div>
    </div>
    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" name="company" id="company" class="form-control"
            value="{{ old('company', $member->company ??'') }}">
    </div>
    <div class="form-group">
        <label for="expertise">Expertise</label>
        <input type="text" name="expertise" id="expertise" class="form-control"
            value="{{ old('expertise', $member->expertise ??'') }}">
    </div>
    <div class="form-group">
        <label for="linkedin_profile">LinkedIn</label>
        <input type="text" name="linkedin_profile" id="linkedin_profile" class="form-control"
            value="{{ old('linkedin_profile', $member->linkedin_profile ??'') }}">
    </div>
    <!-- <div class="mb-3">
        <label for="profile_picture">LinkedIn</label>
        <input type="file" name="profile_picture" id="profile_picture" class="form-control"
            value="{{ old('profile_picture', $member->profile_picture ??'') }}" aria-label="profile picture">
    </div> -->
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>