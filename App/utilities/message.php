<?php 
    class Message {
        public function successMessage($text) {
            echo "<script>
                    Swal.fire({
                        title: 'Success!',
                        text: '$text',
                        icon: 'success',
                        timer: 3000,
                        showClass: {
                            popup: `
                                animate__animated
                                animate__fadeInDown
                                animate__faster
                            `
                        },
                        hideClass: {
                            popup: `
                                animate__animated
                                animate__fadeOutUp
                                animate__faster
                            `
                        }
                    });
                    </script>";
        }

        public function warningMessage($text) {
            echo "<script>
                    Swal.fire({
                        title: 'Warning!',
                        text: '$text',
                        icon: 'warning',
                        timer: 3000,
                        showClass: {
                            popup: `
                                animate__animated
                                animate__fadeInDown
                                animate__faster
                            `
                        },
                        hideClass: {
                            popup: `
                                animate__animated
                                animate__fadeOutUp
                                animate__faster
                            `
                        }
                    });
                    </script>";
        }
    }
?>