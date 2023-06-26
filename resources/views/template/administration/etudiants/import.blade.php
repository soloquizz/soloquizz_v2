<div class="modal fade" id="importEtudiant" tabindex="-1" role="dialog" aria-labelledby="importEtudiantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importEtudiantLabel">Importation des étudiants</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.etudiants.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Classes
                                        </label>
                                        <select required class="form-control" name="classe_id">
                                            <option>Choisir une classe</option>
                                            @foreach($classes as $classe)
                                                <option value="{{$classe->id}}">{{$classe->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Années Scolaires
                                        </label>
                                        <select required class="form-control" name="annee_scolaire_id">
                                            <option>Choisir une année universitaire</option>
                                            @foreach($annee_scolaires as $annee_scolaire)
                                                <option value="{{$annee_scolaire->id}}">{{$annee_scolaire->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <input type="file" name="fichier" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="form-label">
                            <a href="" class="text-primary">Modèle de fichier</a>
                        </label>
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
