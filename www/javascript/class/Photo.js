
ImGrowth.Photo = function(options)
{

    this.options = {
        maxWidth : 600,
        maxHeight: 600,
        onSelection: function(image) {
            return image;
        }
    };

    if(options) {

        this.options= $.extend(this.options,options);
    }

    console.log(this.options);



    this.images = {};

}


ImGrowth.Photo.prototype.add = function(fileName, file, callback) {


    var reader = new FileReader();
    var self = this;


    reader.readAsDataURL(file);

    reader.onloadend = function(evt) {


        var dataURL = reader.result;


        var maxWidth = self.options.maxWidth;
        var maxHeight = 600;


        var image = new Image();
        image.src = dataURL;

        image.onload = function () {

            var width = image.width;
            var height = image.height;
            var shouldResize = (width > maxWidth) || (height > maxHeight);

            if (!shouldResize) {
                //self.sendFile(fileName, dataURL);
                self.images[fileName] = dataURL;

                var imagePreview = new Image();
                imagePreview.src = dataURL;

                imagePreview.onload = function () {
                    self.options.onSelection(this);
                    //$('#imagePreview').append(imagePreview);
                }

                if(Khi.isFunction(callback)) {
                    callback(dataURL);
                }


                return;
            }
            else {

                self.EXIFRotation(image, function(canvas) {

                    console.log(callback);

                    var dataURL = canvas.toDataURL(file.type);

                    var imagePreview = new Image();
                    imagePreview.src = dataURL;
                    imagePreview.onload = function () {
                        self.options.onSelection(this);
                        //$('#imagePreview').append(imagePreview);
                    }

                    if(Khi.isFunction(callback)) {
                        callback(dataURL);
                    }

                    return;
                });
            }
        }
    };
}




ImGrowth.Photo.prototype.send = function(url, imageName, file) {

    this.add(imageName, file, function(data) {
        console.log('ici');
        this.sendFile(url, imageName, data)
    }.bind(this))
}


ImGrowth.Photo.prototype.EXIFRotation = function(image, callback) {
    var orientation = null;

    var width = image.width;
    var height = image.height;

    var maxWidth = this.options.maxWidth;
    var maxHeight = this.options.maxHeight;

    var newWidth;
    var newHeight;

    if (width > height) {
        newHeight = height * (maxWidth / width);
        newWidth = maxWidth;
    } else {
        newWidth = width * (maxHeight / height);
        newHeight = maxHeight;
    }



    EXIF.getData(image, function() {

        console.debug(EXIF.pretty(this));
        orientation = EXIF.getTag(this, "Orientation");

        var canvas = document.createElement('canvas');


        var context = canvas.getContext('2d');

        if(orientation == 1) {
            canvas.width = newWidth;
            canvas.height = newHeight;
            context.drawImage(image, 0, 0, newWidth, newHeight);
        }

        if(orientation == 8) {
            canvas.width = newHeight;
            canvas.height = newWidth;
            context.translate(newWidth/2, newHeight/2)
            context.rotate(-90*Math.PI/180);
            context.drawImage(image, newWidth/4, 0, -newWidth,  -newHeight);
        }

        if(orientation == 6) {
            canvas.width = newHeight;
            canvas.height = newWidth;
            context.translate(newWidth/2, newHeight/2)
            context.rotate(90*Math.PI/180);
            context.drawImage(image, -newWidth/4, 0, newWidth,  newHeight);
        }

        if(orientation == 3) {
            canvas.width = newWidth;
            canvas.height = newHeight;

            context.translate(newWidth/2, newHeight/2)
            context.rotate(-180*Math.PI/180);

            context.drawImage(image, -newWidth/2, -newHeight/2, newWidth,  newHeight);
        }

        if(!orientation) {
            canvas.width = newWidth;
            canvas.height = newHeight;
            context.drawImage(image, 0, 0, newWidth,  newHeight);
        }



        callback(canvas);
    });
};


ImGrowth.Photo.prototype.sendFile = function(url, imageName, data) {

    var formData = new FormData();


    formData.append(imageName, data);


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
}




