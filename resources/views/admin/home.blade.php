@extends('admin.layouts.app')

@section('content')

    @include('admin.layouts.sideBarre')
    <div class="main-panel">

        @include('admin.layouts.topBarre')

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
                                        class="btn btn-fill btn-primary">Modifier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row (title) -->

                <div class="row">
                    <div class="  col-md-10">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-text">
                                    <h4 class="card-title">Établissement</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <div class="material-datatables">


                                </div>
                            </div><!-- end content-->
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div>
                <!-- end row (liste etab)-->

                <div class="row">
                    <div class="  col-md-10">
                        <div class="card ">
                            <div class="card-header card-header-primary card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Ajouter un établissement</h4>
                                </div>
                            </div>

                            <div class="card-body ">

                            </div>
                            <!-- End card-body -->

                            <div class="card-footer ">
                                <button onclick="document.getElementById('add_etablissement_form').submit()"
                                        type="submit" class="btn btn-fill btn-primary">Ajouter
                                </button>
                            </div>

                        </div>
                        <!-- End card (ajouter etablissement) -->
                    </div>
                    <!-- End col-md-6 -->
                </div>
                <!-- End row (add etab)-->


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