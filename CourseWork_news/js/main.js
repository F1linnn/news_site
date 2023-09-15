$('.log_in').click(function(e)
{
    e.preventDefault();
    $(`input`).removeClass('error');
    let login = $('input[name="login"]').val();
    let password = $('input[name="password"]').val();
    $.ajax({
        url:'../scripts/authorization.php',
        type: 'POST',
        dataType: 'json',
        data:{login: login, password: password },
        success (data)
        {
            if(data.status)
                document.location.href='../auth_reg/account_enter.php'
            else
            {
                if (data.type === 1) {
                    data.errors.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    })
                }
                $('.msg').removeClass('nothing').text(data.message)
            }
        }
    });

})

$('.but_reg').click(function(e)
{
    e.preventDefault();
    $(`input`).removeClass('error');
    let your_name = $('input[name="your_name"]').val();
    let email = $('input[name="email"]').val();
    let password = $('input[name="password"]').val();
    let confirm_pass = $('input[name="confirm_pass"]').val();
    $.ajax({
        url:'../scripts/reg.php',
        type: 'POST',
        dataType: 'json',
        data:{your_name: your_name, email: email, password: password, confirm_pass: confirm_pass },
        success (data)
        {
            if(data.status)
                document.location.href='../index.php'
            else
            {
                data.errors.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('error');
                });
                $('.msg').removeClass('nothing').text(data.message)
            }
        }
    });

})

$('.out').click(function(e)
{
    e.preventDefault();
    $.ajax({
        url:'../scripts/logout.php',
        type: 'POST',
        dataType: 'json',
        data:{},
        success (data)
        {
            if(data.status)
                document.location.href='../index.php'

        }
    });
})