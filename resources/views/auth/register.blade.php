<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/register">
      @csrf

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-4">
      <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for='first name' >First Name</x-form-label>
          <div class="mt-2">
               <x-form-input type="text" name="first name" id="first name" placeholder="John" required />
               <x-form-error name="First Name"/>
          </div>
          </x-form-field><br>
        
          <x-form-field>
            <x-form-label for="last name">Last Name</x-form-label>
            <div class="mt-2">
                <x-form-input type="text" name="last name" id="last name" placeholder="Doe"  required />
            
                <x-form-error name="last Name"/>
            </div>
          </x-form-field>

        <x-form-field>
          <x-form-label for="email">Email</x-form-label>
          <div class="mt-2"> 
            <x-form-input type="email" name="email" id="email" placeholder="johndoe@example.com"  required />
            
            <x-form-error name="email"/>
        </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="password">Password</x-form-label>
            <div class="mt-2">
                <x-form-input type="password" name="password" id="password" required />
                
                <x-form-error name="password"/>
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="password_confirmation"> Confirm Password</x-form-label>
            <div class="mt-2">
                <x-form-input type="password" name="password_confirmation" id="password_confirmation" required />
                
                <x-form-error name="password_confirmation"/>
            </div>
          </x-form-field>

        </div>
      </div>
    </div>
  </div>

  <div class="flex items-center justify-end gap-x-6 mr-10">
    <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
    <x-form-button >Register</x-form-button>
  </div>
</form>

</x-layout>