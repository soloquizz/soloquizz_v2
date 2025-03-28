<div class="modal fade" id="addRessource" tabindex="-1" role="dialog" aria-labelledby="addRessourceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRessourceLabel">Ajouter une ressource</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('enseignant.cours.store.support') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Nom du fichier
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="file_name" class="form-control" placeholder="Les commandes de bases en linux" required>
                                        <input type="hidden" name="cours_id" value="{{$cours->id}}">
                                        <input type="hidden" name="enseignant_id" value="{{$cours->enseignant_id}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Fichier
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" name="support" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label class="form-label">Séance
                                        <span class="text-danger"></span>
                                    </label>
                                    <select class="form-control" name="seance_id">
                                        <option value="">Toutes les séances</option>
                                        @foreach($cours->seances as $seance)
                                            <option value="{{$seance->id}}">{{$seance->titre}}</option>
                                        @endforeach
                                    </select>
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
