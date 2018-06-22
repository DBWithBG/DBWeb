@extends('customer.layouts.app')

@section('content')
    <section class="padding-top-3" >
        <div class="container">
            <div class="row">

                <div class="smart-wrap">
                        <div class="smart-container wrap-3">
                            <select class="form-control text-center" id="select-delivery">
                                @foreach($deliveries as $d)
                                    <option value="{{$d->id}}" @if($d->id==$delivery->id) selected="true" @endif >{{$d->id.' ['.$d->status.']'}}</option>
                                @endforeach
                            </select>
                            <p><b>Statut actuel de votre demande : {{$delivery->status}}</b></p>
                            <p>{{json_encode($delivery)}}</p>
                        </div>
                </div><!-- end .smart-wrap section -->

            </div>
        </div>
    </section>
    <!--end item -->
    <div class="clearfix"></div>
<script>

    $(document).ready(function(){


        var tok="<?=\Illuminate\Support\Facades\Request::get('mobile_token')?>";
        var cust="<?=\Illuminate\Support\Facades\Request::get('customer_id')?>";
        $("#select-delivery").on('change',function(){
            var url="{{url('mobile/deliveries/')}}";
            if(tok!="")
                window.location=url+'/'+$(this).val()+'?mobile_token='+tok;
            else
                window.location=url+'/'+$(this).val()+'?customer_id='+cust;
        });


    });
</script>
@endsection
