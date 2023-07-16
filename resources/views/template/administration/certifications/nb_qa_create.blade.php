<div class="modal fade" id="addNbQa" tabindex="-1" role="dialog" aria-labelledby="addNbQaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNbQaLabel">Définir le nombre question maximal pour chaque qump</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.certifications.define_nbreqa') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Nombre maximum de question aléatoire
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="nbre_qa" class="form-control" placeholder="25" required>
                                        <input type="hidden" name="certification_id" value="{{$certification->id}}">
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
