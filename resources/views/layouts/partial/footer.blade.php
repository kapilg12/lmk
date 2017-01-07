    <!-- DataTables -->
    <script type="text/javascript" src="{!! asset('plugins/datatables/jquery.dataTables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
    <!-- SlimScroll -->
    <script type="text/javascript" src="{!! asset('plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
    <!-- FastClick -->
    <script type="text/javascript" src="{!! asset('plugins/fastclick/fastclick.min.js') !!}"></script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="{!! asset('dist/js/app.min.js') !!}"></script>
    <!-- AdminLTE for demo purposes -->
    <script type="text/javascript" src="{!! asset('dist/js/demo.js') !!}"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

@yield('js')
</body>
</html>
