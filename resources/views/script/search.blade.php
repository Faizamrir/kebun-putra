<script>
    $(document).ready(function() {
        $('#search-button').on('click', function() {
            const query = $('#search-input').val();
            $.ajax({
                url: '{{ route("search") }}',
                method: 'GET',
                data: { query: query },
                success: function(response) {
                    console.log(response);
                    $('#product-list').html(response);
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>