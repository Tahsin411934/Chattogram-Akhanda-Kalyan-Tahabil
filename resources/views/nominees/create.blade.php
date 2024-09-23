<x-app-layout>
@section('title', 'Nominee Registration Form')
    <div class="mt-5 text-center">
        @include('clock')
       
    </div>

    <div class="container mx-auto p-4">
        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('nominees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" bg-gray-900 w-[60%] mx-auto rounded-xl">

                <div class=" p-5 rounded-xl">

                    <!-- Nominee Information -->
                    <div class="flex items-center gap-2">
                        <div class="mb-4 form-control w-full">
                            <label for="member_id" class="block text-gray-700">Member ID</label>
                            <select id="member_id" name="member_id" class="border rounded-lg p-2 w-full" required>
                                <option value="">Select a Member</option>
                                @foreach($members as $member)
                                <option value="{{ $member->member_id }}">{{ $member->member_id }} - {{ $member->member_name }}</option>
                                @endforeach
                            </select>
                            @error('member_id')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4 form-control w-full">
                            <label for="nominee_name" class="block text-gray-700">Nominee Name</label>
                            <input type="text" id="nominee_name" name="nominee_name" class="border rounded-lg p-2 w-full" value="{{ old('nominee_name') }}" required>
                            @error('nominee_name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="mb-4 form-control w-full">
                            <label for="nominee_age" class="block text-gray-700">Nominee Age</label>
                            <input type="number" id="nominee_age" name="nominee_age" class="border rounded-lg p-2 w-full" value="{{ old('nominee_age') }}" required>
                            @error('nominee_age')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4 form-control w-full">
                            <label for="nominee_address" class="block text-gray-700">Nominee Address</label>
                            <textarea id="nominee_address" name="nominee_address" class="border rounded-lg p-2 w-full" required>{{ old('nominee_address') }}</textarea>
                            @error('nominee_address')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="mb-4 form-control w-full">
                            <label for="relation_with_member" class="block text-gray-700">Relation with Member</label>
                            <input type="text" id="relation_with_member" name="relation_with_member" class="border rounded-lg p-2 w-full" value="{{ old('relation_with_member') }}" required>
                            @error('relation_with_member')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4 form-control w-full">
                            <label for="get_percentage" class="block text-gray-700">Get Percentage</label>
                            <input type="number" id="get_percentage" name="get_percentage" class="border rounded-lg p-2 w-full" value="{{ old('get_percentage') }}" required>
                            @error('get_percentage')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                </div>

                <!-- File Upload Section -->
                <div class="w-[70%] mx-auto">
                    <div class="flex items-center justify-center gap-2 ">
                        <div class="mb-4">
                            <div id="nominee_image_preview" class="mt-2 border border-gray-400 h-56 w-56">
                                <img id="nominee_image_preview_img" src="" alt="Nominee Image Preview" style="display: none; max-width: 100%; height: auto;">
                            </div>
                            <label for="nominee_image" class="block text-gray-50">Nominee Image</label>
                            <input type="file" id="nominee_image" name="nominee_image" class=" p-2 w-full text-gray-50" accept="image/*">
                            @error('nominee_image')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Image preview -->

                        </div>

                        <div class="mb-4">
                            <div id="nominee_signature_preview" class="mt-2 border border-gray-400 h-56 w-56">
                                <img id="nominee_signature_preview_img" src="" alt="Nominee Signature Preview" style="display: none; max-width: 100%; height: auto;">
                            </div>
                            <label for="nominee_signature" class="block text-gray-50">Nominee Signature</label>
                            <input type="file" id="nominee_signature" name="nominee_signature" class="text-gray-50 p-2 w-full" accept="image/*">
                            @error('nominee_signature')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Signature preview -->

                        </div>
                    </div>
                </div>
                <div class="text-center p-10">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add Nominee</button>
                    <div class="mb-4 mt-5 w-full flex justify-end">
                        <a href="/nominees/create" class="bg-gray-800 border border-blue-50 text-white rounded-lg px-4 py-2">Add another Nominee</a>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nomineeImageInput = document.getElementById('nominee_image');
            const nomineeImagePreview = document.getElementById('nominee_image_preview_img');
            const nomineeSignatureInput = document.getElementById('nominee_signature');
            const nomineeSignaturePreview = document.getElementById('nominee_signature_preview_img');

            nomineeImageInput.addEventListener('change', function() {
                const file = nomineeImageInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        nomineeImagePreview.src = e.target.result;
                        nomineeImagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    nomineeImagePreview.src = '';
                    nomineeImagePreview.style.display = 'none';
                }
            });

            nomineeSignatureInput.addEventListener('change', function() {
                const file = nomineeSignatureInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        nomineeSignaturePreview.src = e.target.result;
                        nomineeSignaturePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    nomineeSignaturePreview.src = '';
                    nomineeSignaturePreview.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>