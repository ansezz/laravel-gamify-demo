@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Gamify</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Gamify youLaravel application
                    </div>
                </div>
            </div>
        </div>
    </div>

    <badges :items="{{ json_encode(auth()->user()->badges) }}"></badges>
    <points :items="{{ json_encode(auth()->user()->points) }}"></points>

@endsection
