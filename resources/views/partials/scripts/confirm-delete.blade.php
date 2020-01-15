@push('js')
    <script>
        function confirmDelete(e, resourceName) {
            Swal.fire({
                title: 'Are you sure?',
                text: `You will permanently delete this ${resourceName}`,
                type: 'warning',
                confirmButtonText: 'Continue',
                showCancelButton: true,
                cancelButtonText: "Cancel"
            }).then((result) => {
                if(result.value && result.value === true) {
                    e.submit();
                }
            })

            return false;
        }
    </script>
@endpush
