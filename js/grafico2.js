$(function () {
    Highcharts.chart('container2', {
        title: {
            text: 'Quantidade de doadores em 2016',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Hemocentro 1',
            data: [7, 6, 9, 14, 18, 21, 25, 26, 23, 18, 13, 9]
        }, {
            name: 'Hemocentro 2',
            data: [2, 9, 7, 11, 17, 22, 24, 24, 20, 14, 8, 12]
        }, {
            name: 'Hemocentro 3',
            data: [5, 10, 3, 8, 13, 17, 18, 17, 14, 9, 3, 10]
        }, {
            name: 'Hemocentro 4',
            data: [3, 4, 5, 8, 11, 15, 17, 16, 14, 10, 6,   8]
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