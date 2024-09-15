<x-app-layout>
    <style>
        .preview-container {
            margin-bottom: 20px;
        }

        .preview-container img {
            max-width: 200px;
            max-height: 200px;
            display: block;
            margin-bottom: 10px;
        }
    </style>
    @include('layouts.title')

    @if(session('success'))
    <p class="text-green-500 mb-4">{{ session('success') }}</p>
    @endif
    <div class="w-[90%] mx-auto mt-10  bg-slate-800 p-5 text-gray-50">




        @if(session('success'))
        <p class="text-green-500 mb-4">{{ session('success') }}</p>
        @endif

        <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-5 gap-5">

                <div class="col-span-2">


                    <!-- Member Details -->
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
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Submit</button>
                    </div>
                </div>
                <div class="col-span-3 flex  justify-center">
                    <!-- Image Upload -->
                    <div>
                        <div class="border border-gray-400 h-56 w-56">
                            <div id="image-preview"></div>

                        </div>


                        <div class="preview-container" id="image-preview-container">
                            <label for="image" class="block mb-2">Upload Image</label>
                            <input type="file" id="image" name="image" class="border p-2 w-full" onchange="previewImage()">
                            @error('image')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">


                        <!-- Signature Upload -->
                        <div class="border border-gray-400 h-56 w-56">
                            <div id="signature-preview"></div>
                        </div>
                        <div class="preview-container" id="signature-preview-container">
                            <label for="signature" class="block mb-2">Upload Signature</label>
                            <input type="file" id="signature" name="signature" class="border p-2 w-full" onchange="previewSignature()">
                            @error('signature')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            function previewImage() {
                const imageInput = document.getElementById('image');
                const imagePreview = document.getElementById('image-preview');

                // Clear previous preview
                imagePreview.innerHTML = '';

                if (imageInput.files && imageInput.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        imagePreview.appendChild(img);
                    }

                    reader.readAsDataURL(imageInput.files[0]);
                }
            }

            function previewSignature() {
                const signatureInput = document.getElementById('signature');
                const signaturePreview = document.getElementById('signature-preview');

                // Clear previous preview
                signaturePreview.innerHTML = '';

                if (signatureInput.files && signatureInput.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        signaturePreview.appendChild(img);
                    }

                    reader.readAsDataURL(signatureInput.files[0]);
                }
            }
        </script>
</x-app-layout>