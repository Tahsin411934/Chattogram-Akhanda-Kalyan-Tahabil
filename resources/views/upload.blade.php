<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-10">
        <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-center">Upload Image</h2>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                    {{ session('success') }}
                    <img src="/abc/{{ session('image') }}" class="mt-2">
                </div>
            @endif

            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Choose Image:</label>
                    <input type="file" name="image" class="mt-1 block w-full p-2 border rounded border-gray-300">
                    @error('image')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Upload</button>
            </form>
        </div>
    </div>

</body>
</html>
