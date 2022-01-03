@extends('layouts.dashboard')

@section('content')
    @include('pages.homepage')
@endsection

@push('js')
    <script>(new bootstrap.Modal(document.getElementById('registerModal')).show())</script>
@endpush
