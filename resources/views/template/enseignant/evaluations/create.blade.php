<div class="modal fade" id="addEvaluation" tabindex="-1" role="dialog" aria-labelledby="addEvaluationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEvaluationLabel">Ajouter une séance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('enseignant.evaluation.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Titre
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="titre" class="form-control" placeholder="Devoir sur les protocoles cryptographiques" required>
                                        <input type="hidden" name="cours_id" value="{{$cours->id}}">
                                        </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Type
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="type">
                                            <option value="">Choisir le type</option>
                                            <option value="Devoir">Devoir</option>
                                            <option value="Examen">Examen</option>

                                        </select>                                    
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Note
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="note_max" required class="form-control">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" name="date" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Heure
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="heure" required class="form-control" placeholder="12:00">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Durée (heure)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="duree" required class="form-control">
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
