        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.  Premium <a href="{{url('admin')}}" target="_blank"></a>Medstore. All rights reserved.</span>
            {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span> --}}
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('public/admin') }}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('public/admin') }}/vendors/chart.js/Chart.min.js"></script>
  {{-- <script src="{{ asset('public/admin') }}/vendors/datatables.net/jquery.dataTables.js"></script> --}}
  <script src="{{ asset('public/admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{ asset('public/admin') }}/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('public/admin') }}/js/off-canvas.js"></script>
  <script src="{{ asset('public/admin') }}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('public/admin') }}/js/template.js"></script>
  
  <script src="{{ asset('public/admin') }}/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('public/admin') }}/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="{{ asset('public/admin') }}/js/dashboard.js"></script>
  <script src="{{ asset('public/admin') }}/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>
</html>

