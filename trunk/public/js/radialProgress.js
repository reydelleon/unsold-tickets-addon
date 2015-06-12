function createArcs(selector) {
    var items = d3.selectAll(selector);

    items.each(function (datum, index) {
        var element = d3.select(this);

        // index++;

        drawArc(element, index);
    });
}

// Draws an individual arc. This is the main function.
function drawArc(element, index) {
    var svgContainer = element.select('.rc-graphic'),
        value = element.attr('data-value'),
        outOf = element.attr('data-out-of'),
        label = element.attr('data-label'),
        svg,
        railArc,
        dataArc,
        arcGroup,
        data = [{
            "value": 0.0,
            "index": 0.5
        }],
        twoPi = 2 * Math.PI,
        duration = 2000;

    // This function will be used to build the arc, but it doesn't render anything
    railArc = d3.svg.arc()
        .startAngle(0)
        .endAngle(function (d) {
            return d.value * twoPi;
        })
        .innerRadius(101)
        .outerRadius(104);

    // This function will be used to build the arc, but it doesn't render anything
    dataArc = d3.svg.arc()
        .startAngle(0)
        .endAngle(function (d) {
            return d.value * twoPi;
        })
        .innerRadius(100)
        .outerRadius(105);

    svg = svgContainer.append('svg')
        .attr('width', 400)
        .attr('height', 400)
        .attr('class', 'rc-svgcontainer')
        .append("g")
        .attr("transform", "translate(" + 400 / 2 + "," + 400 / 2 + ")");

    arcGroup = svg.append('g')
        .attr('class', 'rc-arc-group')
        .data(data);

    // Append the rail arc
    arcGroup.append('path')
        .attr('d', railArc)
        .attr('class', 'rc-railarc')
        .attr("fill", 'lightgray')
        .transition()
        .duration(duration)
        .attrTween('d', tweenRailArc({
            value: 1
        }));

    // Append the data arc
    arcGroup.append('path')
        .attr('d', dataArc)
        .attr('class', 'rc-dataarc')
        .attr("fill", 'green')
        .transition()
        .delay(100)
        .duration(duration)
        .attrTween('d', tweenDataArc({
            value: value / 100
        }));

    // Show the value
    arcGroup.append('text')
        .text(value)
        .attr('class', 'rc-value')
        .attr('font-size', '4em')
        .attr('x', -20)
        .attr('y', 10)
        .attr('fill', 'darkgrey')
        .attr('text-anchor', 'middle');

    // Show the separator
    arcGroup.append('text')
        .text('/')
        .attr('class', 'rc-separator')
        .attr('font-size', '3em')
        .attr('x', 15)
        .attr('y', -5)
        .attr('fill', 'darkgrey')
        .attr('text-anchor', 'middle');

    // Show the Out-Of amount
    arcGroup.append('text')
        .text(outOf)
        .attr('class', 'rc-out-of')
        .attr('font-size', '1.6em')
        .attr('x', 40)
        .attr('y', -15)
        .attr('fill', 'darkgrey')
        .attr('text-anchor', 'middle');

    // Show the label
    arcGroup.append('text')
        .text(label)
        .attr('class', 'rc-label')
        .attr('font-size', '1em')
        .attr('x', 0)
        .attr('y', 30)
        .attr('fill', 'darkgrey')
        .attr('text-anchor', 'middle');

    // Helper functions
    function tweenRailArc(b) {
        return function (a) {
            var i = d3.interpolate(a, b);

            return function (t) {
                return railArc(i(t));
            };
        };
    }

    function tweenDataArc(b) {
        return function (a) {
            var i = d3.interpolate(a, b);

            return function (t) {
                return dataArc(i(t));
            };
        };
    }
}

createArcs('.radial-chart');