/**
 *
 * @param modulName
 * @param method
 *  - create
 *  - show
 *  - list
 * @constructor
 *
 */
function ShowModuleModal(modulName = null, method = "show", title = null, thisi, postID = null, header = null) {
    $('#open-modal-module').modal('show'); // Modal'ı aç
    if (method == "show") {
        var _url = '/' + modulName + '/' + postID; // Modül Name
    }

    if (method == "edit") {
        var _url = '/' + modulName + '/' + postID + "/" + method; // Modül Name
    }

    if (method == "create") {
        var _url = '/' + modulName + '/' + method; // Modül Name
    }

    if (method == "destory") {
        var _url = '/' + modulName + '/' + postID; // Modül Name
    }

    if (header == "1") {
        var _url = _url + "?header=1";
    }

    console.log(_url);

    var ModalCloseButton = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i aria-hidden="true" class="ki ki-close"></i></button>';

    $.ajax({
        url: _url,
        method: 'GET',
        beforeSend: function (response) {
            LoadingWidget(1);
        },
        success: function (response) {
            LoadingWidget(2);
            $('#modalinclude').html('');
            $('#open-modal-module #modal-header').html('<h4 class="modal-title">' + title + '</h4>' + ModalCloseButton);
            $('#modalinclude').html(response);
        },
        error: function (response) {
            console.log(response);
            __Alert('Hata', "Bir hata oluştu. #MDL0002", 'error');
            $('#open-modal-module').modal('hide');
        }
    });

}

function getToken() {

}

function Login() {
    // var data = $('#loginForm').serialize();
    var password = $('#loginForm #password').val();
    var email = $('#loginForm #email').val()
    var data = {
        password: password,
        email: email,
    };
    $.ajax({
        url: "api/login/login.php",
        type: "POST",
        dataType: "json",
        data: JSON.stringify(data),
        headers: {
            "content-type": "application/json;charset=UTF-8"
        },
        beforeSend: function (response) {
        },
        success: function (response) {
            // console.log(JSON.stringify(response.data));
            // localStorage['token'] = JSON.stringify(response.data[0]['token']);
            // localStorage['email'] = JSON.stringify(response.data[0]['email']);
            location.reload(true);
        },
        error: function (response) {
            console.log(response);
            __Alert('Hata', "Bir hata oluştu.", 'error');
        }
    });
}

function userLogout(){
    $.ajax({
        url: "controller/logout.php",
        type: "POST",
        data: {p:"123"},
        success: function (response) {
            console.log(response);
            location.reload(true);
        }
    });
}

function __Alert(title = 'Bildirim', body, icon = 'info') {
    Swal.fire(title, body, icon);
}

function __AlertTimer() {
    let timerInterval
    Swal.fire({
        title: 'Loading..',
        html: 'Wait..',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    })
}

function createProject() {
    // var data = $('#createproduct').serialize();
    var productname = $('#createproduct #productname').val();
    var price = $('#createproduct #price').val();
    var category_id = $('#createproduct #category_id').val();
    var description = $('#createproduct #description').val();
    var token = $('#createproduct #token').val();
    var data = {
        name: productname,
        price: price,
        category_id: category_id,
        description: description,
        token: token
    };
    $.ajax({
        url: "api/product/create.php",
        type: "POST",
        dataType: "json",
        data: JSON.stringify(data),
        headers: {
            "content-type": "application/json;charset=UTF-8"
        },
        beforeSend: function (response) {
            console.log(data);
        },
        success: function (response) {
            location.reload(true);
        },
        error: function (response) {
            console.log(response);
            __Alert('Hata', "Bir hata oluştu.", 'error');
        }
    });
}