<div class="modal fade" id="addOption" tabindex="-1" role="dialog" aria-labelledby="addOptionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuestionLabel">Ajouter une option de réponse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="storeOptionForm" action="{{ route('admin.options.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Correcte
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="correcte">
                                        <option value="1">OUI</option>
                                        <option value="0">NON</option>
                                    </select>
                                    <textarea name="contenu" style="display:none" id="hiddenAreaOption"></textarea>
                                    <input type="hidden" id="idQuestion" name="question_id">
                                    @if(isset($_GET['page']))
                                        <input type="hidden" name="page" value="{{$_GET['page']}}">
                                    @endif
                                    <input type="hidden" name="certification_id" value="{{$certification->id}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label class="form-label">Contenu
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div id="editorOption" style="height: 500px; overflow-y:auto;margin-top:3em">

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
