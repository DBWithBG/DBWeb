@extends('customer.layouts.app')

@section('content')

    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Historique de vos courses</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li><a href="{{url('/profil')}}">Profil</a></li>
                            <li class="current"><a href="{{url('/historique')}}">Historique</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!--end section-->

    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="domain-pricing-table">
                    <table class="table-style-2">
                        <thead>
                        <tr>
                            <th>Date de création</th>
                            <th>Statut</th>
                            <th>Distance</th>
                            <th>Durée estimée</th>
                            <th>Prix</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliveries as $delivery)
                            <tr>
                                <td>{{date('d / m / y', strtotime($delivery->created_at))}}</td>
                                <td>{{$delivery->status}}</td>
                                <td>{{$delivery->distance}}</td>
                                <td>{{$delivery->estimated_time}}</td>
                                <td>{{$delivery->price}}</td>
                                <td><a class="text-warning" href="#">Commenter</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->



@endsection

@section('custom-scripts')

@endsection