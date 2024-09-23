<x-app-layout>
@section('title', 'Make A Withdrawal,') <div class="container mx-auto p-4">
    <div class="mt-5 text-center">
        @include('clock')
    </div>
    
        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('withdrawals.store') }}" class="w-[65%] mx-auto bg-gray-900 py-3 rounded-xl px-16" method="POST">
            @csrf
            <div class="mb-4">
                <label for="member_id" class="block text-gray-900">Member ID</label>
                <select id="member_id" name="member_id" class="border rounded-lg p-2 w-full text-gray-900" required onchange="updateMemberDetails()">
                    <option value="">Select a Member</option>
                    @foreach($members as $member)
                    <option value="{{ $member->member_id }}">{{ $member->member_id }}</option>
                    @endforeach
                </select>
                @error('member_id')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="member_name" class="block text-gray-900">Member Name</label>
                <input type="text" id="member_name" name="member_name" class="border rounded-lg p-2 w-full" value="{{ old('member_name') }}" readonly>
            </div>

            <div class="mb-4">
                <label for="balance" class="block text-gray-900">Balance</label>
                <input type="text" id="balance" name="balance" class="border rounded-lg p-2 w-full" value="{{ old('balance') }}" readonly>
            </div>

            <div class="mb-4">
                <label for="withdraw_amount" class="block text-gray-900">Withdrawal Amount</label>
                <input type="number" id="withdraw_amount" name="withdraw_amount" class="border rounded-lg p-2 w-full" value="{{ old('withdraw_amount') }}" required>
                @error('withdraw_amount')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="balance_after" class="block text-gray-900">Balance After Withdrawal</label>
                <input type="text" id="balance_after" name="balance_after" class="border rounded-lg p-2 w-full" value="{{ old('balance_after') }}" readonly>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Make A Withdrawal</button>
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
                    const withdrawAmount = parseFloat(document.getElementById('withdraw_amount').value || 0);
                    document.getElementById('balance_after').value = (parseFloat(member.balance) - withdrawAmount).toFixed(2);
                } else {
                    document.getElementById('member_name').value = '';
                    document.getElementById('balance').value = '';
                    document.getElementById('balance_after').value = '';
                }
            }
        </script>
    </div>
</x-app-layout>