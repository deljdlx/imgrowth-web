ImGrowth.Project = function(options)
{


    this.options = {
        selectors: {
            photoInput: '#myModal .newProjectPhotoFile',
            photoPreview: '#myModal .photoProjectPreview',
            saveProjectTrigger: '#myModal .projectSaveTrigger',

            projectCreationForm: '#myModal  .projectCreationForm',
            projectNameInput: '#myModal input[name="projectName"]',
            projectDescriptionInput: '#myModal textarea[name="projectDescription"]',

            projectList: '#projectList .content',
        },
        url: {
            saveProject: 'index.php/project/save',
            projectList: 'index.php/api/project/list',
            addImageToProject: 'index.php/project/addImage'

        },
        photo: {
            maxWidth : 1500,
            maxHeight: 900,
            onSelection: function(image) {

                $(this.options.selectors.photoPreview).html('');
                $(this.options.selectors.photoPreview).append(image);
            }.bind(this)
        }
    };

    if(options) {
        this.options= $.extend(this.options, options);
    }
};







ImGrowth.Project.prototype.initializeListPanel = function()
{
    $.ajax({
        url: this.options.url.projectList,
        success: function(data) {

            $(this.options.selectors.projectList).html('');

            for(var projectId in data) {
                var article = data[projectId];
                var element = this.renderProject(article);
                $(this.options.selectors.projectList).append(element);
            }

            var manager =this;

            $('.projectThumbnail .projectPhotoFile').change(function() {

                var projectId = this.getAttribute('data-project-id');
                var file = this.files[0];

                console.log(file);

                var test = new ImGrowth.Photo({
                    onSelection: function(image) {

                        $("#myModal .modal-title").html('Ajouter une photo');
                        $("#myModal .modal-body").html('');

                        var imageContainer = document.createElement('div');
                        imageContainer.setAttribute('class', 'imageContainer');
                        imageContainer.appendChild(image)

                        $("#myModal .modal-body").append(imageContainer);
                        $("#myModal .modal-body").append(
                            '<div class="form-group label-floating">'+
                                '<label class="control-label" for="photoProjectLegend">Ajouter une légende</label>'+
                                '<input class="form-control" id="photoProjectLegend" type="text">'+
                            '</div>'+
                            '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-default btn-simple photoProjectValidate">Valider</button>'+
                                '<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Annuler</button>'+
                            '</div>'
                        );

                        $('#myModal .modal-body .photoProjectValidate').click(function() {

                            var legend = $('#photoProjectLegend').val();
                            var photoData = $('#myModal .imageContainer img').get(0).src;

                            this.addPhotoToProject(projectId, photoData, legend);

                            //alert(legend);
                        }.bind(manager));

                        $("#myModal").modal()

                    }.bind(manager)
                });

                test.add('test', file);
            });
        }.bind(this)
    });
}

ImGrowth.Project.prototype.addPhotoToProject = function(projectId, photoData, legend)
{
    console.log(projectId);
    console.log(photoData);
    console.log(legend);




    var formData = new FormData();

    formData.append('projectId', projectId);
    formData.append('legend', legend);
    formData.append('image', photoData);

    console.log(formData);

    var url = this.options.url.addImageToProject;

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            console.debug(data);
        },
        error: function (data) {
            alert('There was an error uploading your file!');
        }
    });





    $("#myModal").modal('hide');

}



ImGrowth.Project.prototype.renderProject = function(project)
{
    var element = document.createElement('div');
    element.setAttribute('class', 'projectThumbnail col-lg-2 col-md-3  col-sm-6 col-xs-6');
    element.innerHTML =
        '<h3>'+project['category'].name+'</h3>' +
        '<a href="index.php/project/'+project['category'].id+'/timeline">'+
            '<img src="'+project['article'].better_featured_image.media_details.sizes.thumbnail.source_url+'"/>'+
        '</a>'+
        '<div style="position: relative">'+
            '<label class="projectPhotoTrigger" data-project-id="'+project['category'].id+'">'+
                '<input class="projectPhotoFile" type="file" accept="image/*;capture=camera" style="position: absolute; left:-1000px; top: -1000px" data-project-id="'+project['category'].id+'">'+
                '<i class="fas fa-camera"></i>'+
            '</label>'+
        '</div>'
    ;
    return element;
}






ImGrowth.Project.prototype.showModal = function(title, content)
{

    $("#myModal .modal-body").html(content);
    $("#myModal .modal-title").html(title);
    $("#myModal").modal();
};

ImGrowth.Project.prototype.closeModal = function(title, content)
{
    $("#myModal").modal('hide');
    $("#myModal .modal-body").html('');
    $("#myModal .modal-title").html('');
};



ImGrowth.Project.prototype.showCreateProjectModal = function(title, content)
{

    var content = $('#createProjectContainer').html();
    this.showModal('Nouveau projet', content);

    var photoInput = $(this.options.selectors.photoInput).get(0);

    photoInput.addEventListener('change', function () {
        var file = photoInput.files[0];
        var test = new ImGrowth.Photo(
            this.options.photo
        );

        test.add(photoInput, file);
        //test.send('index.php/photo/post', 'photo', file);
    }.bind(this), false);


    $(this.options.selectors.projectCreationForm).on('submit', this.save);
    $(this.options.selectors.saveProjectTrigger).on('click', this.save.bind(this));
};






ImGrowth.Project.prototype.initializeCreationPanel = function()
{
    $('#createProjectTrigger').click(function() {
        this.showCreateProjectModal();
    }.bind(this));
}


ImGrowth.Project.prototype.save = function()
{
    var projectName = $(this.options.selectors.projectNameInput).val();
    var projectDescription =  $(this.options.selectors.projectDescriptionInput).val();


    console.log(projectName);
    console.log(projectDescription);


    var photoData = '';
    if($(this.options.selectors.photoPreview+' img').get(0)) {
        photoData = $(this.options.selectors.photoPreview+' img').get(0).src;
    }


    var formData = new FormData();

    formData.append('name', projectName);
    formData.append('description', projectDescription);
    formData.append('image', photoData);

    console.log(formData);

    var url = this.options.url.saveProject;

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            console.debug(data);
            this.closeModal();
            this.initializeListPanel();
        }.bind(this),
        error: function (data) {
            alert('There was an error uploading your file!');
        }
    });

    return false;

}









