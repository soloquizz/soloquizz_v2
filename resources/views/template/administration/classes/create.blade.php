<div class="modal fade" id="addClasse" tabindex="-1" role="dialog" aria-labelledby="addClasseLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClasseLabel">Ajouter une classe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.classes.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Nom
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nom" class="form-control" placeholder="Licence 1" required="">
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
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Domaine
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="domaine_id">
                                            @foreach($domaines as $domaine)
                                                <option value="{{$domaine->id}}">{{$domaine->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Parcours
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="parcour_id">
                                            @foreach($parcours as $parcour)
                                                <option value="{{$parcour->id}}">{{$parcour->nom}}</option>
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
