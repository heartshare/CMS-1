/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function startLoading(message) {
    $('#loading-message').text(message);
    $('#loading-layout').show();
}
function stopLoading() {
     $('#loading-message').text('');
    $('#loading-layout').hide();
}

function displayMessage(message){
    $("#display-message").modal();
}
function baseAjax(url, arrayData, callBack, isLoading, isHtml) {
    if (isLoading != 'undefined' && isLoading == true) {
        startLoading();
    }
    $.ajax({
        method: "POST",
        url: url,
        data: arrayData,
        dataType: 'JSON',
        complete: function () { /*AjaxStatus = true;*/
            if (isLoading != 'undefined' && isLoading == true) {
                stopLoading();
            }
        },
        success: function (response) {
            if (isHtml != 'undefined' && isHtml == true) {
                callBack(response);
            } else if (response.status) {
                callBack(response.data);
            } else {
                if (response.message != "") {
                    if (isLoading != 'undefined' && isLoading == true) {
                        stopLoading();
                    }
                    alert(response.message);
                } else {
                    if (isLoading != 'undefined' && isLoading == true) {
                        stopLoading();
                    }
                    alert('İşlem sırasında hata oluştu');
                }
            }
        },
        error: function (xhr) { /*alert('error' + xhr);return false;*/
            if (isLoading != 'undefined' && isLoading == true) {
                stopLoading();
            }
            alert('Istek Sırasında Hata Oluştu!;')
        }
    });
}