$(function () { 
    $('body').on('submit', 'form', () => {
        var formData = $('form')

        $.ajax({
            type: "post",
            url: `${include_path}ajax/forms.php`,
            data: formData.serialize(),
            dataType: "json"
        })

        return false
    })
})