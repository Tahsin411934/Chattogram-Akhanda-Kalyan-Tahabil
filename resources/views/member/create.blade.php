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
    <div class="grid grid-cols-10  font-poppins">
        <div class="col-span-2 border-r shadow-2xl border-gray-700">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-8">


            @if(session('success'))
            <p class="bg-green-100 text-green-700 p-4 rounded  w-[93%] mx-auto ">{{ session('success') }}</p>
            @endif
            <div class="w-[70%] mx-auto  p-5 ">
                <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm()">
                    @csrf

                    <div class="bg-slate-800  p-8 border border-gray-600 shadow-lg rounded-xl">
                        <div class="text-center pb-8 text-xl text-[#95A5BC] font-semibold">
                            <h2>
                                Provide Your Information To
                            </h2>
                            <h1 class="font-bold font-prata text-white">
                                Be A Member
                            </h1>
                        </div>
                        <!-- Member Details -->
                        <div class=" ">
                            <div class="flex items-center justify-center  gap-2">


                                <!-- Member ID -->
                                <div class="mb-4 form-control w-full">
                                    <label for="member_id" class="block text-gray-50 mb-2">Member ID</label>
                                    <input type="text" id="member_id" name="member_id" value="{{ old('member_id') }}"
                                        required class="border rounded-lg text-gray-900 p-2 w-full">
                                    @error('member_id')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Member Name -->
                                <div class="mb-4 form-control w-full">
                                    <label for="member_name" class="block text-gray-50 mb-2">Member Name</label>
                                    <input type="text" id="member_name" name="member_name"
                                        value="{{ old('member_name') }}" required class="border rounded-lg p-2 w-full">
                                    @error('member_name')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- Father's Name -->
                                <div class="mb-4 form-control w-full">
                                    <label for="father_name" class="block text-gray-50 mb-2">Father's Name</label>
                                    <input type="text" id="father_name" name="father_name"
                                        value="{{ old('father_name') }}" required class="border rounded-lg p-2 w-full">
                                    @error('father_name')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Mother's Name -->
                                <div class="mb-4 form-control w-full">
                                    <label for="mother_name" class="block text-gray-50 mb-2">Mother's Name</label>
                                    <input type="text" id="mother_name" name="mother_name"
                                        value="{{ old('mother_name') }}" required class="border rounded-lg p-2 w-full">
                                    @error('mother_name')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- Spouse's Name -->
                                <div class="mb-4 form-control w-full">
                                    <label for="spouse_name" class="block text-gray-50 mb-2">Spouse's Name
                                        (Optional)</label>
                                    <input type="text" id="spouse_name" name="spouse_name"
                                        value="{{ old('spouse_name') }}" class="border rounded-lg p-2 w-full">
                                    @error('spouse_name')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Mobile Number -->
                                <div class="mb-4 form-control w-full">
                                    <label for="mobile_number" class="block text-gray-50 mb-2">Mobile Number</label>
                                    <input type="text" id="mobile_number" name="mobile_number"
                                        value="{{ old('mobile_number') }}" class="border rounded-lg p-2 w-full">
                                    @error('mobile_number')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Permanent Address -->
                            <div>


                                <div class="mb-4">
                                    <label for="permanent_address" class="block text-gray-50 mb-2">Permanent
                                        Address</label>
                                    <textarea id="permanent_address" name="permanent_address" required
                                        class="border rounded-lg p-2 w-full">{{ old('permanent_address') }}</textarea>
                                    @error('permanent_address')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Present Address -->
                                <div class="mb-4">
                                    <label for="present_address" class="block text-gray-50 mb-2">Present Address</label>
                                    <textarea id="present_address" name="present_address" required
                                        class="border rounded-lg p-2 w-full">{{ old('present_address') }}</textarea>
                                    @error('present_address')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <!-- Email -->
                                <div class="mb-4 form-control w-full">
                                    <label for="email" class="block text-gray-50 mb-2">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="border rounded-lg p-2 w-full">
                                    @error('email')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Date of Birth -->
                                <div class="mb-4 form-control w-full">
                                    <label for="date_of_birth" class="block text-gray-50 mb-2">Date of Birth</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth"
                                        value="{{ old('date_of_birth') }}" class="border rounded-lg p-2 w-full">
                                    @error('date_of_birth')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- National ID Number -->
                                <div class="mb-4 form-control w-full">
                                    <label for="national_id_number" class="block text-gray-50 mb-2">National ID
                                        Number</label>
                                    <input type="text" id="national_id_number" name="national_id_number"
                                        value="{{ old('national_id_number') }}" class="border rounded-lg p-2 w-full">
                                    @error('national_id_number')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Occupation -->
                                <div class="mb-4 form-control w-full">
                                    <label for="occupation" class="block text-gray-50 mb-2">Occupation</label>
                                    <input type="text" id="occupation" name="occupation" value="{{ old('occupation') }}"
                                        class="border rounded-lg p-2 w-full">
                                    @error('occupation')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- Educational Qualification -->
                                <div class="mb-4 form-control w-full">
                                    <label for="educational_qualification" class="block text-gray-50 mb-2">Educational
                                        Qualification</label>
                                    <input type="text" id="educational_qualification" name="educational_qualification"
                                        value="{{ old('educational_qualification') }}"
                                        class="border rounded-lg p-2 w-full">
                                    @error('educational_qualification')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Akhanda Kalyan Tahabil -->
                                <div class="mb-4 form-control w-full">
                                    <label for="akhanda_kalyan_tahabil" class="block text-gray-50 mb-2">Member of
                                        Tahabil</label>
                                    <select id="akhanda_kalyan_tahabil" name="akhanda_kalyan_tahabil"
                                        class="border rounded-lg p-2 w-full">
                                        <option value="">Select</option>
                                        <option value="chittagong"
                                            {{ old('akhanda_kalyan_tahabil') == 'chittagong' ? 'selected' : '' }}>
                                            Chittagong akhanda kalyan tahabil</option>
                                        <option value="dhaka"
                                            {{ old('akhanda_kalyan_tahabil') == 'dhaka' ? 'selected' : '' }}>Dhaka
                                            akhanda kalyan tahabil</option>
                                        <option value="coxbazar"
                                            {{ old('akhanda_kalyan_tahabil') == 'coxbazar' ? 'selected' : '' }}>Cox's
                                            Bazar akhanda kalyan tahabil</option>
                                    </select>
                                    @error('akhanda_kalyan_tahabil')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- Akhanda Mondoli Address -->
                                <div class="mb-4 form-control w-full">
                                    <label for="akhanda_mondoli_address"
                                        class="block text-gray-50 rounded-lg mb-2">Address Tahabil</label>
                                    <input type="text" id="akhanda_mondoli_address" name="akhanda_mondoli_address"
                                        value="{{ old('akhanda_mondoli_address') }}"
                                        class="border rounded-lg p-2 w-full">

                                </div>

                                <!-- Membership ID -->
                                <div class="mb-4 form-control w-full">
                                    <label for="membership_id" class="block text-gray-50 mb-2">Membership ID</label>
                                    <input type="number" id="membership_id" name="membership_id"
                                        value="{{ $totalMembers+1 }}" class="border rounded-lg p-2 w-full" readonly>

                                </div>

                            </div>




                        </div>

                        <!-- Image and Signature Uploads -->
                        <div class="col-span-2 mx-auto w-[85%]">
                            <div>
                                <div class="flex items-center justify-center gap-10 mt-8">

                                    <!-- Image Upload Section -->
                                    <div class="flex flex-col ">
                                        <div
                                            class="border border-gray-400 h-56 w-56 flex items-center justify-center relative mb-4">
                                            <div id="image-preview" class="preview-container"></div>
                                            <div id="camera-container"
                                                class="hidden absolute top-0 left-0 w-full h-full">
                                                <video id="video" class="w-full h-full" autoplay></video>
                                                <button type="button" class="bg-blue-600 text-white rounded-lg mt-2"
                                                    onclick="capturePhoto('image')">Capture Image</button>
                                                <canvas id="canvas" class="hidden"></canvas>
                                            </div>
                                        </div>
                                        <div class="preview-container" id="image-preview-container">
                                            <label for="image" class="block w-56 mb-2">Upload Image</label>
                                            <input type="file" id="image" name="image" class="border w-56 p-2"
                                                onchange="previewImage('image')">
                                            <button type="button"
                                                class="bg-slate-700 text-white rounded-lg px-4 py-2 mt-2"
                                                onclick="startCamera('image')">Open Camera</button>
                                        </div>
                                    </div>

                                    <!-- Signature Upload Section -->
                                    <div class="flex flex-col ">
                                        <div
                                            class="border border-gray-400 h-56 w-56 flex items-center justify-center relative mb-4">
                                            <div id="signature-preview" class="preview-container"></div>
                                            <div id="signature-camera-container"
                                                class="hidden absolute top-0 left-0 w-full h-full">
                                                <video id="signature-video" class="w-full h-full" autoplay></video>
                                                <button type="button" class="bg-blue-600 text-white rounded-lg mt-2"
                                                    onclick="capturePhoto('signature')">Capture Signature</button>
                                            </div>
                                        </div>
                                        <div class="preview-container" id="signature-preview-container">
                                            <label for="signature" class="block w-56 mb-2">Upload Signature
                                                Image</label>
                                            <input type="file" id="signature" name="signature" class="border w-56 p-2"
                                                onchange="previewSignature()">
                                            <button type="button"
                                                class="bg-slate-700 text-white rounded-lg px-4 py-2 mt-2"
                                                onclick="startCamera('signature')">Open Camera for Signature</button>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <!-- Submit Button -->
                            <div class="flex justify-around mt-7 items-center mx-auto w-[70%]">
                                <div class="mb-4 form-control w-full">
                                    <button type="submit" class="bg-blue-600  text-white rounded-lg px-4 py-2">Add
                                        New
                                        Member</button>
                                </div>

                                <div class="mb-4 form-control w-full">
                                    <a href="/nominees/create"
                                        class="bg-gray-800 border border-blue-50   text-white rounded-lg px-4 py-2">Add
                                        a
                                        Nominee</a>
                                </div>

                            </div>
                        </div>
                </form>

                <script>
                function getRandomTitle() {
                    return 'Image-' + Math.random().toString(36).substring(2, 15);
                }

                async function uploadImage(imageData, title) {
                    const formData = new FormData();
                    formData.append('image', imageData);
                    formData.append('title', title);

                    const response = await fetch('/upload', {
                        method: 'POST',
                        body: formData
                    });

                    if (response.ok) {
                        const result = await response.json();
                        console.log('Image uploaded successfully:', result);
                    } else {
                        console.error('Error uploading image:', response.statusText);
                    }
                }

                function previewImage(type) {
                    const imageInput = document.getElementById(type);
                    const imagePreview = type === 'image' ? document.getElementById('image-preview') : document
                        .getElementById('signature-preview');
                    const cameraContainer = type === 'image' ? document.getElementById('camera-container') : document
                        .getElementById('signature-camera-container');

                    imagePreview.innerHTML = ''; // Clear previous content
                    cameraContainer.classList.add('hidden'); // Hide camera

                    if (imageInput.files && imageInput.files[0]) {
                        const file = imageInput.files[0];
                        const title = getRandomTitle();
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.style.maxWidth = '100%'; // Adjust size
                        const titleElement = document.createElement('p');
                        titleElement.textContent = title;
                        imagePreview.appendChild(titleElement);
                        imagePreview.appendChild(img);

                        // Upload image
                        uploadImage(file, title);
                    }
                }

                function startCamera(type) {
                    const video = type === 'image' ? document.getElementById('video') : document.getElementById(
                        'signature-video');
                    const cameraContainer = type === 'image' ? document.getElementById('camera-container') : document
                        .getElementById('signature-camera-container');
                    const imagePreview = type === 'image' ? document.getElementById('image-preview') : document
                        .getElementById('signature-preview');

                    navigator.mediaDevices.getUserMedia({
                            video: true
                        })
                        .then(function(stream) {
                            video.srcObject = stream;
                            cameraContainer.classList.remove('hidden'); // Show camera
                            imagePreview.innerHTML = ''; // Clear previous content
                        })
                        .catch(function(err) {
                            console.error("Error accessing camera: ", err);
                        });
                }

                function capturePhoto(type) {
                    const canvas = document.getElementById('canvas');
                    const video = type === 'image' ? document.getElementById('video') : document.getElementById(
                        'signature-video');
                    const context = canvas.getContext('2d');

                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);

                    // Convert the canvas image to a Blob
                    canvas.toBlob(function(blob) {
                        const title = getRandomTitle();
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(blob);
                        img.style.maxWidth = '100%'; // Adjust size
                        const imagePreview = type === 'image' ? document.getElementById('image-preview') :
                            document.getElementById('signature-preview');
                        imagePreview.innerHTML = ''; // Clear previous content
                        const titleElement = document.createElement('p');
                        titleElement.textContent = title;
                        imagePreview.appendChild(titleElement);
                        imagePreview.appendChild(img);

                        // Upload image
                        uploadImage(blob, title);
                    }, 'image/png');

                    // Stop the video stream
                    const stream = video.srcObject;
                    const tracks = stream.getTracks();
                    tracks.forEach(track => track.stop());
                    video.srcObject = null;
                }

                function validateForm() {
                    // Add your validation logic here
                    return true;
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

                function validateForm() {
                    const memberId = document.getElementById('member_id').value;
                    const mobileNumber = document.getElementById('mobile_number').value;
                    const email = document.getElementById('email').value;
                    const nationalId = document.getElementById('national_id_number').value;

                    // Example validation rules
                    if (!memberId) {
                        alert('Member ID is required');
                        return false;
                    }

                    if (mobileNumber && !/^\d{11}$/.test(mobileNumber)) {
                        alert('Mobile number must be 11 digits');
                        return false;
                    }

                    if (email && !/\S+@\S+\.\S+/.test(email)) {
                        alert('Email is invalid');
                        return false;
                    }

                    if (nationalId && nationalId.length < 10) {
                        alert('National ID must be at least 10 characters long');
                        return false;
                    }

                    return true; // Proceed with form submission
                }
                </script>

            </div>
        </div>
    </div>
</x-app-layout>