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
    });
</script>
