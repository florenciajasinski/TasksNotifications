<x-layout>
    <x-slot name="heading">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Welcome Jobs</h1>
            <a href="/jobs/create"
               class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Create Job
            </a>
        </div>
    </x-slot>

    <ul class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}"
                   class="block rounded-lg border border-gray-200 bg-white p-4 shadow-sm hover:shadow-md transition">
                    <div class="text-sm text-gray-500 mb-1">
                        {{ $job->employer->name }}
                    </div>
                    <h2 class="text-lg font-semibold text-gray-900">
                        {{ $job->title }}
                    </h2>
                    <p class="text-sm text-gray-700 mt-1">
                        {{ $job->location ?? 'Location not specified' }}
                    </p>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $jobs->links() }}
    </div>
</x-layout>
