@extends('layouts.app')

@section('title', 'The Devops List')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">The Devops List</div>

        <div class="panel-body">
            Welcome to The Devops List, a weekly newsletter with the hot and happening in DevOps.
            <br><br>
            <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/subscribe') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Sign Up!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection