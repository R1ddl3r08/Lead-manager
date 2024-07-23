$(function() {
    $('#leadForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            Fname: $('#firstName').val(),
            Lname: $('#lastName').val(),
            email: $('#email').val(),
            mobile: $('#phone').val(),
            redirect_link: window.location.href,
            api_key: 'MTIzMDgbd283795c5e51d3b7efd4aefbc404fb8'
        };

        $.ajax({
            url: 'https://regression.pabau.me/OAuth2/leads/lead-curl.php',
            type: 'POST',
            data: formData,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Lead submitted successfully!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    background: '#ffffff', 
                    color: '#2c3e50', 
                    confirmButtonColor: '#1abc9c'
                });
                $('#leadForm')[0].reset();
            },
            error: function(error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error submitting the lead. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                    background: '#ffffff',
                    color: '#2c3e50',
                    confirmButtonColor: '#e74c3c'
                });

                console.log(error)
            }
        });
    });
});