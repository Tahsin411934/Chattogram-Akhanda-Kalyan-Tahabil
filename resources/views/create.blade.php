<x-app-layout>
<body class="p-6">
    <h1 class="text-xl font-bold mb-4">Add New Member</h1>

    @if(session('success'))
        <p class="text-green-500 mb-4">{{ session('success') }}</p>
    @endif

    <form action="{{ route('member.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="member_id" class="block mb-2">Member ID</label>
            <input type="text" id="member_id" name="member_id" value="{{ old('member_id') }}" required class="border p-2 w-full">
            @error('member_id')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="member_name" class="block mb-2">Member Name</label>
            <input type="text" id="member_name" name="member_name" value="{{ old('member_name') }}" required class="border p-2 w-full">
            @error('member_name')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="father_name" class="block mb-2">Father's Name</label>
            <input type="text" id="father_name" name="father_name" value="{{ old('father_name') }}" required class="border p-2 w-full">
            @error('father_name')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="mother_name" class="block mb-2">Mother's Name</label>
            <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required class="border p-2 w-full">
            @error('mother_name')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="spouse_name" class="block mb-2">Spouse's Name (Optional)</label>
            <input type="text" id="spouse_name" name="spouse_name" value="{{ old('spouse_name') }}" class="border p-2 w-full">
            @error('spouse_name')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="permanent_address" class="block mb-2">Permanent Address</label>
            <textarea id="permanent_address" name="permanent_address" required class="border p-2 w-full">{{ old('permanent_address') }}</textarea>
            @error('permanent_address')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="present_address" class="block mb-2">Present Address</label>
            <textarea id="present_address" name="present_address" required class="border p-2 w-full">{{ old('present_address') }}</textarea>
            @error('present_address')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <input type="checkbox" id="copy_address" name="copy_address" onclick="copyAddress()">
            <label for="copy_address" class="ml-2">Same as Present Address</label>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Submit</button>
        </div>
    </form>

    <script>
        function copyAddress() {
            const copyCheckbox = document.getElementById('copy_address');
            const presentAddress = document.getElementById('present_address');
            const permanentAddress = document.getElementById('permanent_address');

            if (copyCheckbox.checked) {
                permanentAddress.value = presentAddress.value;
            } else {
                permanentAddress.value = '';
            }
        }
    </script>
</body>
</html>
