<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Eventvue project - view all visitors</title>
    <script language="Javascript"
      src="http://gd.geobytes.com/gd?after=-1&variables=GeobytesLatitude,GeobytesLongitude"></script>
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
      'message': <?= "'" . $VISITOR_DATA->getMessage() . "'" ?>,
      'tinyurl': <?= "'" . $VISITOR_DATA->getTinyUrl() . "'" ?> 
    },
    <?php } ?>
    ];

    //]]>
    </script>
  </head>
  <body onload="load(false)" onunload="GUnload()">
    <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" >
      <div id="form" style="width: 41em; margin-bottom: 5px; margin-top: 5px; margin-left: auto; margin-right: auto;">
        <form method='post' action='map.php' onsubmit='removeApostrophes(this)'>
          <input type='hidden' name='action' value='update' />
          <div>
            <span>Name: <input type='text' name='name' /></span>
            <span>Location: <input type='text' name='location' id='location' /></span>
            <span>Message: <input type='text' name='message' /></span>
          </div>
          <div style="width: 5em; margin-top: 5px; margin-left: auto; margin-right: auto;"><input type='submit' value="Add Me!"/></div>
        </form>
      </div>
      <div id="map" style="width: 100%; height: 100%;"></div>
    </div>
  </body>
</html>
