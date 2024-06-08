
<div class="modal fade" id="edit{{$exo->id}}" tabindex="-1" role="dialog" aria-labelledby="editExerciceLabel" aria-hidden="true" backdrop="false">
    <div class="modal-dialog modal-lg mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title ml-10" id="addExerciceLabel">Modifier un TD</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="storeTdForm" action="{{ route('enseignant.exercice.update',$exo->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--recup id cours-->
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Titre
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control"  name="titre" value="{{$exo->titre}}">
                                 </div>
                                 <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Note Maximale
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control"  name="note_max" value="{{$exo->note_max}}">
                                 </div>
                            </div>
                            <div class="form-row">
                                 <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Durée
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" name="duree" value="{{$exo->duree}}">
                                 </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Séance
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" aria-label=".form-select-sm example" name="seance_id">
                                        <option value="{{$exo->seance?->id}}">{{$exo->seance?->titre}}</option>
                                        @foreach($cours->seances as $seance)
                                            <option value="{{$seance->id}}">{{$seance->titre}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="cours_id" value="{{$cours->id}}">
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


