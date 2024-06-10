<div class="modal fade" id="addInscription" tabindex="-1" role="dialog" aria-labelledby="addInscriptionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInscriptionLabel">Nouvelle Inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.etudiants.add_inscription') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Numéro Carte
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" disabled class="form-control" value="{{$etudiant->numero_carte}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Prénom
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" disabled value="{{$etudiant->prenom}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Nom
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" disabled value="{{$etudiant->nom}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" >Téléphone
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" disabled value="{{$etudiant->telephone}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Email Institutionnel</label>
                                        <input type="text" class="form-control" value="{{$etudiant->user()->email}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Email Personnel</label>
                                        <input type="text"  class="form-control" value="{{$etudiant->email_personnel}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Classes</label>
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
                                    <input type="hidden"  class="form-control" name="etudiant_id" value="{{$etudiant->id}}">
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
