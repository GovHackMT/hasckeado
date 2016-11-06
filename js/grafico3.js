$(function () {
    var chart = Highcharts.chart('container3', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Campanhas com maior adesão'
        },

        subtitle: {
            text: ''
        },

        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical'
        },

        xAxis: {
            categories: ['Hemocentro 1: Campanha A', 'Hemocentro 2: Campanha B', 'Hemocentro 1: Campanha C'],
            labels: {
                x: -10
            }
        },

        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Quantidade'
            }
        },

        series: [{
            name: 'Estimado',
            data: [13, 24, 20]
        }, {
            name: 'Arrecadado',
            data: [16, 18, 17]
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