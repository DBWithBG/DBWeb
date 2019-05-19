@extends('customer.layouts.app')

@section('content')


    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>{{trans('litige.litige')}}</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">{{trans('litige.accueil')}}</a></li>
                            <li><a href="{{url('/profil')}}">{{trans('litige.profil')}}</a></li>
                            <li class="current"><a href="{{url('/litiges/' . $delivery->id)}}">{{trans('litige.litige')}}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    @if($errors->any())
        <div style="margin-top: 10px" class="container">
            @foreach($errors->all() as $error)
                <div class="row">

                    <div class="col-md-12 nopadding">
                        <div class="alert-box danger">
                                <span class="alert-closebtn"
                                      onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></strong>
                            &nbsp; {{$error}}
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif


                <section class="sec-padding section-light">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-8 col-sm-12 col-xs-12">

                                <h3 class="uppercase">{{trans('litige.dec')}}</h3>
                                <br/>
                                <br/>

                                <div class="text-box white padding-4">
                                    <div class="smartforms-modal-body">
                                        <div class="smart-wrap">
                                            <div class="smart-forms smart-container transparent wrap-full">
                                                <div class="form-body no-padd">
                                                    <form method="post" action="{{url('/litiges/' . $delivery->id)}}"
                                                          id="smart-form">

                                                        {{csrf_field()}}

                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <input required type="text" name="title" id="title"
                                                                       class="gui-input" placeholder="{{trans('litige.titre')}}">
                                                                <span class="field-icon"><i
                                                                            class="fa fa-user"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                                                             class="section">
                                                            <label class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="reason"
                                                                          name="reason"
                                                                          placeholder="{{trans('litige.desc')}}"></textarea>
                                                                <span class="field-icon"><i class="fa fa-comments"></i></span>
                                                            </label>
                                                        </div><!-- end section -->


                                                        <div class="result"></div><!-- end .result  section -->

                                                        <!-- end .form-body section -->
                                                        <div class="form-footer text-left">
                                                            <button type="submit" data-btntext-sending="Sending..."
                                                                    class="button btn-primary">{{trans('litige.envoyer')}}
                                                            </button>
                                                        </div><!-- end .form-footer section -->
                                                    </form>
                                                </div><!-- end .form-body section -->
                                            </div><!-- end .smart-forms section -->
                                        </div><!-- end .smart-wrap section -->
                                    </div>
                                </div><!-- end .smart-wrap section -->
                                <!-- end .smart-forms section -->
                            </div>
                            <!--end item-->


                            @foreach($delivery->takeOverDelivery->disputes as $dispute)
                                <div class="col-md-4 col-sm-12 col-xs-12 text-left">
                                    <blockquote class="blockquote-1">
                                        <form id="close_dispute_{{$dispute->id}}" method="post" action="{{url('closeLitige/' . $delivery->id)}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="dispute_id" value="{{$dispute->id}}">
                                        </form>

                                        <a onclick="document.getElementById('close_dispute_{{$dispute->id}}').submit()"><i data-toggle="tooltip" title="{{trans('litige.close')}}" style="float: right"
                                           class="fa fa-close"></i></a>
                                        <p class="font-weight-3">{{$dispute->title}}</p>
                                        <p class="font-weight-2">{{$dispute->reason}}</p>
                                        <small><cite>{{$dispute->status}}</cite></small>
                                    </blockquote>
                                </div>
                                <!--end item-->
                            @endforeach


                        </div>
                    </div>
                </section>



                @endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
