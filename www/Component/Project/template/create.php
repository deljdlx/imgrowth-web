<h1><span>Démarrer un projet</span></h1>

<div class="row" style="padding: 16px;">



    <div class="content">

        <div class="form-group label-floating   is-empty">
            <label class="control-label">Titre</label>
            <input type="text" name="checkbox" value="" placeholder="" class="form-control">
            <span class="material-input"></span></div>



        <div class="form-group label-floating   is-empty">
            <div>
                <label for="textArea" class="control-label">Description</label>
            </div>


            <div class="">
                <textarea class="form-control" rows="3" id="textArea"></textarea>
                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
            </div>
            <span class="material-input"></span>
        </div>


        <label>
            <input id="projectPhoto" type="file" accept="image/*;capture=camera" style="position: absolute; left:-1000px; top: -1000px">
            &nbsp;<i class="fas fa-camera" id="projectPhotoTrigger" style="color:#000"></i> Prendre une photo
        </label>


        <div id="photoProjectPreview"></div>





        <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
                <button type="button" class="btn btn-default">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>


    </div>


</div>