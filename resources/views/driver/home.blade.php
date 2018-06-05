@extends('driver.layouts.app')

@section('content')

    @include('driver.layouts.sideBarre')
    <div class="main-panel">

        @include('driver.layouts.topBarre')

        <div class="content">
            <div class="container-fluid">

                @if(Session::has('success'))
                    <div class="row">
                        <div class="  col-md-10">
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="row">
                        <div class="  col-md-10">
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="  col-md-10">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Informations</h4>
                                </div>

                            </div>
                            <div class="card-body">

                            </div>
                            <div class="card-footer ">
                                <button onclick="document.getElementById('update_groupe_form').submit()" type="submit"
                                        class="btn btn-fill btn-primary">Sauvegarder
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row (title) -->



            </div>
        </div>
    </div>


@endsection

@section('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.form-check-input').click(function () {
                $('#veuillez_preciser_input').prop('disabled', true);
            });

            $('#autre_input').click(function () {
                $('#veuillez_preciser_input').prop('disabled', false);
            });

            initAutocomplete();
        });

        // Gestion de l'api maps

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('adresse_input')),
                {types: ['geocode']});
        }
    </script>
@endsection