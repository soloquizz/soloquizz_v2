<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="addQuestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuestionLabel">Ajouter une question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="storeQuestionForm" action="{{ route('admin.questions.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Point
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="point" class="form-control" placeholder="3" required="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Durée
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="duree" class="form-control" placeholder="2" required="">
                                    <input type="hidden" name="certification_id" value="{{$certification->id}}">
                                    <textarea name="contenu" style="display:none" id="hiddenAreaQuestion"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label class="form-label">Contenu
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div id="editorQuestion" style="height: 500px; overflow-y:auto;margin-top:3em">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
