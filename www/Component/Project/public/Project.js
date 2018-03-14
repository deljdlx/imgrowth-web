ImGrowth.Project = function(options)
{


    this.options = {
        selectors: {
           preview: '#photoProjectPreview'
        },
        photo: {
            maxWidth : 600,
            maxHeight: 600,
            onSelection: function(image) {
                console.log(image);
                $(this.options.selectors.preview).append(image);
            }.bind(this)
        }
    };

    if(options) {
        this.options= $.extend(this.options,options);
    }
};




ImGrowth.Project.prototype.initializeCreationPanel = function()
{
    $('#projectPhotoTrigger').click(function() {
        $('#projectPhoto').fireEvent('click');
    });

    var photoInput = document.getElementById('projectPhoto');

    photoInput.addEventListener('change', function () {


        var file = photoInput.files[0];

        console.log(file);


        var test = new ImGrowth.Photo(
            this.options.photo
        );

        test.add('projectPhoto', file);

        //test.send('index.php/photo/post', 'photo', file);
    }.bind(this), false);


}