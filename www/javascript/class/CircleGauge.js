DB_CircleGauge=function()
{
	this.element=null;
};

DB_CircleGauge.prototype.render=function(element) {

	var element=$(element).get(0);


	if(!element) {
		return false;
	}

	this.element=element;
	$(element).find('.circle').circleProgress({
		size: 150,
		thickness: 10,
		value: element.getAttribute('data-value'),
		startAngle: Math.PI/-2+1.6,
		reverse: true,
		fill: {
			gradient: ["green", "orange", "red", "black"]
		}
	});
};
