<x-app-layout>
@section('title', 'Make A Deposit,')
    <div class="container mx-auto p-4 ">
        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        <div class="mt-5 text-center">
        @include('clock')

       

           

        </div>
        <form action="{{ route('deposits.store') }}" class="w-[65%]  mx-auto bg-gray-900 py-3 rounded-xl px-16" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4 h-32 w-52  rounded mx-auto">

                <div id="member_image" class="border border-gray-600 rounded-lg h-32">
                    <img src="" width="250" height="250" id="image_display" class="h-32 p-2 w-full" style="display:none;">
                    <p id="image_path" class="text-gray-600 mt-2 "></p>
                </div>
            </div>
            <div class="mb-4">
                <label for="member_id" class="block text-gray-50">Member ID</label>
                <select id="member_id" name="member_id" class="border rounded-lg p-2 w-full text-gray-900" required onchange="updateMemberDetails()">
                    <option value="">Select a Member</option>
                    @foreach($members as $member)
                    <option value="{{ $member->member_id }}">{{ $member->member_id }} - {{ $member->member_name }}</option>
                    @endforeach
                </select>
                @error('member_id')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="member_name" class="block text-gray-50">Member Name</label>
                <input type="text" id="member_name" name="member_name" class="border rounded-lg p-2 w-full" value="{{ old('member_name') }}" readonly>
            </div>

            <div class="mb-4">
                <label for="balance" class="block text-gray-50">Balance</label>
                <input type="text" id="balance" name="balance" class="border rounded-lg p-2 w-full" value="{{ old('balance') }}" readonly>
            </div>

            <div class="mb-4">
                <label for="deposit_amount" class="block text-gray-50">Deposit Amount</label>
                <input type="number" id="deposit_amount" name="deposit_amount" class="border rounded-lg p-2 w-full" value="{{ old('deposit_amount') }}" required>
                @error('deposit_amount')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="current_balance" class="block text-gray-50">Current Balance</label>
                <input type="text" id="current_balance" name="current_balance" class="border rounded-lg p-2 w-full" value="{{ old('current_balance') }}" readonly>
            </div>



            <div class="mb-4 hidden">
                <label for="deposit_image" class="block text-gray-50">Deposit Image</label>
                <input type="file" id="deposit_image" name="deposit_image" class="border p-2 w-full">
                @error('deposit_image')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Make A Deposit</button>
            </div>

        </form>

        <script>
    // Convert PHP variable to JavaScript object
    const members = @json($members);

    function updateMemberDetails() {
        const memberId = document.getElementById('member_id').value;
        const member = members.find(member => member.member_id === memberId);

        if (member) {
            document.getElementById('member_name').value = member.member_name;
            document.getElementById('balance').value = member.balance;
            updateCurrentBalance();
            
            const imageUrl = member.image ? `/${member.image}` : '';
            const imageDisplay = document.getElementById('image_display');
            const imagePath = document.getElementById('image_path');
            imageDisplay.src = imageUrl;
            imagePath.textContent = imageUrl; // Display the image path
            imageDisplay.style.display = imageUrl ? 'block' : 'none';
        } else {
            clearFields();
        }
    }

    function updateCurrentBalance() {
        const memberBalance = parseFloat(document.getElementById('balance').value || 0);
        const depositAmount = parseFloat(document.getElementById('deposit_amount').value || 0);
        document.getElementById('current_balance').value = (memberBalance + depositAmount).toFixed(2);
    }

    // Attach an event listener to the deposit_amount field
    document.getElementById('deposit_amount').addEventListener('input', updateCurrentBalance);

    function clearFields() {
        document.getElementById('member_name').value = '';
        document.getElementById('balance').value = '';
        document.getElementById('current_balance').value = '';
        document.getElementById('image_display').style.display = 'none';
        document.getElementById('image_path').textContent = '';
    }
</script>

    </div>
</x-app-layout>