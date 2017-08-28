console.log("Remove-button library loaded");

function flagAsRemoved() {
    console.log("flag function start");
    getCsrfToken(function ( csrToken ) {
        patchNode(csrToken);
    });
}

function patchNode(csrfToken) {
    console.log("patchNode called");
    var body = {
        "data": {
            "id": drupalSettings.remove_uuid,
            "attributes": {
                "field_dolebas_removed_by_user": true
            }
        }
    };
    jQuery.ajax({
        url: '/jsonapi/node/dolebas_publisher/' + drupalSettings.remove_uuid + '?_format=json&token=' + csrfToken,
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/vnd.api+json',
            'Accept': 'application/vnd.api+json'
        },
        data: JSON.stringify(body),
        success: console.log("Success")
    });
}    

// Get token for JSON API
function getCsrfToken(callback) {
    console.log("Fetching token...");
    jQuery
        .get(Drupal.url('session/token'))
        .done(function (csrfToken) {
            callback(csrfToken);
            console.log("Token fetched");
        });
}