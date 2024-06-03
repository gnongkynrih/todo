<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class TodoController extends BaseController
{
    public function index(){
        $tasks = Task::paginate(10);
        $success['data'] = TaskResource::collection($tasks);
        return $this->sendResponse($success, 'Task fetched successfully.');
    }

    
    public function store(TodoRequest $request){
        try{
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            $data['due_date']= date('Y-m-d', strtotime($data['due_date']));
            $task = Task::create($data);
            $success['data'] = new TaskResource($task);
            $success['message']='Task created successfully';
            return $this->sendResponse($success, 'Task fetched successfully.');
        }catch(Exception $e){
            $this->sendError('Error when adding task', $e->getMessage());
        }
    }

    public function edit(Task $task){
        $success['data'] = new TaskResource($task);
        return $this->sendResponse($success, 'Task fetched successfully.');
    }
    public function update(Task $task,TodoRequest $request){
        try{
            $data = $task->update($request->validated());
            $success['data'] = $data;
            return $this->sendResponse($success, 'Task updated successfully.');
        }catch(Exception $e){
            $this->sendError('Error when updating task', $e->getMessage());
        }
    }
    public function destroy(Task $task){
        try{
            $task->delete();
            $success['message'] = 'deleted';
            return $this->sendResponse($success, 'deleted.');
        }catch(Exception $e){
            $this->sendError('Error when deleting task', $e->getMessage());
        }
    }
}
