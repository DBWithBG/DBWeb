@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3" >
        <div class="container">
            <div class="row">

                <div class="smart-wrap">
                    <div class="smart-forms smart-container wrap-3">

                        <form method="post" action="{{url('/login')}}" id="js-form-login">
                            {{csrf_field()}}

                            <div class="form-body">
                                <div class="row">
                                    <label class="field prepend-icon">
                                        <input type="text" name="name" id="name" class="gui-input" placeholder="Name" value="{{$customer->user->name}}">
                                        <span class="field-icon"><i class="fa fa-user"></i></span>
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
