<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Lightit\Shared\App\Job;
use Lightit\Shared\App\Mail\JobMail;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' => Job::with('employer')->latest()->paginate(3),
        ]);
    }

    public function store()
    {
        request()->validate([
            'title'    => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);


        //$employer = Auth::user()->employer;

        //if (! $employer) {
          //  abort(403, 'No employer associated with your user.');
        //}

        $job = Job::create([
            'title'       => request('title'),
            'location'    => request('location'),
            'employer_id' => 1,
        ]);

        Mail::to($job->employer->user)->send(new JobMail($job));

        return redirect('/jobs');
    }

    public function create()
    {
        return view('jobs.create');
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
