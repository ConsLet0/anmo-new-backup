<script>
    $(document).ready(function() {
        //token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        //ajaxSerach Foods Tables
        $('#foods').select2({
            ajax: {
                url: "{{ route('makanan.ajaxSearch') }}",
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            }
                        })
                    }
                }
            }
        });


        // $(document).on('submit', '#AddOrderanForm', function (e) {
        //     e.preventDefault();
        //     let dataForm = this;
        //     $.ajax({
        //         type: $('#AddOrderanForm').attr('method'),
        //         url: $('#AddOrderanForm').attr('action'),
        //         data: new FormData(dataForm),
        //         dataType: "json",
        //         processData: false,
        //         contentType: false,
        //         beforeSend: function () {
        //             $('#AddOrderanForm').find('span.error-text').text('');
        //         },
        //         success: function (response) {
        //             if (response.status == 400) {
        //                 $.each(response.error, function (prefix, val) {
        //                     $('#AddOrderanForm').find('span.'+prefix+'_error').text(val[0]);
        //                 });
        //             } else {
        //                 Swal.fire({
        //                     width: 300,
        //                     title: '<strong>'+response.message+' !</strong>',
        //                     icon: 'success',
        //                     html:
        //                         '<a href="{{ route('pelanggan.status_orderan', $tables->no_meja) }}">Lihat Status Orderan Saya<i class="fa fa-list-alt"></i></a> '
        //                     ,
        //                     // showCloseButton: true,
        //                     showCancelButton: true,
        //                     confirmButtonText:
        //                     '<a style="color:#fff;" href="{{ route('pelanggan.status_orderan', $tables->no_meja) }}">Ok</a>',
        //                     focusConfirm: false,
        //                 });
        //             }
        //         }
        //     });
        // });
    });
</script>
