var currentDate=new Date();
var currentYear = currentDate.getFullYear();

Highcharts.chart('graphe', {
    chart: {
        type: 'line'
    },
    title: {
        text: "Répartition du nombre d'idées par mois"
    },
    subtitle: {
        text: 'Source: La Boite à idées de Normandie Seine'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: "Nombre D'idées"
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: currentYear-1,
        data: [null, null, null, null, null, null, null, null, null, null, null, null]
    },
        {
        name: currentYear,
        data: parseCombien(currentYear)
    }]
});


Highcharts.chart('grapha', {
    chart: {
        type: 'column'
    },
    title: {
        text: "Nbre d'idées par thème"
    },
    subtitle: {
        text: 'Boite à idées - Normandie-Seine'
    },
    xAxis: {
        categories: parseTheme(),
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: "Nbre d'idées"
        }
    },

    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: '',
        data: parseNbparTheme()

    }]
});


// Build the chart
Highcharts.chart('graphb', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: "Nbre d'idées par thème"
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: '%',
        colorByPoint: true,
        data: parseCamembert()
    }]
});


Highcharts.chart('graphc', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Nombre de vues par idée'
    },
    subtitle: {
        text: 'Boîte à idées - Crédit Agricole Normandie-Seine'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nombre de vues'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Nombre de vues: <b>{point.y:.1f}</b>'
    },
    series: [{
        name: 'Population',
        data: parseBaton(),
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


function parseCombien(annee) {
    var combien = [];
    $('.contener-'+annee).each(function(){
        combien.push( parseInt($(this).find('.combien').text()) );
    });
    console.log(combien.length);
    return combien;
}

function parseTheme() {
    var theme= [];
    $('.contener-theme').each(function(){
        console.log('---'+$(this).find('.sujet').text());
        theme.push( $(this).find('.sujet').text());
    });
    console.log(theme.length);
    return theme;
}

function parseNbparTheme() {
    var nb= [];
    $('.contener-theme').each(function(){
        console.log('==='+$(this).find('.combien1').text());
        nb.push( parseInt($(this).find('.combien1').text()));
    });
    console.log(nb.length);
    return nb;
}

function parseCamembert() {
    var data= [];
    $('.contener-somme').each(function(){
        somme = parseInt($(this).find('.total').text());
    });
    $('.contener-theme').each(function(){
        combien =parseInt($(this).find('.combien1').text());
        theme =$(this).find('.sujet').text();
        pourcent=combien/somme;
        console.log(pourcent);
        data.push({name : theme, y : pourcent});
    });

    return data;
}

function parseBaton() {
    var data= [];

    $('.contener-view').each(function(){
        nbvues =parseInt($(this).find('.nbvues').text());
        titre =$(this).find('.titre').text();
        data.push([titre, nbvues]);
    });

    return data;
}


