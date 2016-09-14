@extends('admin.admin-master')

<!-- Step 1: Create the containing elements. -->
@section('content')

{!! Html::style('css/bootstrap.css') !!}
{!! Html::style('css/analytics.css') !!}
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}

<section id="auth-button"></section>
<section id="view-selector"></section>
<!--
<div id="sessions-container" class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
  <div id="sessions"></div>
</div>
<div id="pageviews-container" class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
  <div id="pageviews"></div>
</div>
<div id="bounces-container" class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
  <div id="bounces"></div>
</div>
<div id="browsers-container" class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
  <div id="browsers"></div>
</div>
-->
<div style="margin-bottom: 50px;"></div>
<div id="content" style="max-width:80%; margin: 0 auto;"></div>
<div style="margin-bottom: 50px;"></div>
<div id="browsers" style="max-width:80%; margin: 0 auto;"></div>
<div id="keywords" style="max-width:80%; margin: 0 auto; padding-top:100px; padding-bottom:100px;"></div>
<div id="sessions"></div>
<div id="pageviews"></div>
<div id="bounces"></div>
<!-- Step 2: Load the library. -->

<script>
(function(w,d,s,g,js,fjs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
}(window,document,'script'));
</script>

<script>
gapi.analytics.ready(function() {

  // Step 3: Authorize the user.

  var CLIENT_ID = '368971328859-26354qnibpbtu5g4s1qag1kicv2mmeuq.apps.googleusercontent.com';

  gapi.analytics.auth.authorize({
    container: 'auth-button',
    clientid: CLIENT_ID,
  });

  // Step 4: Create the view selector.

  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector'
  });

  // Step 5: Create the sessions chart.

  var sessions = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:sessions',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
    },
    chart: {
      type: 'LINE',
      container: 'sessions',
      options: {
        width: '100%',
        colors: ['white'],
        /*pointSize: 20,
        pointShape: { type: 'star', sides: 5, dent: 0.25},*/
        chartArea: {
            backgroundColor:'#00234C',
            width:'80%'
        }
      }
    }
  });

  var pageviews = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:pageviews',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
    },
    chart: {
      type: 'LINE',
      container: 'pageviews',
      options: {
        width: '100%',
        colors: ['#00234C'],
        /*pointSize: 20,
        pointShape: { type: 'star', sides: 5, dent: 0.25},*/
        chartArea: {
            backgroundColor:'white',
            width:'80%'
        }
      }
    }
  });

  var bounces = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:bounces',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
    },
    chart: {
      type: 'LINE',
      container: 'bounces',
      options: {
        width: '100%',
        colors: ['red', 'white'],
        /*pointSize: 20,
        pointShape: { type: 'star', sides: 5, dent: 0.25},*/
        chartArea: {
            backgroundColor:'#00234C',
            width:'80%'
        }
      }
    }
  });

  var browsers = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:source,ga:medium',
      'metrics': 'ga:sessions,ga:pageviews,ga:sessionDuration',
    },
    chart: {
      type: 'TABLE',
      container: 'browsers',
      options: {
        width: '100%',
        chartArea: {
          width:'80%'
        }
      }
    }
  });

  var content = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:pagePath',
      'metrics': 'ga:pageviews,ga:sessions',
      'sort': '-ga:pageviews',
    },
    chart: {
      type: 'TABLE',
      container: 'content',
      options: {
        width: '100%',
        chartArea: {
        }
      }
    }
  });

  var keywords = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:exitPagePath',
      'metrics': 'ga:exits,ga:pageviews',

    },
    chart: {
      type: 'TABLE',
      container: 'keywords',
      options: {
        width: '100%',
        chartArea: {
          width:'80%'
        }
      }
    }
  });

  // Step 6: Hook up the components to work together.

  gapi.analytics.auth.on('success', function(response) {
    viewSelector.execute();
    $('#view-selector').hide();
  });

  viewSelector.on('change', function(ids) {
    var newIds = {
      query: {
        ids: ids
      }
    }
    sessions.set(newIds).execute();
    pageviews.set(newIds).execute();
    bounces.set(newIds).execute();
    content.set(newIds).execute();
    browsers.set(newIds).execute();
    keywords.set(newIds).execute();
  });
});
</script>

@endsection