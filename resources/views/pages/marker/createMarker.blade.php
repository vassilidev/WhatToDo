@extends('layouts.dashboard')

@section('content')
    <div class="container mt-2 mb-5">
        <h1><i class="bi-plus-circle"></i> Création d'un nouveau marker</h1>
        <div class="alert d-flex align-items-center bg-custom">
            <i class="bi-info-circle flex-shrink-0 me-2"></i>
            Pour placer le marker, il suffit de cliquer à l'endroit où vous le voulez, tout simplement !
        </div>
        <div id="map" class="mb-4 rounded-xl" style="height: 25rem;"></div>

        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="bi-info-circle-fill"></i> Information du marker
                </h4>
                <form action="{{ route('marker.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du marker</label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control rounded-pill shadow-lg"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description du marker</label>
                        <textarea name="description"
                                  id="description"
                                  rows="5"
                                  class="form-control rounded-xl shadow-lg">{{ old('description') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="long" class="form-label">Longitude</label>
                            <input type="text"
                                   id="long"
                                   name="long"
                                   value="{{ old('long') }}"
                                   class="form-control rounded-pill"
                                   onkeydown="moveMarker()"
                                   required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="lat" class="form-label">Latitude</label>
                            <input type="text"
                                   id="lat"
                                   name="lat"
                                   value="{{ old('lat') }}"
                                   class="form-control rounded-pill"
                                   onkeydown="moveMarker()"
                                   required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Créer le marker <i class="bi-plus"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{asset('js/createMarker.js')}}"></script>
@endpush
