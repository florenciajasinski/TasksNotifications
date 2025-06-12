<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lightit\Shared\App\Job;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' => Job::with('employer')->latest()->paginate(3),
        ]);
    }

    public function create()
    {
        request()->validate([
            'title'    => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Job::create([
            'title'       => request('title'),
            'location'    => request('location'),
            'employer_id' => 1,
        ]);

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
        ]);
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $job->update([
            'title'    => $request->input('title'),
            'location' => $request->input('location'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
