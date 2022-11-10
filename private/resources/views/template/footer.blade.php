</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ebook Admin 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-sign-out-alt mr-2"></i>Keluar Akun
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda ingin keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    <i class="fa fa-arrow-left mr-2"></i>Batal
                </button>
                <a class="btn btn-danger" href="{{ route('logout') }}">
                    <i class="fa fa-sign-out-alt mr-2"></i>Keluar
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Sweetalert2 -->
<script src="{{ url('assets/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
@if(Session::has('messageSuccess'))
<script type="text/javascript">
$(document).ready(function(){
    Swal.fire({icon:'success',title:'Berhasil!',text:"{{ Session::get('messageSuccess') }}"});
});
</script>
@endif
@if(Session::has('messageError'))
<script type="text/javascript">
$(document).ready(function(){
    Swal.fire({icon:'error',title:'Gagal!',text:"{{ Session::get('messageError') }}"});
});
</script>
@endif

<script type="text/javascript">
document.addEventListener('error', function (event) {
     var elm = event.target;
     if (elm.tagName == 'IMG') {
         elm.src = "{{ url('private/public/uploads/images/not_found.png') }}";
     }
 },true);
</script>

</body>

</html>