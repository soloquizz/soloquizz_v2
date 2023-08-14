
<div class="modal fade" id="editEv{{$evaluation->id}}" tabindex="-1" role="dialog" aria-labelledby="editExerciceLabel" aria-hidden="true" backdrop="false">
    <div class="modal-dialog modal-lg mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title ml-10" id="addExerciceLabel">Modifier une évaluation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="storeTdForm" action="{{ route('enseignant.evaluation.update',$evaluation->id) }}">
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
                                        <input type="text" name="titre" class="form-control" value="{{$evaluation->id}}" required>
                                        <input type="hidden" name="cours_id" value="{{$cours->id}}">
                                        </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Type
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="type">
                                            @if($evaluation->type == "Devoir")
                                                <option value="Devoir" selected>Devoir</option>
                                                <option value="Examen">Examen</option>
                                           @else
                                                <option value="Devoir">Devoir</option>
                                                <option value="Examen" selected>Examen</option>
                                          @endif
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Note
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="note_max" required class="form-control" value="{{$evaluation->note_max}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="date" required class="form-control" value="{{$evaluation->date->format('d-m-Y')}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Heure
                                            <span class="text-danger">*</span>
                                        </label>
                                      
                                            <input type="text" name="heure" required class="form-control" value="{{date('H:i', strtotime($evaluation->heure))}}">
                                        
                                     
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Durée (heure)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="duree" required class="form-control" value="{{$evaluation->duree}}">
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


