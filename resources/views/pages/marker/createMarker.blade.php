@extends('layouts.dashboard')

@section('content')
    <div class="container my-4">
        <h1><i class="bi-plus-circle"></i> Création d'un nouveau marker</h1>
        <div class="my-4 alert alert-theme d-flex align-items-center">
            <i class="bi-info-circle flex-shrink-0 me-2"></i>
            Pour placer le marker, il suffit de cliquer à l'endroit où vous le voulez, tout simplement !
        </div>
        <div id="map" class="mb-4 rounded-xl" style="height: 25rem;"></div>

        <div class="card rounded-xl mb-4">
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
                        <div class="col-sm-6">
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
                        <div class="col-sm-6">
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
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="visibility">Visibilité</label>
                            <select class="form-control" name="visibility" id="visibility">
                                <option value="public">Tout le monde</option>
                                <option value="members">Membres</option>
                                <option value="followers">Mes abonnés</option>
                                <option value="custom">Sélection de contact</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3" id="customContactDiv">
                            <label for="contact">Contacts</label>
                            <select class="form-control"
                                    multiple="multiple"
                                    name="contact[]"
                                    id="contact"></select>
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
    <script>
        let visibilitySelect = $('#visibility');
        let customContacts = $('#customContactDiv');

        customContacts.hide()
        initCustomContacts()
        visibilitySelect.on('change', function () {
            if (visibilitySelect.val() === 'custom') {
                initCustomContacts()
            } else {
                customContacts.hide();
            }
        })

        function initCustomContacts() {
            customContacts.show();

            $('#contact').select2({
                width: '100%',
                placeholder: "Select an Option",
                allowClear: true,
                ajax: {
                    url: '{{ route('user.getFollowers', Auth::user()) }}',
                    data: function (params) {
                        let query = {
                            search: params.term,
                        }

                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: '@' + item.username,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        }
    </script>
@endpush
