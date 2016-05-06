

window.fbAsyncInit = function() {
    FB.init({
        appId      : '588717817953970',
        cookie     : true,  // enable cookies to allow the server to access
                            // the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.2' // use version 2.2
    });

    FB.getLoginStatus(function(response) {
        if(!response || !response.status){
            console.log('connect error!');
            return false;
        }

        switch(response.status){
            case 'connected':
                FB.api('/me', function(response) {
                    console.log(response);
                });
                break;
            case 'not_authorized':
            default:
                break;
        }

    });

};

// Load the SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

