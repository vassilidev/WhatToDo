@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid mt-10 my-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 rounded-xl">
                    <div class="text-center">
                        <img
                            src="https://eu.ui-avatars.com/api/?name={{ $user->full_name }}&background=75cff0&color=fff"
                            alt="Admin" class="avatar rounded-circle"
                            width="150">
                        <div class="mt-n4">
                            <h4>
                                {{ '@' . $user->username }}
                                @if($user->isPublic())
                                    Public
                                @else
                                    Private
                                @endif
                            </h4>
                            @livewire('user.follow-counters', ['user' => $user])
                            <p>
                                <i class="bi-hand-thumbs-up-fill fs-5"></i> 15 likes
                            </p>
                            <p class="text-secondary mb-1">
                                <i class="bi-geo-alt-fill"></i> Paris, France
                            </p>
                            <p class="text-muted font-size-sm">
                                {{ $user->description }}
                            </p>
                            @if(Auth::check() && $user->id != Auth::id())
                                @livewire('user.follow-buttons', ['user' => $user])
                            @endauth
                        </div>
                    </div>
                </div>
                <ul class="list-group rounded-xl shadow-lg mb-4 fw-bolder">
                    @if($user->facebook)
                        <a class="list-group-item text-facebook" href="#">
                            <i class="bi-facebook"></i> Facebook
                        </a>
                    @endif
                    @if($user->twitter)
                        <a class="list-group-item text-twitter" href="#">
                            <i class="bi-twitter"></i> Twitter
                        </a>
                    @endif
                    @if($user->linkedin)
                        <a class="list-group-item text-linkedin" href="#">
                            <i class="bi-linkedin"></i> Linkedin
                        </a>
                    @endif
                    @if($user->instagram)
                        <a class="list-group-item text-instagram" href="#">
                            <i class="bi-instagram"></i> Instagram
                        </a>
                    @endif
                </ul>
            </div>
            <div class="col-lg-8">
                <h1>Markers</h1>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach($markers as $marker)
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('img/cover.png') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $marker->name }}</h5>
                                    <p class="card-text">
                                        {{ $marker->description }}
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    {{ $marker->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
