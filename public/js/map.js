async function loadMap() {
    const response = await fetch('/api/maps-key');
    const apiKey = await response.json();

    const mapLoader = new Loader({
        apiKey: apiKey,
        version: 'weekly',
        libraries: ['places']
    });
    
    const mapOptions = {
        center: {
            lat: -34.397, 
            lng: 150.644 
        },
        zoom: 8
    };
    
    mapLoader
        .importLibrary('maps')
        .then(({Map}) => {
            new Map(document.getElementById('map'), mapOptions);
        })
        .catch((e) => {
            console.error(e);
        });
}

loadMap();