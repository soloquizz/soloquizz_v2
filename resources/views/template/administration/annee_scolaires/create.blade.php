<div class="modal fade" id="addAnneeScolaire" tabindex="-1" role="dialog" aria-labelledby="addAnneeScolaireLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnneeScolaireLabel">Ajouter une année scolaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.anneeScolaires.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Code
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="code" class="form-control" placeholder="2022-2023" required="">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Année
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="annee" class="form-control" placeholder="2023" required="">
                                        <input type="hidden" name="actif" value="1">
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
