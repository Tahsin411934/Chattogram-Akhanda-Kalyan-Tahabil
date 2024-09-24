<x-app-layout>
    <div class="grid  grid-cols-10 ">
        <div class="col-span-2 border-r border-gray-600 shadow-2xl">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-8 font-poppins">
            @section('title', 'Make A Deposit,')
            <div class="container mx-auto  ">
                @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif
                <div class=" text-center">
                    @include('clock')
                </div>
                <form action="{{ route('deposits.store') }}"
                    class="w-[65%] mx-auto bg-gray-800 py-3 border border-gray-700 mt-2 rounded-xl px-16" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-5  items-center">
                        <div class="col-span-2 mb-4 h-32 w-32  ">
                            <div id="member_image" class="border border-gray-600 rounded-lg h-32 w-32">
                                <img src="" width="350" height="350" id="image_display" class="h-32 w-32 rounded-lg p-2"
                                    style="display:none;">
                                <p id="image_path" class="text-gray-600 hidden -mb-10 "></p>
                            </div>
                        </div>
                        <div class="col-span-3 text-xl font-bold font-prata text-gray-400">
                            <h1>Make A Deposite</h1>
                            <div class="font-base text-sm mt-6">
                                <div id="date"></div>
                                <div id="time"></div>
                            </div>

                        </div>
                    </div>
                    <!-- Member ID field with datalist -->
                    <div class="mb-4">
                        <label for="member_id" class="block text-gray-50">Member ID</label>
                        <input list="members_list" id="member_id" name="member_id"
                            class="border rounded-lg p-2 w-full text-gray-900" required placeholder="Type to search...">

                        <!-- Datalist for providing suggestions -->
                        <datalist id="members_list">
                            <option value="">Select a Member</option>
                            @foreach($members as $member)
                            <option value="{{ $member->member_id }}">{{ $member->member_id }} -
                                {{ $member->member_name }}</option>
                            @endforeach
                        </datalist>
                    </div>

                    <div class="mb-4">
                        <label for="member_name" class="block text-gray-50">Member Name</label>
                        <input type="text" id="member_name" name="member_name" class="border rounded-lg p-2 w-full"
                            value="{{ old('member_name') }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="balance" class="block text-gray-50">Balance</label>
                        <input type="text" id="balance" name="balance" class="border rounded-lg p-2 w-full"
                            value="{{ old('balance') }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="deposit_amount" class="block text-gray-50">Deposit Amount</label>
                        <input type="number" id="deposit_amount" name="deposit_amount"
                            class="border rounded-lg p-2 w-full" value="{{ old('deposit_amount') }}" required>
                        @error('deposit_amount')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="current_balance" class="block text-gray-50">Current Balance</label>
                        <input type="text" id="current_balance" name="current_balance"
                            class="border rounded-lg p-2 w-full" value="{{ old('current_balance') }}" readonly>
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

                // Function to update member details when an ID is selected or typed
                function updateMemberDetails() {
                    const memberId = document.getElementById('member_id').value.trim();
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

                // Update current balance based on deposit amount
                function updateCurrentBalance() {
                    const memberBalance = parseFloat(document.getElementById('balance').value || 0);
                    const depositAmount = parseFloat(document.getElementById('deposit_amount').value || 0);
                    document.getElementById('current_balance').value = (memberBalance + depositAmount).toFixed(2);
                }

                // Attach event listeners
                document.getElementById('member_id').addEventListener('input', updateMemberDetails);
                document.getElementById('deposit_amount').addEventListener('input', updateCurrentBalance);

                // Clear fields if no valid member is selected
                function clearFields() {
                    document.getElementById('member_name').value = '';
                    document.getElementById('balance').value = '';
                    document.getElementById('current_balance').value = '';
                    document.getElementById('image_display').style.display = 'none';
                    document.getElementById('image_path').textContent = '';
                }

                // for date time
                function updateDateTime() {
                    const now = new Date();

                    // Format the date
                    const optionsDate = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    const formattedDate = now.toLocaleDateString('en-US', optionsDate);

                    // Format the time
                    const optionsTime = {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: false
                    };
                    const formattedTime = now.toLocaleTimeString('en-US', optionsTime);

                    // Display the date and time
                    document.getElementById('date').innerText = `Date: ${formattedDate}`;
                    document.getElementById('time').innerText = `Time: ${formattedTime}`;
                }

                // Update immediately and then every second
                updateDateTime();
                setInterval(updateDateTime, 1000);
                </script>

            </div>
        </div>
    </div>
</x-app-layout>