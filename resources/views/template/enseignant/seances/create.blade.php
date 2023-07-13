<div class="modal fade" id="addSeance" tabindex="-1" role="dialog" aria-labelledby="addSeanceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSeanceLabel">Ajouter une séance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('enseignant.seances.store') }}" enctype="multipart/form-data">
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
                                        <input type="text" name="titre" class="form-control" placeholder="Les commandes de bases en linux" required>
                                        <input type="hidden" name="cours_id" value="{{$cours->id}}">
                                        <input type="hidden" name="enseignant_id" value="{{$cours->enseignant_id}}">
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
                                        <label class="form-label">Heure Début
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="time" name="heure_debut" required class="form-control">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Heure Fin
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="time" name="heure_fin" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Durée
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
