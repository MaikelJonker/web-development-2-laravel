<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index(Request $request, User $user)
    {
        return $user->jobPostings;
    }

    public function show(Request $request, User $user, JobPosting $jobPosting)
    {
        return $jobPosting;
    }

    public function store(Request $request, User $user)
    {
        $jobPosting = new JobPosting();
        $jobPosting->fill($request->only('title', 'content'));
        $jobPosting->user()->associate($user);
        $jobPosting->save();
        return $jobPosting;
    }

    public function update(Request $request, User $user, JobPosting $jobPosting)
    {
        $jobPosting->fill($request->only('title', 'content'));
        $jobPosting->save();
        return $jobPosting;
    }

    public function delete(Request $request, User $user, JobPosting $jobPosting)
    {
        $jobPosting->delete();
    }
}
