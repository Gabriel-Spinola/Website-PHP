$(function () { 
    $('body').on('submit', 'form', () => {
        var formData = $('form')

        $.ajax({
            type: "post",
            url: `${include_path}ajax/forms.php`,
            data: formData.serialize(),
            dataType: "json"
        }).done((data) => {
            if (data.success) {
                console.log('data sended')
            }
            else {
                console.log('error')
            }
        })

        return false
    })
})