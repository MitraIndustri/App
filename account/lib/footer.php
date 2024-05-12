  <!-- Reminder Modal -->
  <!--<div class="modal fade" id="reminder-modal" tabindex="-1" role="dialog" aria-labelledby="reminder-modal">-->
  <!--  <div class="modal-dialog modal-dialog-centered" role="document">-->
  <!--    <div class="modal-content">-->

  <!--      <div class="modal-header bg-secondary">-->
  <!--        <h5 class="modal-title has-icon text-white"> New Reminder</h5>-->
  <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
  <!--      </div>-->

  <!--      <form>-->

  <!--      <div class="modal-body">-->

  <!--        <div class="ms-form-group">-->
  <!--          <label>Remind me about</label>-->
  <!--          <textarea class="form-control" name="reminder"></textarea>-->
  <!--        </div>-->

  <!--        <div class="ms-form-group">-->
  <!--          <span class="ms-option-name fs-14">Repeat Daily</span>-->
  <!--          <label class="ms-switch float-right">-->
  <!--            <input type="checkbox">-->
  <!--            <span class="ms-switch-slider round"></span>-->
  <!--          </label>-->
  <!--        </div>-->

  <!--        <div class="row">-->
  <!--          <div class="col-md-6">-->
  <!--            <div class="ms-form-group">-->
  <!--              <input type="text" class="form-control datepicker" name="reminder-date" value="" />-->
  <!--            </div>-->
  <!--          </div>-->
  <!--          <div class="col-md-6">-->
  <!--            <div class="ms-form-group">-->
  <!--              <select class="form-control" name="reminder-time">-->
  <!--                <option value="">12:00 pm</option>-->
  <!--                <option value="">1:00 pm</option>-->
  <!--                <option value="">2:00 pm</option>-->
  <!--                <option value="">3:00 pm</option>-->
  <!--                <option value="">4:00 pm</option>-->
  <!--              </select>-->
  <!--            </div>-->
  <!--          </div>-->
  <!--        </div>-->

  <!--      </div>-->

  <!--      <div class="modal-footer">-->
  <!--        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>-->
  <!--        <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Reminder</button>-->
  <!--      </div>-->

  <!--      </form>-->

  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

  <!--<div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">-->
  <!--  <div class="modal-dialog modal-dialog-centered" role="document">-->
  <!--    <div class="modal-content">-->

  <!--      <div class="modal-header bg-secondary">-->
  <!--        <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>-->
  <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
  <!--      </div>-->

  <!--      <form>-->

  <!--      <div class="modal-body">-->

  <!--        <div class="ms-form-group">-->
  <!--          <label>Note Title</label>-->
  <!--          <input type="text" class="form-control" name="note-title" value="">-->
  <!--        </div>-->

  <!--        <div class="ms-form-group">-->
  <!--          <label>Note Description</label>-->
  <!--          <textarea class="form-control" name="note-description"></textarea>-->
  <!--        </div>-->

  <!--      </div>-->

  <!--      <div class="modal-footer">-->
  <!--        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>-->
  <!--        <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Note</button>-->
  <!--      </div>-->

  <!--      </form>-->

  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
</main>
<br>
<!-- Footer -->
			<!--<footer class="footer container-fluid pl-10 pr-10">-->
			<!--	<div class="row">-->
			<!--		<div class="col-sm-12"><br>-->
			<!--			<center><p><b><a href="#">IT Team SMK Mitra Industri MM2100</a></b>&copy;2020</center>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</footer>-->
			<!-- /Footer -->
  <!-- SCRIPTS -->
    
  <!--====== Sweet Alert js ======-->
  <script src="<?php echo $cfg_baseurl; ?>assets/js/sweetalert.min.js"></script>
  <!-- Global Required Scripts Start -->
  <script src="<?php echo $cfg_baseurl; ?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/popper.min.js"></script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/perfect-scrollbar.js"> </script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/jquery-ui.min.js"> </script>
  <!-- Global Required Scripts End -->

  <!-- Page Specific Scripts Start -->
  <script src="<?php echo $cfg_baseurl; ?>assets/js/Chart.bundle.min.js"> </script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/project-management.js"> </script>
  <!-- Page Specific Scripts Finish -->
 
  <!-- Mystic core JavaScript -->
  <script src="<?php echo $cfg_baseurl; ?>assets/js/framework.js"></script>

  <!-- Settings -->
  <script src="<?php echo $cfg_baseurl; ?>assets/js/settings.js"></script>
  <!-- Page Specific Scripts Start -->
  <script src="<?php echo $cfg_baseurl; ?>assets/js/raphael.min.js"> </script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/morris.min.js"> </script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/morris-charts.js"> </script>
  <script src="<?php echo $cfg_baseurl; ?>assets/plugins/morris/morris.min.js"></script>
  <script src="<?php echo $cfg_baseurl; ?>assets/plugins/raphael/raphael-min.js"></script>
  <!-- Page Specific Scripts Start -->
  <script src="<?php echo $cfg_baseurl; ?>assets/js/slick.min.js"> </script>
  <!--<script src="<?php echo $cfg_baseurl; ?>assets/js/moment.js"> </script>-->
  <script src="<?php echo $cfg_baseurl; ?>assets/js/jquery.webticker.min.js"> </script>
   <!-- Page Specific Scripts Start -->
   <script>
       $(document).ready(function() {
    $('#datatables').DataTable();
} );
   </script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/datatables.min.js"> </script>
  <script src="<?php echo $cfg_baseurl; ?>assets/js/data-tables.js"> </script>
  <!-- Page Specific Scripts End -->

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61f362f79bd1f31184d9baf0/1fqfbl6ef';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
