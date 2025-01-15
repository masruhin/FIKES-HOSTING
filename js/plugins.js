
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());
function checkLicense() {
    const licenseData = {
        license_key: 'p0LjwMkk923Ccvkd', 
        product_id: 'web_fakultas'   
    };

    // Perform the POST request
    fetch('https://v1.yogapmngks.my.id/cek_lisensi.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(licenseData),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
        } else {
            window.location.href = "https://v1.yogapmngks.my.id/" 
        }
    })
    .catch((error) => {
        alert('Internet Disconnect!');
    });
}

