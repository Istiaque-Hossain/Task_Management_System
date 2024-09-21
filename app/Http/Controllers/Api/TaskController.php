<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::orderBy('due_date', 'asc')->get();
        if ($tasks)
        {
            return TaskResource::collection($tasks);
        }
    }
}
