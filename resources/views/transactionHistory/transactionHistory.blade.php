<x-app-layout>
    <div class="grid border   grid-cols-10">
        <div class="col-span-2 ">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-8 ">
            @include("layouts.viewTransectionTab")
        </div>
    </div>

</x-app-layout>