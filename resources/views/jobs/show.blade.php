<x-layout>
    <x-slot name="heading">
        Welcome Jobs
    </x-slot>

    @if($job)
        <h2>{{ $job->title }}</h2>
        <p>{{ $job->location ?? '' }}</p>
    @else
        <p>Job not found.</p>
    @endif

    @if($job)
        @can('edit', $job)
        <p class="mt-4">
            <a href="/jobs/{{ $job->id }}/edit" class="text-indigo-600 hover:text-indigo-900">
                Edit Job
            </a>
        </p>
        @endcan
    @endif
</x-layout>
