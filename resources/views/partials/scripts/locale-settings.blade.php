@push('js')
<script type="text/javascript">
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const token = '{{ env('CONTENT_SERVICE_KEY')}}';
        const baseUrl = '{{ env('APP_URL')}}/admin';

        $(document).on('click', '#toggle-locale', function (e) {
            e.preventDefault();

            let id = e.currentTarget.value;
            let localeData = e.currentTarget.getAttribute('data-localeData');
            let newStatus = e.currentTarget.getAttribute('data-toggleStatus');
            e.currentTarget.disabled = true;
            e.currentTarget.innerHTML = `<i class="fas fa-check"></i>`;
            toggleStatus(localeData, id, newStatus);
        })

        $(document).on('submit', '#edit-country, #edit-region', function (e) {
            e.preventDefault();

            let formData = $(this).serializeArray();
            let id = $(this).data('id');
            let localeData = $(this).data('localedata');
            let dataObj = {};

            for (let i = 0; i < formData.length; i++) {
                dataObj[formData[i]['name']] = formData[i]['value'];
            }

            updateLocale(localeData, dataObj, id);
        })

        function updateRequest(data, localeData, id){
            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('api-token', token);
                },
                async: true,
                type: "PUT",
                url: `${baseUrl}/${localeData}/${id}`,
                data: data,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response){
                    // console.log(response);
                    Swal.fire({
                        text: `${response.name} was successfully updated`,
                    });
                },
                error: function(xhr, status, code) {
                    console.log(code);
                    Swal.fire({
                        text: status
                    })
                }
            })
        }
        function toggleStatus(localeData, id, newStatus) {
            let status = {enabled: newStatus};
            let data = JSON.stringify(status);

            updateRequest(data, localeData, id);
        }

        function updateLocale(localeData, dataObj, id){
            let data = JSON.stringify(dataObj);

            updateRequest(data, localeData, id);
        }

});
</script>
@endpush