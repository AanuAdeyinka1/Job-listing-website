@props(['name'])
@error($name)
        <p class="text-xs font-semi-bold my-4 text-red-500">{{$message}} </p>
      @enderror