<x-layout>
    <x-slot:heading>
        Edit Job: {{$job->title}}
    </x-slot:heading>


    <form method="POST" action="/jobs/{{$job->id}}">
      @csrf
      @method('PATCH')
     

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <x-form-label for='title' >Title</x-form-label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              
              <x-form-input 
              type="text" 
              name="title" id="title" 
              value="{{$job->title}}"
             />
            
            </div>
           <x-form-error name="title"/>
          </div>
        </div>

        <div class="sm:col-span-4">
          <x-form-label for='title' >Salary</x-form-label>
          <div class="mt-2">
            <x-form-input 
            name="salary" 
            id="salary" rows="3" 
            value="{{$job->salary}}"
          />
          </div>
         <x-form-error name="salary"/>
        </div>
      </div>
    </div>

    {{-- @if ($errors->any())
          <ul>  @foreach ($errors->all() as $error)@endforeach
            <li class="text-red-500">{{$error}} </li>
          </ul>
         
       @endif --}}

  
  </div>

  <div class="mt-6 flex items-center justify-between gap-x-6">
    <div>
        <button form="delete-form" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
    </div>
    <div class="flex gap-x-6 justify-center items-center">
         <a href="/jobs/{{$job->id}}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
         <div>
             <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
         </div>
   
    </div>
   
  </div>
</form>
<form id="delete-form" method="POST" action="/jobs/{{$job->id}}" class="hidden">
@csrf
@method('DELETE')
</form>


</x-layout>