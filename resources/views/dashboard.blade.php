<x-app-layout>
    <div class="pt-5">
        @include('layouts.title')
    </div>

    @section('title', 'User Home Page')
    
    <div class="py-12">
        @include('clock')

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between w-[60%] mt-10">
            <div class="flex flex-col space-y-5">
                <a href="/member/create"><button class="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-48">Add New Member</button></a>
                <a href="#"><button class="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-48">Deposit</button></a>
                <a href="#"><button class="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-48">Withdraw</button></a>
                <a href="#"><button class="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-48">Receipt Print</button></a>
            </div>

            <div class="flex flex-col space-y-5">
                <a href="#"><button class="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-48">Some Action</button></a>
                <a href="#"><button class="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-48">Another Action</button></a>
                <a href="#"><button class="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-48">Different Action</button></a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-48">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
