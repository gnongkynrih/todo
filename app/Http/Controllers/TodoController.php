<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TaskResource;

class TodoController extends Controller
{
    public function index(){
        $tasks = Task::paginate(10);
        return response()->json([
            'data' =>TaskResource::collection($task)
        ],200);
    }

    public function store(TodoRequest $request){
       try{
            $task = Task::create($request->validated());
            return response()->json([
                'data' => new TaskResource($task)
            ],200);
       }catch(Exception $e){
        return response()->json([
            'data'=>$e->getMessage()
        ],500);
       }
    }

    public function edit(Task $task){
        return response()->json([
            'data'=>new TaskResource($task)
        ],200);
    }
    public function update(Task $task,Request $request){
         try{
            $task->update($request->validated());
            return response()->json([
                'data'=>'updated successfully'
            ],200);
         }catch(Exception $e){
            return response()->json([
                'data'=>$e->getMessage()
            ],500);
         }
    }
    public function destroy(Task $task){
        try{
            $task->delete();
            return response()->json([
                'data'=>'deleted'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'data'=>$e->getMessage()
            ],500);
        }
    }
}
