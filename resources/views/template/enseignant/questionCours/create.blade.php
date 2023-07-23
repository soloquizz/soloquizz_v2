<div class="modal fade" id="addQuestionCours" tabindex="-1" role="dialog" aria-labelledby="addQuestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuestionCoursLabel">Ajouter une question de cours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="storeQuestionForm" action="{{ route('enseignant.questionCours.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--recup id cours-->
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">QCM
                                        <span class="text-danger">*</span>

                                    </label>
                                    <select class="form-control form-control-sm" aria-label=".form-select-sm example" name="qcm">
                                        <option selected>choisir une option</option>
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                      </select>
                                 </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <input type="hidden" name="cours_id" value="{{$cours->id}}">
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
