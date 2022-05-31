<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row py-4" style="max-width: 1200px; margin: auto">
        <div class="col-3">
            <ul class="list-group">
                @foreach($showrooms as $showroomList)
                    <a href="{{route('showroom', $showroomList->id)}}"><li class="list-group-item {{$showroomList->id == $showroom->id ? 'active' : ''}}">{{$showroomList->name}}</li></a>
                @endforeach
            </ul>
        </div>
        <div class="col" id="cars">
            <cars :cars="{{$showroom->cars}}" :user="{{\Illuminate\Support\Facades\Auth::id()}}"></cars>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.cars = new Vue({
                el: '#cars'
            });
        })
    </script>
</x-app-layout>
