<section id="createProjectContainer">
<div class="fieldset" style="position:relative">
    <h1><span>&nbsp;</span></h1>



    <div class="row" style="padding: 16px;">
        <div class="content">


            <form class="projectCreationForm">
                <div class="form-group label-floating   is-empty">
                    <label class="control-label">Titre</label>
                    <input type="text" name="projectName" value="" placeholder="" class="form-control">
                    <span class="material-input"></span></div>



                <div class="form-group label-floating   is-empty">
                    <div>
                        <label for="textArea" class="control-label">Description</label>
                    </div>


                    <div class="">
                        <textarea class="form-control" rows="3" name="projectDescription"></textarea>
                    </div>
                    <span class="material-input"></span>
                </div>


                <label style="margin-left: -10px">
                    <input type="file" accept="image/*;capture=camera" style="position: absolute; left:-1000px; top: -1000px" class="newProjectPhotoFile">
                    &nbsp;
                    <span class="fa-layers fa-fw" style="font-size: 3em">
                        <i class="fas fa-circle " style="color:#5D5"></i>
                        <i class="fas fa-camera fa-inverse projectPhotoTrigger" data-fa-transform="shrink-6"></i>
                    </span>
                    Ajouter une photo
                </label>


                <div class="photoProjectPreview"></div>



                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2 pull-right">
                        <button type="button" class="btn btn-default">Annuler</button>
                        <button type="submit" class="btn btn-primary projectSaveTrigger" >Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>