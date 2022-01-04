@extends('layouts.dashboard')

@section('content')
    <div class="container mt-2 mb-5">
        <h1><i class="bi-plus-circle"></i> Création d'un nouveau marker</h1>
        <div class="alert d-flex align-items-center bg-land">
            <i class="bi-info-circle flex-shrink-0 me-2"></i>
            Pour placer le marker, il suffit de cliquer à l'endroit où vous le voulez, tout simplement !
        </div>
        <div id="map" class="mb-4 rounded-xl" style="height: 25rem;"></div>

        <div class="card bg-land rounded-xl mb-4">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="bi-info-circle-fill"></i> Information du marker
                </h4>
                <form action="{{ route('marker.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text"
                               id="name"
                               name="name"
                               placeholder="Nom du marker"
                               value="{{ old('name') }}"
                               class="form-control shadow-lg"
                               required>
                        <label for="name" class="form-label">Nom du marker</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="description"
                                  id="description"
                                  placeholder="Description du marker"
                                  style="height: 100px"
                                  class="form-control shadow-lg">{{ old('description') }}</textarea>
                        <label for="description" class="form-label">Description du marker</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text"
                                       id="long"
                                       name="long"
                                       placeholder="Longitude"
                                       value="{{ old('long') }}"
                                       class="form-control"
                                       onkeydown="moveMarker()"
                                       required>
                                <label for="long" class="form-label">Longitude</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text"
                                       id="lat"
                                       name="lat"
                                       value="{{ old('lat') }}"
                                       placeholder="Latitude"
                                       class="form-control"
                                       onkeydown="moveMarker()"
                                       required>
                                <label for="lat" class="form-label">Latitude</label>
                            </div>
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
