( function ( $ ) {
    "use strict";
    $.ajax({
        url: '/admin/chartteam',
    })
    .success(function(data){
        console.log(data);
        var ctx = document.getElementById( "team-chart" );
    ctx.height = 150;

    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: data.y,
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: data.a,
                label: "Đơn",
                backgroundColor: 'rgba(0,103,255,.15)',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    }, ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Ngày'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Đơn'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );
    })

    $.ajax({
        url: '/admin/haizz',
    })
    .success(function(data) {
        console.log("success");
        //line chart
        var ctx = document.getElementById( "lineChart" );
        ctx.height = 150;
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: data.y,
                datasets: [
                    {
                        label: "Bình loạn",
                        borderColor: "rgba(0,0,0,.09)",
                        borderWidth: "1",
                        backgroundColor: "rgba(0,0,0,.07)",
                        data: data.a
                                },
                            ]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                }

            }
        } );
    });
    

    
    $.ajax({
        url: '/admin/product-pie',
    })
    .success(function(data) {
        // pie chart
        var color1=[];
        var color2=[];
        data.a.map((a,i) => {
            i+=7;
            color1.push('rgba(' + i*13 +','+(255-i*12)+',' + i*10 +',0.9)')

            color2.push('rgba(' + i*18 +','+(255-i*17)+', ' + i*15+',0.9)')
        })
        console.log(color1);
        var ctx = document.getElementById( "pieChart" );
        ctx.height = 300;
        var myChart = new Chart( ctx, {
            type: 'pie',
            data: {
                datasets: [ {
                    data: data.a,
                    backgroundColor:color1,
                    hoverBackgroundColor: color2

                                } ],
                labels: data.y
            },
            options: {
                responsive: true
            }
        } );
    });
    

    $.ajax({
        url: 'admin/bar',
    })
    .success(function(data) {
        
        var ctx = document.getElementById( "singelBarChart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: data.y,
            datasets: [
                {
                    label: "Người dùng",
                    data: data.a,
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );
    });
    
    // single bar chart
    




} )( jQuery );