<table class="table table-hover e-commerce-table">
    <thead>
    <tr>
       {{ $columns }}
    </tr>
    </thead>
    <tbody>
        {{ $rows }}
    </tbody>
</table>
@push('js')
    <script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/e-commerce-order-list.js') }}"></script>
    <script>
        $('.e-commerce-table').dataTable({
            "bPaginate": false,
            "searching": false,
            "info":     false
        });
    </script>
@endpush

@push('css')
    <link href="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endpush
