@props(['for'])

@error($slot)
    <p class="text-red-500 italic mt-1 text-sm">{{$slot}}</p>
@enderror