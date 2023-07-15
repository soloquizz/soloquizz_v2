<div class="modal fade" id="addEnseignant" tabindex="-1" role="dialog" aria-labelledby="addEnseignantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminLabel">Ajouter un enseignant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.enseignants.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Matricule
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="matricule" class="form-control" placeholder="matricule" required="">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Prénom
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Nom
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nom" class="form-control" placeholder="nom" required="">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" >Téléphone
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="telephone" placeholder="Téléphone" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Email Institutionnel</label>
                                        <input type="text" name="email" class="form-control" placeholder="prenom1.nom@cat.edu.sn">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Email Personnel</label>
                                        <input type="text" name="email_personnel" class="form-control" placeholder="Email Personnel">
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
