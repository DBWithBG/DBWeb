<div class="modal-header">
    <h5 class="modal-title">{{trans('modals.letcom')}}</h5>
</div>
<form method="post" action="{{url('/comment')}}">
    <div class="modal-body">
        <div style="min-height: 110px" class="smart-wrap">
            <div class="smart-forms smart-container transparent wrap-full">
                <div class="form-body no-padd">


                    {{csrf_field()}}

                    <input type="hidden" name="delivery_id" value="{{$delivery->id}}">
                    {{trans('modals.commvisible')}}
                    <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                         class="section">
                        <label class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="comment"
                                                                          name="comment"
                                                                          placeholder="{{trans('modals.commplaceholder')}}">{{$delivery->comment}}</textarea>
                            <span class="field-icon"><i class="fa fa-comments"></i></span>
                        </label>
                    </div><!-- end section -->


                    <div class="result"></div><!-- end .result  section -->


                </div><!-- end .form-body section -->
            </div><!-- end .smart-forms section -->
        </div><!-- end .smart-wrap section -->
    </div>
    <div class="modal-footer smart-forms">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('modals.fermer')}}</button>
        <button type="submit" class="button btn-primary">{{trans('modals.commenter')}}</button>
    </div>
</form>