<x-layout>
<x-slot:title>
        Job
    </x-slot:title>
<x-slot:heading>
    job
    </x-slot:heading>
    <div class="space-y-4">

        <ul>
            @foreach($jobs as $job)
                <li>{{ $job->title }} - {{ $job->salary }}</li>
            @endforeach
        </ul>
</x-layout>