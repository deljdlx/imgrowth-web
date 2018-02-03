ImGrowth = {};




ImGrowth.Application = function()
{
    this.seed = new ImGrowth.Seed();


    this.humiditySliders=[];


    $('a.water-trigger').each(function(index, trigger) {
        trigger.manager = this;
    }.bind(this));
};


ImGrowth.Application.prototype.water = function(index) {
    this.seed.water(index);
}


ImGrowth.Application.prototype.initializeHumidySliders = function(values) {

    for(var i=0 ; i<values.length; i++) {

        var value = Math.min(1100, values[i]);
        var node = $('.humiditySlider').get(i);


        this.humiditySliders[i] = noUiSlider.create(node, {
            start: 0,
            connect: "lower",
            range: {
                min: 0,
                max: 1100
            }
        });

        this.humiditySliders[i].on('change', function(values, handle, unencoded, tap, positions){
            var humidityValues = [];

            for(var i = 0; i<this.humiditySliders.length; i++) {
                humidityValues.push(
                    this.humiditySliders[i].get()
                );
            }

            this.seed.saveHumidityConfiguration(humidityValues, function(data) {
                console.debug(data);
            });

        }.bind(this));
    }
};


ImGrowth.Application.prototype.setHumiditySlidersValues = function(values) {

    for(var i=0 ; i<values.length; i++) {
        this.humiditySliders[i].set(values[i]);
    }
};








ImGrowth.Application.prototype.start = function() {
    var manager = this;

    this.initializeHumidySliders([0, 0, 0, 0]);


    this.seed.getConfiguration(function(data) {
        manager.setHumiditySlidersValues(data.humidity);
    });

    this.seed.getData(function(data) {


        $('#temperature').html(data.temperature+'°C');
        $('#light').html(data.light+' LUX');


        for(var i=0; i<data.humidity.length; i++) {

            var humidity = data.humidity[i];

            var value = -1/800 * humidity + 5/4;

            var node = $('#CircleGauge-'+i);
            node.get(0).setAttribute('data-value', value);

            var test = new DB_CircleGauge();

            test.render(node);
        }





    });



    $('a.water-trigger').click(function() {
        var index = $(this).data('index');
        this.manager.water(index);
    })

    $('#lightSwitch').click(function() {
        if(this.checked) {
            manager.seed.lightOn()
        }
        else {
            manager.seed.lightOff()
        }
    })


};