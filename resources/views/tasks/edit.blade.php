@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit task') }}</div>
                    <form method="post" action="{{route('task.store')}}">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{$task->name}}">
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('Description')}}</label>
                                <textarea class="form-control" id="name" name="description" >{{ $task->description}}</textarea>
                            </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary">{{__('Save')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection