<x-layout>
<x-slot:title>
        Job
    </x-slot:title>
<x-slot:heading>
    job
    </x-slot:heading>
<h2>{{$job['title']}}</h2>
<p>
    pays per year {{$job['salary']}}
</p>
@can("edit",$job)
<p class="mt-6">
    <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
</p>
@endcan
</x-layout>