<!DOCTYPE html>
<html>
    <head>
      <title>Add a Map with Markers using HTML</title>
  
      <link rel="stylesheet" type="text/css" href="./style.css" />
      <script type="module" src="./index.js"></script>
    </head>
    <body>
        <gmp-advanced-marker
          position="37.4220656,-122.0840897"
          title="Mountain View, CA"
        ></gmp-advanced-marker>
        <gmp-advanced-marker
          position="47.648994,-122.3503845"
          title="Seattle, WA"
        ></gmp-advanced-marker>
      </gmp-map>
  
      <!-- 
        The `defer` attribute causes the callback to execute after the full HTML
        document has been parsed. For non-blocking uses, avoiding race conditions,
        and consistent behavior across browsers, consider loading using Promises.
        See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
        for more information.
        -->
      <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap&libraries=marker&v=beta"
        defer
      ></script>
    </body>
  </html>

