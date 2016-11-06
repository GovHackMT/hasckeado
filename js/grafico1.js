$(function () {

    var colors = Highcharts.getOptions().colors,
            categories = ['Hemocentro 1', 'Hemocentro 2', 'Hemocentro 3', 'Hemocentro 4', 'Hemocentro 5'],
            data = [{
                    y: 38.33,
                    color: colors[0],
                    drilldown: {
                        name: 'Tipo Sanguineo',
                        categories: ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'],
                        data: [1.06, 0.5, 17.2, 8.11, 5.33, 2, 4.13],
                        color: colors[0]
                    }
                }, {
                    y: 10.38,
                    color: colors[1],
                    drilldown: {
                        name: 'Tipo Sanguineo',
                        categories: ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'],
                        data: [0.33, 0.15, 0.22, 1.27, 2.76, 2.32, 2.31, 1.02],
                        color: colors[1]
                    }
                }, {
                    y: 6.2,
                    color: colors[2],
                    drilldown: {
                        name: 'Tipo Sanguineo',
                        categories: ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'],
                        data: [0.14, 1.24, 0.55, 0.19, 0.14, 0.85, 2.53, 0.38],
                        color: colors[2]
                    }
                }, {
                    y: 4.77,
                    color: colors[3],
                    drilldown: {
                        name: 'Tipo Sanguineo',
                        categories: ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'],
                        data: [0.3, 0.42, 0.29, 0.17, 0.26, 0.77, 2.56],
                        color: colors[3]
                    }
                }, {
                    y: 0.91,
                    color: colors[4],
                    drilldown: {
                        name: 'Tipo Sanguineo',
                        categories: ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'],
                        data: [0.34, 0.17, 0.24, 0.16],
                        color: colors[4]
                    }
                }, {
                    y: 0.2,
                    color: colors[5],
                    drilldown: {
                        name: 'Tipo Sanguineo',
                        categories: [],
                        data: [],
                        color: colors[5]
                    }
                }],
            browserData = [],
            versionsData = [],
            i,
            j,
            dataLen = data.length,
            drillDataLen,
            brightness;


    // Build the data arrays
    for (i = 0; i < dataLen; i += 1) {

        // add browser data
        browserData.push({
            name: categories[i],
            y: data[i].y,
            color: data[i].color
        });

        // add version data
        drillDataLen = data[i].drilldown.data.length;
        for (j = 0; j < drillDataLen; j += 1) {
            brightness = 0.2 - (j / drillDataLen) / 5;
            versionsData.push({
                name: data[i].drilldown.categories[j],
                y: data[i].drilldown.data[j],
                color: Highcharts.Color(data[i].color).brighten(brightness).get()
            });
        }
    }

    // Create the chart
    Highcharts.chart('container1', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Doação de sangue em 2016'
        },
        subtitle: {
            text: ''
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        series: [{
                name: '% coletada por Ponto de coleta',
                data: browserData,
                size: '60%',
                dataLabels: {
                    formatter: function () {
                        return this.y > 5 ? this.point.name : null;
                    },
                    color: '#ffffff',
                    distance: -30
                }
            }, {
                name: '% do sangue coletado',
                data: versionsData,
                size: '80%',
                innerSize: '60%',
                dataLabels: {
                    formatter: function () {
                        // display only if larger than 1
                        return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + '%' : null;
                    }
                }
            }],
         responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        layout: 'horizontal'
                    },
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -5
                        },
                        title: {
                            text: null
                        }
                    },
                    subtitle: {
                        text: null
                    },
                    credits: {
                        enabled: false
                    }
                }
            }]
        }
    });
});