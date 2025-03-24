<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <x-layout>
        <x-slot:heading>Job Listing</x-slot>
    <h1>Welcome to Jobs page</h1>
    <div class="space-y-4">
    @foreach ($jobs as $job )
    
            <a class="block px-4 py-6 border border-gray-300 rounded"   href="/jobs/{{ $job['id'] }}" >
                <div class="font-bold text-blue-500">{{ $job->Employer->name }}</div>

            <div>
            <strong>{{ $job['title'] }}:</strong> pays {{ $job['salary'] }} per year.
            </div>
            </a>
       
    @endforeach
</div>
 </x-layout>
    <div>
        {{ $jobs->links() }}
    </div>


</body>
</html>