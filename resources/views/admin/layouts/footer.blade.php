<footer class="sticky-footer" style="margin-top: 170px;">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy; <script>
                    document.write(new Date().getFullYear()); 
                </script> - developed by
                <b><a href="#" target="_blank">plaza team</a></b>
            </span>
        </div>
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
{{-- Page level plugins --}} <!-- Show & Search in product page  -->
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>



{{-- onsubmit (ما زبطت معي) --}}
<script type="text/javascript">
    function confirmDelete(){
            return confirm('Are you sure you want to delete?')
        }
</script>

{{-- summernote to description --}}
<script>
    // $(document).ready(function() {
    //     $('#summernote').summernote();
    //     });
    $('#summernote').summernote({
        height: 100,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['style','bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],//, 'superscript', 'subscript'
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            // ['para', ['ul', 'ol', 'paragraph']],
        ]
    });
</script>

{{-- summernote to additional_info --}}
<script>
    $('#summernote1').summernote({
        height: 100,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['style','bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],//, 'superscript', 'subscript'
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            // ['para', ['ul', 'ol', 'paragraph']],
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

</body>

</html>