<div class="modal fade" id="addCertification" tabindex="-1" role="dialog" aria-labelledby="addCertificationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCertificationLabel">Ajouter une certification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.certifications.store') }}">
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
                                        <input type="text" name="code" class="form-control" placeholder="010-160" required="">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Titre
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="titre" class="form-control" placeholder="NDG LINUX Essential" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Éditeur
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="editeur_id">
                                            @foreach($editeurs as $editeur)
                                                <option value="{{$editeur->id}}">{{$editeur->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Niveau
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="niveau_id">
                                            @foreach($niveaux as $niveau)
                                                <option value="{{$niveau->id}}">{{$niveau->nom}}</option>
                                            @endforeach
                                        </select>
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
