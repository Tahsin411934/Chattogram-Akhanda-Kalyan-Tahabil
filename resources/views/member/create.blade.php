<x-app-layout>
    <style>
        .preview-container {
            margin-bottom: 20px;
        }

        /* .preview-container img {
            max-width: 200px;
            max-height: 200px;
            display: block;
            margin-bottom: 10px;

        } */

        .preview-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            margin-top: 22px;
            /* Adjusts the image to cover the container without distortion */
        }
    </style>
     @section('title', 'Member Registration Form,')
    <div class="mt-5 text-center">
        @include('clock')
       
    </div>


    @if(session('success'))
    <p class="bg-green-100 text-green-700 p-4 rounded mb-4 w-[93%] mx-auto ">{{ session('success') }}</p>
    @endif

    <div class="w-[90%] mx-auto  p-5 ">
        <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid items-start grid-cols-5 gap-16">

                <!-- Member Details -->
                <div class="col-span-3 bg-slate-800 p-8 border border-gray-800 shadow-lg rounded-xl">
                    <div class="flex items-center justify-center  gap-2">


                        <!-- Member ID -->
                        <div class="mb-4 form-control w-full">
                            <label for="member_id" class="block text-gray-50 mb-2">Member ID</label>
                            <input type="text" id="member_id" name="member_id" value="{{ old('member_id') }}" required class="border rounded-lg text-gray-900 p-2 w-full">
                            @error('member_id')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Member Name -->
                        <div class="mb-4 form-control w-full">
                            <label for="member_name" class="block text-gray-50 mb-2">Member Name</label>
                            <input type="text" id="member_name" name="member_name" value="{{ old('member_name') }}" required class="border rounded-lg p-2 w-full">
                            @error('member_name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <!-- Father's Name -->
                        <div class="mb-4 form-control w-full">
                            <label for="father_name" class="block text-gray-50 mb-2">Father's Name</label>
                            <input type="text" id="father_name" name="father_name" value="{{ old('father_name') }}" required class="border rounded-lg p-2 w-full">
                            @error('father_name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Mother's Name -->
                        <div class="mb-4 form-control w-full">
                            <label for="mother_name" class="block text-gray-50 mb-2">Mother's Name</label>
                            <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required class="border rounded-lg p-2 w-full">
                            @error('mother_name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <!-- Spouse's Name -->
                        <div class="mb-4 form-control w-full">
                            <label for="spouse_name" class="block text-gray-50 mb-2">Spouse's Name (Optional)</label>
                            <input type="text" id="spouse_name" name="spouse_name" value="{{ old('spouse_name') }}" class="border rounded-lg p-2 w-full">
                            @error('spouse_name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Mobile Number -->
                        <div class="mb-4 form-control w-full">
                            <label for="mobile_number" class="block text-gray-50 mb-2">Mobile Number</label>
                            <input type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" class="border rounded-lg p-2 w-full">
                            @error('mobile_number')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Permanent Address -->
                    <div>


                        <div class="mb-4">
                            <label for="permanent_address" class="block text-gray-50 mb-2">Permanent Address</label>
                            <textarea id="permanent_address" name="permanent_address" required class="border rounded-lg p-2 w-full">{{ old('permanent_address') }}</textarea>
                            @error('permanent_address')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Present Address -->
                        <div class="mb-4">
                            <label for="present_address" class="block text-gray-50 mb-2">Present Address</label>
                            <textarea id="present_address" name="present_address" required class="border rounded-lg p-2 w-full">{{ old('present_address') }}</textarea>
                            @error('present_address')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <!-- Email -->
                        <div class="mb-4 form-control w-full">
                            <label for="email" class="block text-gray-50 mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="border rounded-lg p-2 w-full">
                            @error('email')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="mb-4 form-control w-full">
                            <label for="date_of_birth" class="block text-gray-50 mb-2">Date of Birth</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="border rounded-lg p-2 w-full">
                            @error('date_of_birth')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <!-- National ID Number -->
                        <div class="mb-4 form-control w-full">
                            <label for="national_id_number" class="block text-gray-50 mb-2">National ID Number</label>
                            <input type="text" id="national_id_number" name="national_id_number" value="{{ old('national_id_number') }}" class="border rounded-lg p-2 w-full">
                            @error('national_id_number')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Occupation -->
                        <div class="mb-4 form-control w-full">
                            <label for="occupation" class="block text-gray-50 mb-2">Occupation</label>
                            <input type="text" id="occupation" name="occupation" value="{{ old('occupation') }}" class="border rounded-lg p-2 w-full">
                            @error('occupation')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <!-- Educational Qualification -->
                        <div class="mb-4 form-control w-full">
                            <label for="educational_qualification" class="block text-gray-50 mb-2">Educational Qualification</label>
                            <input type="text" id="educational_qualification" name="educational_qualification" value="{{ old('educational_qualification') }}" class="border rounded-lg p-2 w-full">
                            @error('educational_qualification')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Akhanda Kalyan Tahabil -->
                        <div class="mb-4 form-control w-full">
                            <label for="akhanda_kalyan_tahabil" class="block text-gray-50 mb-2">Member of Tahabil</label>
                            <select id="akhanda_kalyan_tahabil" name="akhanda_kalyan_tahabil" class="border rounded-lg p-2 w-full">
                                <option value="">Select</option>
                                <option value="chittagong" {{ old('akhanda_kalyan_tahabil') == 'chittagong' ? 'selected' : '' }}>Chittagong akhanda kalyan tahabil</option>
                                <option value="dhaka" {{ old('akhanda_kalyan_tahabil') == 'dhaka' ? 'selected' : '' }}>Dhaka akhanda kalyan tahabil</option>
                                <option value="coxbazar" {{ old('akhanda_kalyan_tahabil') == 'coxbazar' ? 'selected' : '' }}>Cox's Bazar akhanda kalyan tahabil</option>
                            </select>
                            @error('akhanda_kalyan_tahabil')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <!-- Akhanda Mondoli Address -->
                        <div class="mb-4 form-control w-full">
                            <label for="akhanda_mondoli_address" class="block text-gray-50 rounded-lg mb-2">Address Tahabil</label>
                            <input type="text" id="akhanda_mondoli_address" name="akhanda_mondoli_address" value="{{ old('akhanda_mondoli_address') }}" class="border rounded-lg p-2 w-full">
                            @error('akhanda_mondoli_address')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Membership ID -->
                        <div class="mb-4 form-control w-full">
                            <label for="membership_id" class="block text-gray-50 mb-2">Membership ID</label>
                            <input type="text" id="membership_id" name="membership_id" value="{{ old('membership_id') }}" class="border rounded-lg p-2 w-full">
                            @error('membership_id')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                     <div class="flex justify-center items-center w-full">
                     <div class="mb-4 form-control w-full">
                        <button type="submit" class="bg-blue-600  text-white rounded-lg px-4 py-2">Add New Member</button>
                    </div>

                     <div class="mb-4 form-control w-full">
                        <a href="/nominees/create" class="bg-gray-800 border border-blue-50   text-white rounded-lg px-4 py-2">Add a Nominee</a>
                    </div>
                   
                     </div>
                   
                    
                </div>

                <!-- Image and Signature Uploads -->
                <div class="col-span-2">
                    <div>
                        <div class=" flex  items-center mt-32 justify-center gap-5">



                            <!-- Image Upload -->
                            <div>
                                <div class="border border-gray-400 h-56 w-56 flex items-center justify-center">
                                    <div id="image-preview" class="preview-container "></div>
                                </div>
                                <div class="preview-container" id="image-preview-container">
                                    <label for="image" class="block mb-2">Upload Image</label>
                                    <input type="file" id="image" name="image" class="border p-2 w-full" onchange="previewImage()">
                                    @error('image')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Signature Upload -->
                            <div>
                                <div class="border border-gray-400 h-56 w-56 flex items-center justify-center">
                                    <div id="signature-preview" class="preview-container"></div>
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

    </div>
</x-app-layout>