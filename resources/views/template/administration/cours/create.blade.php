<div class="modal fade" id="addCours" tabindex="-1" role="dialog" aria-labelledby="addCoursLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCoursLabel">Ajouter un cours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.cours.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Libellé
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nom" class="form-control" placeholder="Développement Web" required="">
                                        <input type="hidden" name="classe_id" value="{{$classe->id}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Semestre
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="semestre_id">
                                            @foreach($semestres as $semestre)
                                                <option value="{{$semestre->id}}">{{$semestre->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control">
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
