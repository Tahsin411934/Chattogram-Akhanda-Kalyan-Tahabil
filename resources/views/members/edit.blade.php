@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Member</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="member_id">Member ID:</label>
            <input type="text" class="form-control" id="member_id" name="member_id" value="{{ $member->member_id }}" disabled>
        </div>
        
        <div class="form-group">
            <label for="member_name">Member Name:</label>
            <input type="text" class="form-control" id="member_name" name="member_name" value="{{ $member->member_name }}" disabled required>
        </div>

        <div class="form-group">
            <label for="father_name">Father's Name:</label>
            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ $member->father_name }}" disabled required>
        </div>

        <div class="form-group">
            <label for="mother_name">Mother's Name:</label>
            <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ $member->mother_name }}" disabled required>
        </div>

        <div class="form-group">
            <label for="spouse_name">Spouse's Name:</label>
            <input type="text" class="form-control" id="spouse_name" name="spouse_name" value="{{ $member->spouse_name }}" disabled>
        </div>

        <div class="form-group">
            <label for="permanent_address">Permanent Address:</label>
            <textarea class="form-control" id="permanent_address" name="permanent_address" disabled required>{{ $member->permanent_address }}</textarea>
        </div>

        <div class="form-group">
            <label for="present_address">Present Address:</label>
            <textarea class="form-control" id="present_address" name="present_address" disabled required>{{ $member->present_address }}</textarea>
        </div>

        <div class="form-group">
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ $member->mobile_number }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" disabled>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $member->date_of_birth }}" disabled>
        </div>

        <div class="form-group">
            <label for="national_id_number">National ID Number:</label>
            <input type="text" class="form-control" id="national_id_number" name="national_id_number" value="{{ $member->national_id_number }}" disabled>
        </div>

        <div class="form-group">
            <label for="occupation">Occupation:</label>
            <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $member->occupation }}" disabled>
        </div>

        <div class="form-group">
            <label for="educational_qualification">Educational Qualification:</label>
            <input type="text" class="form-control" id="educational_qualification" name="educational_qualification" value="{{ $member->educational_qualification }}" disabled>
        </div>

        <div class="form-group">
            <label for="akhanda_kalyan_tahabil">Akhanda Kalyan Tahabil:</label>
            <input type="text" class="form-control" id="akhanda_kalyan_tahabil" name="akhanda_kalyan_tahabil" value="{{ $member->akhanda_kalyan_tahabil }}" disabled>
        </div>

        <div class="form-group">
            <label for="akhanda_mondoli_address">Akhanda Mondoli Address:</label>
            <input type="text" class="form-control" id="akhanda_mondoli_address" name="akhanda_mondoli_address" value="{{ $member->akhanda_mondoli_address }}" disabled>
        </div>

        <div class="form-group">
            <label for="membership_id">Membership ID:</label>
            <input type="text" class="form-control" id="membership_id" name="membership_id" value="{{ $member->membership_id }}" disabled>
        </div>

        <div class="form-group">
            <label>Member Image:</label><br>
            <img src="{{ asset($member->member_image) }}" alt="Member Image" width="100" height="100">
        </div>

        <div class="form-group">
            <label>Signature Image:</label><br>
            <img src="{{ asset($member->signature_image) }}" alt="Signature Image" width="100" height="100">
        </div>
        
        <button type="button" class="btn btn-primary" id="edit-button">Edit</button>
        <button type="submit" class="btn btn-success" id="save-button" style="display:none;">Save</button>
    </form>
</div>

<script>
    document.getElementById('edit-button').onclick = function() {
        var inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.disabled = false;
        });
        this.style.display = 'none';
        document.getElementById('save-button').style.display = 'block';
    };
</script>
@endsection
