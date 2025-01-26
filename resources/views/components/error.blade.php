@props(['for'])

@error($for)
    <p class="text-red-500 italic mt-1 text-sm">{{$message}}</p>
@enderror