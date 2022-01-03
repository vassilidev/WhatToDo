@extends('layouts.dashboard')

@section('content')
    @include('pages.homepage')
@endsection

@push('js')
    <script>(new bootstrap.Modal(document.getElementById('loginModal')).show())</script>
@endpush
