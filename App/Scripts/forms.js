$(function () { 
    $('body').on('submit', 'form', () => {
        var formData = $('form')

        // Send the form data to the server side
        $.ajax({
            type: 'post',
            url: `${include_path}Data/forms.php`,
            data: formData.serialize(),
            beforeSend: function () {
                // start loading animation
                $('.overlay-loading').fadeIn()
            },
            success: function (data) {
                // start success log
                $('.success').fadeIn()
                
                // end success log
                setTimeout(() => {
                    $('.success').fadeOut()
                }, 2500)
                
                // end loading animation
                $('.overlay-loading').fadeOut()
            },
            error: function () {
                // start error log
                $('.error').fadeIn()
                
                // end error log
                setTimeout(() => {
                    $('.error').fadeOut()
                }, 2500)
                
                // end loading animation
                $('.overlay-loading').fadeOut()
            }
        })

        return false
    })
})