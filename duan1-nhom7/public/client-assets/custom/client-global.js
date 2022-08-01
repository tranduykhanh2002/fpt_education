function confirm_remove(url, name, pageName = null) {
    Swal.fire({
        title: `Bạn có thực sự muốn xóa ${pageName} "${name}"?`,
        // showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: `Hủy`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = url
        }
    })
}