<?php
$errors = $this->session->flashdata("eror_message");
$success= $this->session->flashdata("success_message");
if(!empty($erors))
{
   ?>
   <div class= "alert alert-danger"><?php echo $errors;?></div>
   <?php
}

if(!empty($success))
{
   ?>
   <div class= "alert alert-success"><?php echo $success;?></div>
   <?php
}?>
<div class="card shadow mb-4">
<?php echo anchor("sms/save" , "Fetch Places", "class='btn btn-danger btn-lg' ") ?>
<div id="map"></div>
<script type="text/javascript">
    var locations = JSON.parse(<?php echo $places;?>);
    //console.log(locations);
    function initMap()
    {
         var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng(-1.2682643,36.8111214),
            mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var infowindow = new google.maps.InfoWindow();
            var marker, i;
            for (i = 0; i < locations.length; i++) 
            {  
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
                }
            })(marker, i));
    }
}
  </script>
    <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm7yPxeavYvui0TGs5YsOnWGxRQlA8D9Y&callback=initMap">
    </script>