@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3" >
        <div class="container">
            <div class="row">

                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        <form method="post" action="{{url('/backoffice/customer/'.$customer->id.'/update')}}" id="js-form-login">
                            <input type="hidden" name="chk_mobile_token" id="chk_mobile_token">
                            {{csrf_field()}}

                            @if(sizeof($errors->all())>0)
                                <h3 style="color: #bf3924">{{$errors->all()[0]}}</h3>
                            @endif
                            <div class="form-body">
                                <div class="row">
                                    <label class="field prepend-icon">
                                        <input type="text" name="name" id="name" class="gui-input" placeholder="Nom" value="{{$customer->name}}">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>
                                    </label>
                                    <label class="field prepend-icon">
                                        <input type="text" name="surname" id="surname" class="gui-input" placeholder="Prénom" value="{{$customer->surname}}">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>
                                    </label>

                                    <label class="field prepend-icon">
                                        <input type="text" name="email" id="email" class="gui-input" placeholder="E-mail" value="{{$customer->user->email}}">
                                        <span class="field-icon"><i class="fa fa-at"></i></span>
                                    </label>
                                    <label class="field prepend-icon">
                                        <input type="text" name="phone" id="phone" class="gui-input" placeholder="Téléphone" value="{{$customer->phone}}">
                                        <span class="field-icon"><i class="fa fa-phone"></i></span>
                                    </label>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="button btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end .smart-forms section -->
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <!--end item -->
    <div class="clearfix"></div>
@endsection
