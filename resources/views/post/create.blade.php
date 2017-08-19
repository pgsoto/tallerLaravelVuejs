@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>New Discuss</h4>
                    </div>
                    <div class="panel-body">
                        <form action="/posts" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group {{ ($errors->has('title'))? 'has-error': '' }}">
                                <label class="col-lg-2 control-label">Title</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" class="form-control"/>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('body'))? 'has-error': '' }}">
                                <label class="col-lg-2 control-label">Body</label>
                                <div class="col-lg-8">
                                    <textarea rows="20" name="body" class="form-control"></textarea>
                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('channel_id'))? 'has-error': '' }}">
                                <label class="col-lg-2 control-label">Channels</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="channel_id" id="">
                                        <option value="">Select Channel ...</option>
                                        @foreach($channels as $channel)
                                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('channel_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('channel_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-success">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection