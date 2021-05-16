<?php

$hour = $cHour * 3600000;
$min = $cMin * 60000;
$time = $hour + $min;

$cMin = $cMin - 1;

?>

<div class="element">
  <div class="info-box">
    <span class="info-box-icon bg-info"><i class="fas fa-stopwatch"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Timer</span>
      <span class="info-box-number" id="realtime"><?php echo $cHour . ':' . $cMin; ?>:60</span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
<script>
  $(document).ready(function() {
    startCount();
  });

  function startCount() {
    timer = setInterval(count, 1000);
  }

  function count() {
    var time_shown = $("#realtime").text();
    var time_chunks = time_shown.split(":");
    var hour, mins, secs;

    hour = Number(time_chunks[0]);
    mins = Number(time_chunks[1]);
    secs = Number(time_chunks[2]);
    secs--;
    if (secs == 00) {
      secs = 60;
      mins = mins - 1;
    }
    if (mins <= 00) {
      mins = 00;
      if (hour != 00) {
        hour = hour - 1;
      }

    }
    if (hour <= 00) {
      hour = 00;
    }

    $("#realtime").text(hour + ":" + plz(mins) + ":" + plz(secs));

  }

  function plz(digit) {

    var zpad = digit + '';
    if (digit < 10) {
      zpad = "0" + zpad;
    }
    return zpad;
  }
</script>
<script>
  setTimeout(function() { //calls click event after a certain time
    $('form').submit();
  }, <?php echo $time; ?>);
</script>