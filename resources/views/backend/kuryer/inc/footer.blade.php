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

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script src="/back/plugins/chart.js/Chart.min.js"></script>
<script src="/back/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/back/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/back/plugins/moment/moment.min.js"></script>
<script src="/back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/back/dist/js/adminlte.js?v=3.2.0"></script>
<script src="/back/dist/js/pages/dashboard.js"></script>
<script src="/back/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // For Select2 4.0
    $("#form-select-sm").select2({
        theme: "bootstrap-5",
        containerCssClass: "select2--small",
        dropdownCssClass: "select2--small",
    });

    // For Select2 4.1
    $("#form-select-sm").select2({
        theme: "bootstrap-5",
        selectionCssClass: "select2--small",
        dropdownCssClass: "select2--small",
    });
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
@if (Session::has('birik'))
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
                title: 'Buyurtma kuryerga biriktirildi !'
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
@if (Session::has('error'))
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
                title: "Siz boshqaruv paneliga kira olmaysiz!"
            })
        });
    </script>
    @endif
    </body>
    </html>
