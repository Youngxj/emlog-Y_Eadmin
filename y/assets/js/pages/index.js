var timer;
var graph;
var graph2;

$(document).ready(function(){
    $(".dial").knob();
      var cityAreaData = [
        500.70,
        410.16,
        210.69,
        120.17,
        64.31,
        150.35,
        130.22,
        120.71,
        300.32
    ]
    $('#vector-map').vectorMap({
        map: 'us_aea_en',
        normalizeFunction: 'polynomial',
        zoomOnScroll:true,
        focusOn:{
            x: 0,
            y: 0,
            scale: 0.9
        },
        zoomMin:0.9,
        hoverColor: false,
        regionStyle:{
            initial: {
                fill: '#bbbbbb',
                "fill-opacity": 1,
                stroke: '#a5ded9',
                "stroke-width": 0,
                "stroke-opacity": 0
            },
            hover: {
                "fill-opacity": 0.8
            }
        },
        markerStyle: {
            initial: {
                fill: '#F57A82',
                stroke: 'rgba(230,140,110,.8)',
                "fill-opacity": 1,
                "stroke-width": 9,
                "stroke-opacity": 0.5,
                r: 3
            },
            hover: {
                stroke: 'black',
                "stroke-width": 2
            },
            selected: {
                fill: 'blue'
            },
            selectedHover: {
            }
        },
        backgroundColor: '#ffffff',
        markers :[

            {latLng: [35.85, -77.88], name: 'Rocky Mt,NC'},
            {latLng: [32.90, -97.03], name: 'Dallas/FW,TX'},
            {latLng: [39.37, -75.07], name: 'Millville,NJ'}

        ],
        series: {
            markers: [{
                attribute: 'r',
                scale: [3, 7],
                values: cityAreaData
            }]
        }
    });
  if ("geolocation" in navigator) {
    $('.js-geolocation').show(); 
  } else {
    $('.js-geolocation').hide();
  }

  /* Where in the world are you? */
  $(document).on('click', '.js-geolocation', function() {
    navigator.geolocation.getCurrentPosition(function(position) {
      loadWeather(position.coords.latitude+','+position.coords.longitude); //load weather using your lat/lng coordinates
    });
  });

  resizefunc.push("reload_charts");
  //$(".content-page").resize(debounce(reload_charts,100));

  load_charts();
  loadWeather('Seattle','');
  monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  dayNames = ["S", "M", "T", "W", "T", "F", "S"];

  var cTime = new Date(), month = cTime.getMonth()+1, year = cTime.getFullYear();

  var events = [
      {
        "date": "4/"+month+"/"+year, 
        "title": 'Meet a friend', 
        "link": 'javascript:;', 
        "color": 'rgba(255,255,255,0.2)', 
        "content": 'Contents here'
      },
      {
        "date": "7/"+month+"/"+year, 
        "title": 'Kick off meeting!', 
        "link": 'javascript:;', 
        "color": 'rgba(255,255,255,0.2)', 
        "content": 'Have a kick off meeting with .inc company'
      },
      {
        "date": "19/"+month+"/"+year, 
        "title": 'Link to Google', 
        "link": 'http://www.google.com', 
        "color": 'rgba(255,255,255,0.2)', 
      }
    ];

    $('#calendar-box2').bic_calendar({
        events: events,
        dayNames: dayNames,
        monthNames: monthNames,
        showDays: true,
        displayMonthController: true,
        displayYearController: false,
        popoverOptions:{
            placement: 'top',
            trigger: 'hover',
            html: true
        },
        tooltipOptions:{
            placement: 'top',
            html: true
        }
    });
});


    /*$('.ds-load').easyPieChart({
        animate: 1000,
        scaleColor: false,
        trackColor: "rgba(0,0,0,0.1)",
        barColor: "#68C39F",
        size: 50,
        onStep: function(from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
    });*/

//http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20csv%20where%20url%3D%27http%3A%2F%2Fdownload.finance.yahoo.com%2Fd%2Fquotes.csv%3Fs%3dDOW%2CNASDAQ%2CSP%26f%3Dsl1d1t1c1ohgv%26e%3D.csv%27%20and%20columns%3D%27symbol%2Cprice%2Cdate%2Ctime%2Cchange%2Ccol1%2Chigh%2Clow%2Ccol2%27&format=json&diagnostics=true&callback=