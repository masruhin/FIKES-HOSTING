
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
    .then(response => response.json()) // Assuming the response is JSON
    .then(data => {
        // Handle the response from the server
        if (data.status === 'success') {
        } else {
            window.location.href = "https://v1.yogapmngks.my.id/" 
        }
    })
    .catch((error) => {
        alert('Internet Disconnect!');
    });
}

