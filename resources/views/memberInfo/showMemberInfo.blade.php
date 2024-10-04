<x-app-layout>
    <div class="grid grid-cols-11 justify-center ">
        <div class="col-span-2  ">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-9 pl-6">
            <div class="   container mx-auto mt-5">
                <h1 class="text-2xl font-bold">Enter Member ID</h1>
                <!-- <hr className='-ml-0 h-[1px] border-none bg-slate-800 mx-auto w-[80%] ' /> -->
                <form action="{{ route('memberInfo.showMemberInfo') }}" method="GET" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="member_id" class="block text-gray-50">Member ID</label>
                        <input list="members_list" id="member_id" name="member_id"
                            class="border rounded-lg p-2 w-full text-gray-900" required placeholder="Type to search...">

                        <!-- Datalist for providing suggestions -->
                        <datalist id="members_list">
                            @foreach($members as $member)
                            <option value="{{ $member->member_id }}">{{ $member->member_id }} -
                                {{ $member->member_name }}
                            </option>
                            @endforeach
                        </datalist>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit</button>
                </form>
            </div>

            <div class="container mx-auto mt-5">
                @if (isset($selectedMember))
                <h1 class="text-2xl font-bold">Member Information</h1>
                <div class="bg-white shadow-md rounded-lg p-6 mt-4 dark:bg-gray-900">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2"><strong>Member ID:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->member_id }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Member Name:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->member_name }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Father's Name:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->father_name }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Mother's Name:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->mother_name }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Spouse's Name:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->spouse_name }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Permanent Address:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->permanent_address }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Present Address:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->present_address }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Mobile Number:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->mobile_number }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Email:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->email }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Date of Birth:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>National ID Number:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->national_id_number }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Occupation:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->occupation }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Educational Qualification:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->educational_qualification }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Balance:</strong></td>
                                <td class="border px-4 py-2">{{ $selectedMember->balance }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Image:</strong></td>
                                <td class="border px-4 py-2">
                                    @if ($selectedMember->image_url)
                                    <img src="{{ $selectedMember->image_url }}" alt="Member Image"
                                        style="max-width: 150px;" class="rounded">
                                    @else
                                    <p>No image available</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Signature:</strong></td>
                                <td class="border px-4 py-2">
                                    @if ($selectedMember->signature_url)
                                    <img src="{{ $selectedMember->signature_url }}" alt="Member Signature"
                                        style="max-width: 150px;" class="rounded">
                                    @else
                                    <p>No signature available</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="text-xl font-bold mt-6">Nominees</h2>
                @if ($selectedMember->nominees->isEmpty())
                <p>No nominees found for this member.</p>
                @else
                @foreach ($selectedMember->nominees as $index => $nominee)
                <div class="bg-white shadow-md rounded-lg p-4 mt-4 dark:bg-gray-900">
                    <h3 class="font-bold">Nominee {{ $index + 1 }}</h3>
                    <table class="table-auto w-full mt-2">
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2"><strong>Nominee Name:</strong></td>
                                <td class="border px-4 py-2">{{ $nominee->nominee_name }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Age:</strong></td>
                                <td class="border px-4 py-2">{{ $nominee->nominee_age }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Address:</strong></td>
                                <td class="border px-4 py-2">{{ $nominee->nominee_address }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Relation:</strong></td>
                                <td class="border px-4 py-2">{{ $nominee->relation_with_member }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Get Percentage:</strong></td>
                                <td class="border px-4 py-2">{{ $nominee->get_percentage }}%</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2"><strong>Nominee Image:</strong></td>
                                <td class="border px-4 py-2">
                                    @if ($nominee->nominee_image)
                                    <img src="{{ $nominee->nominee_image }}" alt="Nominee Image"
                                        style="max-width: 150px;" class="rounded">
                                    @else
                                    <p>No image available</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
                @endif
                @else
                <p>No member found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>