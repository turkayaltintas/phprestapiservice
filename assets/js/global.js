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
function ShowModuleModal(modulName = null, method = "show", title = null, thisi, postID = null,header = null) {
    $('#open-modal-module').modal('show'); // Modal'ı aç
    if(method == "show"){
        var _url = '/' + modulName + '/' + postID ; // Modül Name
    }

    if (method == "edit"){
        var _url = '/' + modulName + '/' + postID + "/" + method  ; // Modül Name
    }

    if (method == "create"){
        var _url = '/' + modulName + '/' + method  ; // Modül Name
    }

    if (method == "destory"){
        var _url = '/' + modulName + '/' + postID ; // Modül Name
    }

    if (header == "1"){
        var _url = _url + "?header=1";
    }

    console.log(_url);

    var ModalCloseButton = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i aria-hidden="true" class="ki ki-close"></i></button>';

    $.ajax({
        url:_url,
        method: 'GET',
        beforeSend: function (response) {
            LoadingWidget(1);
        },
        success: function(response) {
            LoadingWidget(2);
            $('#modalinclude').html('');
            $('#open-modal-module #modal-header').html('<h4 class="modal-title">'+ title +'</h4>' + ModalCloseButton);
            $('#modalinclude').html(response);
        },
        error: function(response) {
            console.log(response);
            __Alert('Hata', "Bir hata oluştu. #MDL0002", 'error');
            LoadingWidget(2);
            $('#open-modal-module').modal('hide');
        }
    });

}


function Login(){
    $.ajax({
        url:_url,
        method: 'GET',
        beforeSend: function (response) {
            LoadingWidget(1);
        },
        success: function(response) {
            LoadingWidget(2);
            $('#modalinclude').html('');
            $('#open-modal-module #modal-header').html('<h4 class="modal-title">'+ title +'</h4>' + ModalCloseButton);
            $('#modalinclude').html(response);
        },
        error: function(response) {
            console.log(response);
            __Alert('Hata', "Bir hata oluştu. #MDL0002", 'error');
            $('#open-modal-module').modal('hide');
        }
    });
}

function __Alert(title = 'Bildirim', body, icon = 'info') {
    Swal.fire(title, body, icon);
}
