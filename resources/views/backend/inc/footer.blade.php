</div>
</section>

</div>


<footer class="main-footer">
    <strong> &copy; 2024 <a href="https://t.me/eliyorbek_tojimatov">Eliyorbek Tojimatov</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">

    </div>
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>

<script src="/back/plugins/jquery/jquery.min.js"></script>

<script src="/back/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

{{--<script src="/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/back/plugins/chart.js/Chart.min.js"></script>
<script src="/back/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/back/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/back/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/back/plugins/moment/moment.min.js"></script>
<script src="/back/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/back/dist/js/adminlte.js?v=3.2.0"></script>
<script src="/back/dist/js/demo.js"></script>
<script src="/back/dist/js/pages/dashboard.js"></script>
<script src="/back/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="/back/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/back/plugins/select2/js/select2.full.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Alpine.js -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    $(function () {
        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
    // Data range jquery code
    $('#daterange-btn').daterangepicker(
        {
            ranges   : {
                'Bugun'       : [moment(), moment()],
                'Kecha'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Oxirgi 7 kun' : [moment().subtract(6, 'days'), moment()],
                'Oxirgi 30 kun': [moment().subtract(29, 'days'), moment()],
                'Shu oy'  : [moment().startOf('month'), moment().endOf('month')],
                'O\'tgan oy'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
        },
        function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

//
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
//
</script>
@if (Session::has('success'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: 'Muvofaqqiyatli qo\'shildi'
            })
        });
    </script>
@endif
@if (Session::has('narx'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: 'Narx muvofaqqiyatli belgilandi !'
            })
        });
    </script>
@endif
@if (Session::has('xato'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'error',
                title: 'Bir biriga teng bo\'magan parol kiritdingiz!'
            })
        });
    </script>
@endif
@if (Session::has('parol'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'info',
                title: 'Parol muvofaqiyatli o\'zgardi!'
            })
        });
    </script>
@endif
@if (Session::has('delete'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'error',
                title: 'Muvofaqiyatli o\'chirildi . '
            })
        });
    </script>
@endif
@if (Session::has('update'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'info',
                title: 'MUvofaqqiyatli yangilandi.'
            })
        });
    </script>
@endif
@if (Session::has('active'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'warning',
                title: 'Ma\'lumot aktivlashtirildi .'
            })
        });
    </script>
@endif
@if (Session::has('notFount'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'info',
                title: 'Bunday narsa topilmadi!'
            })
        });
    </script>
    @endif
@if (Session::has('validate'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'info',
                title: "Malumotlar validatsadan o'tmadi !"
            })
        });
    </script>
    @endif
</body>
</html>
