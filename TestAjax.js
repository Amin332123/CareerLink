fetch('https://api.example.com/data')
    .then (response => {
        if (!response.ok) {
            console.log('not found');
        }
        return response.json();
    })
    .then (data => console.log(data))
    .catch (error => console.error('error', error));
