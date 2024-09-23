<!-- resources/views/members/index.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-6 bg-white">
        <h1 class="text-2xl font-bold mb-4">Members List</h1>

        @if($members->isEmpty())
            <p>No members found.</p>
        @else
            <table class="min-w-full bg-gray-200 border border-gray-400">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Member ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Father's Name</th>
                        <th class="border border-gray-300 px-4 py-2">Mother's Name</th>
                        <th class="border border-gray-300 px-4 py-2">Mobile Number</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Date of Birth</th>
                        <th class="border border-gray-300 px-4 py-2">National ID Number</th>
                        <th class="border border-gray-300 px-4 py-2">Occupation</th>
                        <th class="border border-gray-300 px-4 py-2">Educational Qualification</th>
                        <th class="border border-gray-300 px-4 py-2">Akhanda Kalyan Tahabil</th>
                        <th class="border border-gray-300 px-4 py-2">Akhanda Mondoli Address</th>
                        <th class="border border-gray-300 px-4 py-2">Membership ID</th>
                        <th class="border border-gray-300 px-4 py-2">Image</th>
                        <th class="border border-gray-300 px-4 py-2">Signature</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->member_id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->member_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->father_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->mother_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->mobile_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->date_of_birth }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->national_id_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->occupation }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->educational_qualification }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->akhanda_kalyan_tahabil }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->akhanda_mondoli_address }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $member->membership_id }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if($member->image_url)
                                    <img src="{{ $member->image_url }}" alt="Image" class="max-w-[100px] max-h-[100px]">
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if($member->signature_url)
                                    <img src="{{ $member->signature_url }}" alt="Signature" class="max-w-[100px] max-h-[100px]">
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
