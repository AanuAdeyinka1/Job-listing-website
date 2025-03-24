<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <p>TODO</p>

    <form method="POST" action="/jobs">
      @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
      <p class="mt-1 text-sm/6 text-gray-600">We just need a handful detail from you.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for='title' >Title</x-form-label>
          <div class="mt-2">
               <x-form-input type="text" name="title" id="title" placeholder="CEO" required />
           <x-form-error name="title"/>
          </x-form-field>
        </div>

        <x-form-field>
          <x-form-label for="salary">Salary</x-form-label>
          <x-form-input type="text" name="salary" id="salary" placeholder="$50,000 USD"  required />
          </div>
          <x-form-error name="salary"/>
        </x-form-field>
      </div>
    </div>

    {{-- @if ($errors->any())
          <ul>  @foreach ($errors->all() as $error)@endforeach
            <li class="text-red-500">{{$error}} </li>
          </ul>
         
       @endif --}}

  
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6 mr-10">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <x-form-button >Save</x-form-button>
  </div>
</form>

</x-layout>