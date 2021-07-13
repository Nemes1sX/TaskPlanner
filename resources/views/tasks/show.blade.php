@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($message = Session::get('message'))
                       <div class="alert col-lg-9 alert-success alert-box tasks">
                           <p class="text-center">{{ $message }}</p>
                       </div>
                    @endif
                    <div class="card-header">{{ $task->name }}</div>

                        <div class="card-body">
                            <strong>Description:</strong>
                            <p>{{$task->description}}</p>
                            <strong>Creation date:</strong>
                            <p>{{$task->created_at->format('Y-m-d H:i')}}</p>
                            <strong>Task starting time</strong>
                            @if ($task->start_time)
                                <p>{{$task->start_time->format('Y-m-d H:i')}}</p>
                            @else
                                <p>-</p>
                            @endif
                            <strong>Current task session start time</strong>
                            @if ($task->session_start_time)
                                <p>{{$task->session_start_time->format('Y-m-d H:i')}}</p>
                            @else
                                <p>-</p>
                            @endif
                            <strong>Task stoppage time</strong>
                            @if ($task->end_time)
                                <p>{{$task->end_time->format('Y-m-d H:i')}}</p>
                            @else
                                <p>-</p>
                            @endif
                            <strong>Spent time</strong>
                            <p>
                                @if ($task->start_time)
                                    {{$task->timeSpent()}} minutes
                                @else
                                    0 minutes
                                @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            @if (!$task->status)
                                <a class="btn btn-success" href="{{route('task.start', $task)}}">Start task</a>
                            @else
                                <a class="btn btn-danger" href="{{route('task.stop', $task)}}">Stop task</a>
                            @endif
                            <a class="btn btn-primary" href="{{route('task.index')}}">Back to list</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
