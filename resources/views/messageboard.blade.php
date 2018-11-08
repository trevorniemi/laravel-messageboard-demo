@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Posting as {{ Auth::user()->name }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('createMessage') }}">
                            {{ csrf_field() }}
                            <input id="title" type="hidden" class="form-control" name="user" value="{{ Auth::user()
                            ->name }}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old
                                    ('title') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Message</label>

                                <div class="col-md-6">
                                    <textarea id="message" class="form-control" name="message" value="{{ old
                                    ('message') }}" required> </textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Messages</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">

                            <thead>

                            <th>Username</th>

                            <th>Title</th>

                            <th>Message</th>

                            </thead>

                            <tbody>
                            @foreach($messages as $message)

                                <tr>

                                    <td>{{$message->user}} </td>

                                    <td>{{$message->title}} </td>

                                    <td>{{$message->message}} </td>


                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
