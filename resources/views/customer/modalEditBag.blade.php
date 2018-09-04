<div class="modal-header">
    <h5 class="modal-title">Modifier le bagage</h5>
</div>
<form method="post" action="{{url('/bagages/'.$bag->id.'/edit')}}">
    <div class="modal-body">
        <div style="min-height: 110px" class="smart-wrap">
            <div class="smart-forms smart-container transparent wrap-full">
                <div class="form-body no-padd">


                    {{csrf_field()}}
                    Nom du bagage :
                    <input required type="text" name="name"
                           id="name" class="gui-input"
                           placeholder="Nom du bagage" value="{{$bag->name}}">

                    Description du bagage :
                    <input required type="text" name="details"
                           id="name" class="gui-input"
                           placeholder="Description du bagage" value="{{$bag->details}}">

                    <div class="result"></div><!-- end .result  section -->


                </div><!-- end .form-body section -->
            </div><!-- end .smart-forms section -->
        </div><!-- end .smart-wrap section -->
    </div>
    <div class="modal-footer smart-forms">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="button btn-primary">Sauvegarder</button>
    </div>
</form>