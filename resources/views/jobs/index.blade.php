<x-layout>
    <x-slot name="heading">
        Welcome Jobs
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
