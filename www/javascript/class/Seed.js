ImGrowth.Seed = function()
{
    this.waterURL = 'index.php/node/water';
    this.getConfigurationURL = 'index.php/node/getConfiguration';
    this.getDataURL = 'index.php/node/getData';
    this.saveHumidityConfigurationURL = 'index.php/node/saveHumidityConfiguration';


    this.lightOffURL = 'index.php?/nodes/lightOff';
    this.lightOnURL = 'index.php?/nodes/lightOn';

    this.getHistoryDataURL='index.php/node/1/getRecords';


};


ImGrowth.Seed.prototype.getConfiguration = function(callback) {
    $.ajax({
        url: this.getConfigurationURL,
        success: function(data) {
            //console.debug(data);
            callback(data);
        }
    })
};

ImGrowth.Seed.prototype.saveHumidityConfiguration = function(values, callback) {

    $.ajax({
        url: this.saveHumidityConfigurationURL,
        method: 'post',
        data: {humidity : values},
        success: function(data) {
            console.debug(data);
            callback(data.data);
        }
    })

};


ImGrowth.Seed.prototype.getHistoryData = function(callback) {

    $.ajax({
        url: this.getHistoryDataURL,
        cache: false,
        success: function(data) {
            console.debug(data);
            callback(data);
        }
    });

};



ImGrowth.Seed.prototype.getData = function(callback) {
    $.ajax({
        url: this.getDataURL,
        success: function(data) {
            console.debug(data);
            callback(data.data);
        }
    })
};



ImGrowth.Seed.prototype.water=function(index) {
    $.ajax({
        url: this.waterURL+index,
        success: function(data) {
            console.debug(data);
        }
    })
};

ImGrowth.Seed.prototype.lightOn=function(index) {
    $.ajax({
        url: this.lightOnURL,
        success: function(data) {
            console.debug(data);
        }
    })
};


ImGrowth.Seed.prototype.lightOff=function(index) {
    $.ajax({
        url: this.lightOffURL,
        success: function(data) {
            console.debug(data);
        }
    })
};


