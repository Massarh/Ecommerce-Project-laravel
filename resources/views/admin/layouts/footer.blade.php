<footer>
    <div class="mt-4 text-center">

        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="mailto:goplaza.team22@gmail.com" class="social-list-item bg-success text-white border-success"
                    target="_blank" style="line-height: 29px;">
                    <i class="mdi mdi-gmail" style="font-size: large !important"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://www.instagram.com/go_plaza/" target="_blank" style="line-height: 29px;"
                    class="social-list-item bg-danger text-white border-danger">
                    <i class="mdi mdi-instagram" style="font-size: large !important"></i>
                </a>
            </li>
            {{-- <li class="list-inline-item">
                <a href="#" class="social-list-item bg-primary text-white border-primary" target="_blank"
                    style="line-height: 29px;">
                    <i class="mdi mdi-facebook" style="font-size: large !important"></i>
                </a>
            </li> --}}
        </ul>
    </div>


    <div class="copyright text-center my-auto">
        <span>developed by <b>plaza team</b> &copy; <script>
                document.write(new Date().getFullYear()); 
            </script>
    </div>
</footer>


<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('admin/js/ruang-admin.min.js')}}"></script>
<script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
{{-- include summernote css/js --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{{-- Page level plugins --}}
<!-- Show & Search in product page  -->
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>



<!-- summernote to description -->
<script>
    $('#summernote').summernote({
        height: 100,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['style','bold', 'italic']],
            ['style', [ 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            
        ]
    });
</script>

<!-- summernote to additional_info -->
<script>
    $('#summernote1').summernote({
        height: 100,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['style','bold', 'italic']],
            ['style', [ 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
        ]
    });
</script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function () {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
</script>