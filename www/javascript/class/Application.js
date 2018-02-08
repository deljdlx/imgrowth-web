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



ImGrowth.Application.prototype.historicGraph = function(data) {


    var precision = 10;
    var temperatures=[];
    var lights=[];
    var dates = [];
    var i =0;
    var lastTemperature = null;
    var temperatureDelta = 5;


    this.temperatureAndLightGraph(data);
    this.humidityGraph(data);



};


ImGrowth.Application.prototype.humidityGraph = function(data) {


    var precision = 10;
    var dates = [];
    var series = [];

    var dateInitialized = false;

    for(var i=0; i<data.humidity.length; i++) {

        var values = [];
        var precisionIndex = 0;
        var humidityDelta = 100;
        var lastHumidity = null;

        for(var datetime in data.humidity[i]) {
            if(!(precisionIndex%precision)) {
                if(!dateInitialized) {
                    dates.push(datetime);
                }

                if(lastHumidity === null || Math.abs(lastHumidity - data.humidity[i][datetime]) < humidityDelta) {
                    values.push(data.humidity[i][datetime]);
                    lastHumidity = data.humidity[i][datetime];
                }
                else {
                    values.push(lastHumidity);
                }


            }
            precisionIndex++;
        }

        dateInitialized = true;

        series.push({
            data: values,
            scale : true,
            type: 'line',
            smooth: true
        });
    }


    var i =0;

    var lastTemperature = null;
    var temperatureDelta = 5;
    var temperatures = [];
    for(var datetime in data.temperature) {
        if(!(i%precision)) {
            if( Math.abs(data.temperature[datetime] - lastTemperature) < temperatureDelta || lastTemperature === null) {
                temperatures.push(data.temperature[datetime]);
                lastTemperature = data.temperature[datetime];
            }
            else {
                temperatures.push(lastTemperature);
            }
        }
        i++;
    }



    series.push({
        data: temperatures,
        scale : true,
        yAxisIndex:1,
        type: 'line',
        smooth: true,
        lineStyle: {
            normal: {
                color: 'red',
                width: 1,
                type: 'dashed'
            }
        },
    });




    // based on prepared DOM, initialize echarts instance
    var humidityChart = echarts.init(document.getElementById('humidityGraph'));


    option = {
        xAxis: {
            type: 'category',
            data: dates,
            axisLabel: {
                formatter: function(value, index) {
                    var date = new Date(value);
                    return date.getHours()+':'+
                        date.getMinutes()+' '+
                        pad(date.getDate())+'/'+
                        pad(date.getMonth()+1);
                },
                rotate: 45
            }
        },
        yAxis: [{
            name: 'Humidité',
            type: 'value',
            min: 100,
            max: 1100
        }, {
            name: 'Température',
            min: 18,
            max: 20,
            type: 'value',
        }],
        series: series
    };

    console.log(series);

    humidityChart.setOption(option);
};




ImGrowth.Application.prototype.temperatureAndLightGraph = function(data) {

    var precision = 10;

    var temperatures=[];
    var lights=[];
    var dates = [];

    var i =0;

    var lastTemperature = null;


    var temperatureDelta = 5;


    for(var datetime in data.temperature) {
        if(!(i%precision)) {

            dates.push(datetime);
            if( Math.abs(data.temperature[datetime] - lastTemperature) < temperatureDelta || lastTemperature === null) {
                temperatures.push(data.temperature[datetime]);
                lastTemperature = data.temperature[datetime];
            }
            else {
                temperatures.push(lastTemperature);
            }
            lights.push(data.light[datetime]);
        }
        i++;
    }




    // based on prepared DOM, initialize echarts instance
    var myChart = echarts.init(document.getElementById('temperatureGraph'));


    option = {
        tooltip: {
            trigger: 'axis',
            formatter: '{b0}<br/> {c0}°C</br>{c1} lux'
        },
        xAxis: {
            type: 'category',
            data: dates,
            axisLabel: {
                formatter: function(value, index) {
                    var date = new Date(value);
                    return date.getHours()+':'+
                        date.getMinutes()+' '+
                        pad(date.getDate())+'/'+
                        pad(date.getMonth()+1);
                },
                rotate: 45
            }
        },
        yAxis: [{
            name: 'Température',
            type: 'value',
            scale : true
            /*
             min: 18,
             max: 20
             */
        }, {
            name: 'Luminosité',
            scale : true,
            type: 'value',
        }],
        series: [{
            data: temperatures,
            type: 'line',
            smooth: true
        },{
            yAxisIndex:1,
            data: lights,
            type: 'line',
            smooth: true,
            areaStyle: {
                normal: {
                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                        offset: 0.5,
                        color: 'rgb(255, 240, 200)'

                    }, {
                        offset: 1,
                        color: 'rgb(50, 50, 50)'
                    }])
                }
            },
        }
        ]
    };
    myChart.setOption(option);
};






ImGrowth.Application.prototype.start = function() {
    var manager = this;

    this.initializeHumidySliders([0, 0, 0, 0]);


    this.seed.getHistoryData(function(data) {
        this.historicGraph(data);
    }.bind(this));



    this.seed.getConfiguration(function(data) {
        manager.setHumiditySlidersValues(data.humidity);
    });





    this.seed.getData(function(data) {

        $('#temperature').html(data.temperature+'°C');
        $('#light').html(data.light+' lux');




        for(var i=0; i<data.humidity.length; i++) {



            var humidity = data.humidity[i];

            var value = -1/1100 * humidity + 5/4;

            var node = $('#CircleGauge-'+i);
            node.get(0).setAttribute('data-value', value);

            console.debug($(node));

            $(node).find('.value').html(data.humidity[i]);

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