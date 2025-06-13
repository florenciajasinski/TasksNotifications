<x-layout>
    @if($job)
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow-md mt-10 space-y-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $job->title }}</h2>
                <p class="text-gray-500">{{ $job->location }}</p>
            </div>

            @can('edit', $job)
                <div>
                    <a href="/jobs/{{ $job->id }}/edit" class="inline-block px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-500">
                        Edit Job
                    </a>
                </div>
            @endcan
        </div>
    @else
        <div class="max-w-2xl mx-auto bg-yellow-100 text-yellow-800 p-6 rounded-lg mt-10">
            <p>Job not found.</p>
        </div>
    @endif
    <div class="max-w-2xl mx-auto mt-6 text-center">
        <a href="/jobs" class="inline-block px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-100 rounded-md hover:bg-blue-200">
            ← Back to Jobs
        </a>
    </div>
</x-layout>
