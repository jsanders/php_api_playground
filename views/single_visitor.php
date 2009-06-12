<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>My location and message to the world</title>
    <script
      src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgUKdCmeqeUfVPv8SULWLrRTpDmodr6HoJ7-VipMSQqQIpwgMjRSmV3n-bqJgPemRGJrf9_g2aFIOxA"
      type="text/javascript"></script>
    <script type='text/javascript' src='js/map.js'></script>
    <script type='text/javascript'>

    //<![CDATA[

    var visitors = [
    <?php while($VISITOR_DATA->nextRow()) { ?>
    { 
      'name': <?= "'" . $VISITOR_DATA->getName() . "'" ?>,
      'location': <?= "'" . $VISITOR_DATA->getLocation() . "'" ?>,
      'message': <?= "'" . $VISITOR_DATA->getMessage() . "'" ?> 
    },
    <?php } ?>
    ];

    //]]>
    </script>
  </head>
  <body onload="load(true)" onunload="GUnload()">
    <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" >
      <div id="map" style="width: 100%; height: 100%;"></div>
    </div>
  </body>
</html>
