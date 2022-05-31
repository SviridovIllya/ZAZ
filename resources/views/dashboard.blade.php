<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row py-4" style="max-width: 1200px; margin: auto">
        <div class="col-3">
            <ul class="list-group">
                @foreach($showrooms as $showroom)
                    <a href="{{route('showroom', $showroom->id)}}"><li class="list-group-item">{{$showroom->name}}</li></a>
                @endforeach
            </ul>
        </div>
        <div class="col">
        </div>
</x-app-layout>
