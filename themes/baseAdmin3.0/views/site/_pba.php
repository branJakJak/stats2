  <div class="widget ">
    <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
      PBA
    </div> <!-- /widget-header -->
    
    <?php if ($revDVal >= 0  && $revDVal <= 23.99): ?>
      <div class="widget-content" style="color: white;background: red;">
        <div class='big-label'>
          <b id="liveRevDvalue" style="font-size:68%">
            <?php echo $revDVal ?>
          </b>
        </div>
      </div> <!-- /widget-content -->
    <?php endif ?>


    <?php if ($revDVal >= 24  && $revDVal <= 39.99): ?>
      <div class="widget-content" style="color: white;background: #FFBF00;">
        <div class='big-label'>
          <b id="liveRevDvalue" style="font-size:68%">
            <?php echo $revDVal ?>
          </b>
        </div>
      </div> <!-- /widget-content -->
    <?php endif ?>


    <?php if ($revDVal >= 40): ?>
      <div class="widget-content" style="color: white;background: #5FFB17;">
        <div class='big-label'>
          <b id="liveRevDvalue" style="font-size:68%">
            <?php echo $revDVal ?>
          </b>
        </div>
      </div> <!-- /widget-content -->
    <?php endif ?>
  </div> <!-- /widget -->