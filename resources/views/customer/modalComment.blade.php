<div class="modal-header">
    <h5 class="modal-title">Laisser un commentaire</h5>
</div>
<form method="post" action="{{url('/comment')}}">
    <div class="modal-body">
        <div style="min-height: 110px" class="smart-wrap">
            <div class="smart-forms smart-container transparent wrap-full">
                <div class="form-body no-padd">


                    {{csrf_field()}}

                    <input type="hidden" name="delivery_id" value="{{$delivery->id}}">

                    <div style="padding-bottom: 0px !important; padding-top: 0px !important;"
                         class="section">
                        <label class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="comment"
                                                                          name="comment"
                                                                          placeholder="Votre commentaire">{{$delivery->comment}}</textarea>
                            <span class="field-icon"><i class="fa fa-comments"></i></span>
                        </label>
                    </div><!-- end section -->


                    <div class="result"></div><!-- end .result  section -->


                </div><!-- end .form-body section -->
            </div><!-- end .smart-forms section -->
        </div><!-- end .smart-wrap section -->
    </div>
    <div class="modal-footer smart-forms">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="button btn-primary">Commenter</button>
    </div>
</form>