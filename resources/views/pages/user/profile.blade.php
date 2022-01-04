@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 rounded-xl">
                    <div class="p-4 d-flex flex-column align-items-center text-center">
                        <img
                            src="https://eu.ui-avatars.com/api/?name={{ $user->full_name }}&background=75cff0&color=fff"
                            alt="Admin" class="rounded-circle"
                            width="150">
                        <div class="mt-3">
                            <h4>{{ $user->full_name }}</h4>
                            <p>
                                <i class="bi-hand-thumbs-up-fill fs-5"></i> 15 likes
                            </p>
                            <p class="text-secondary mb-1">
                                <i class="bi-geo-alt-fill"></i> Paris, France
                            </p>
                            <p class="text-muted font-size-sm">
                                {{ $user->description }}
                            </p>
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
                                <div class="card-footer d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <i class="bi-star-fill text-warning"></i>
                                            <i class="bi-star-fill text-warning"></i>
                                            <i class="bi-star-fill text-warning"></i>
                                            <i class="bi-star-fill text-warning"></i>
                                            <i class="bi-star-fill text-secondary"></i>
                                            <span class="small">{{ rand(1, 20) }} avis</span>
                                        </div>
                                    </div>
                                    <div>
                                        {{ $marker->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
