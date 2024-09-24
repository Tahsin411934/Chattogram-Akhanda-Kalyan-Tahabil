<x-app-layout>
    <div class="grid grid-cols-10 ">
        <div class="col-span-2 border">
           @include('layouts.sidebar')
        </div>

        <div class="mt-5 col-span-8 h-screen">
            @section('title', 'Welcome To, User Home Page')
            @include('clock')
        </div>
    </div>
</x-app-layout>
