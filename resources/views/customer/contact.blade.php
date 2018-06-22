@extends('customer.layouts.app')

@section('content')

    <section class="padding-top-3">
        <div class="container">
            <div class="row">

                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        <form method="post" action="{{url('/contact')}}" >
                            <div class="form-body">
                                <div class="spacer-b30" style="padding-top: 20px">
                                    <div class="tagline"><span>Nous contacter</span></div>
                                </div>
                                @if(sizeof($errors->all())>0)
                                    <h5 style="color: #bf3924">{{$errors->all()[0]}}</h5>
                                @endif
                                @if(Session::has('success'))
                                    <h5 style="color: #3cbf4c">{{Session::get('success')}}</h5>
                                @endif
                                <label for="names" class="field-label">Identité</label>
                                <div class="frm-row">
                                    <div class="colm colm6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="surname" class="gui-input"
                                                   placeholder="Prénom">
                                            <span class="field-icon"><i class="fa fa-user"></i></span>
                                        </label>
                                    </div><!-- end section -->

                                    <div class="colm colm6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="name" class="gui-input"
                                                   placeholder="nom">
                                            <span class="field-icon"><i class="fa fa-user"></i></span>
                                        </label>
                                    </div><!-- end section -->

                                </div><!-- end frm-row section -->

                                <div class="">
                                    <label style="padding-top: 7px" for="email" class="field-label">Adresse email</label>
                                    <label class="field prepend-icon">
                                        <input type="email" name="email" id="email" class="gui-input"
                                               placeholder="example@domain.com...">
                                        <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                    </label>
                                </div><!-- end section -->

                                <div class="">
                                    <label style="padding-top: 7px" for="message" class="field-label">Votre message</label>
                                    <label class="field prepend-icon">
                                        <textarea id="message" type="text" name="message" class="gui-textarea"></textarea>
                                        <span class="field-icon"><i class="fa fa-comments"></i></span>
                                    </label>
                                </div><!-- end section -->






                            </div><!-- end .form-body section -->
                            <div class="form-footer">
                                <button type="submit" class="button btn-primary">Envoyer</button>
                            </div><!-- end .form-footer section -->
                            <input type="hidden" name="type" value="Customer">

                            {{csrf_field()}}
                        </form>

                    </div><!-- end .smart-forms section -->
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <div class="clearfix"></div>



@endsection
