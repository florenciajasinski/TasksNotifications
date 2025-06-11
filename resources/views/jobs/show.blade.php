<x-layout>
    <x-slot name="heading">
        Welcome Jobs
    </x-slot>

    @if($job)
        <h2>{{ $job['title'] }}</h2>
        <p>{{ $job['location'] ?? '' }}</p>
    @else
        <p>Job not found.</p>
    @endif
</x-layout>
