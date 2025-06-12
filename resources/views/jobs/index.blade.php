<x-layout>
    <x-slot name="heading">
        <div class="flex items-center justify-between">
            <span class="text-xl font-bold">Welcome Jobs</span>
            <a href="/jobs/create" class="mt-0 inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Create Job
            </a>
        </div>

    </x-slot>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}">
                    <div>{{ $job->employer->name }}</div>
                    <h2>{{ $job['title'] }}</h2>
                    <p>{{ $job['location'] }}</p>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="pagination">
        {{ $jobs->links() }}
    </div>
</x-layout>
