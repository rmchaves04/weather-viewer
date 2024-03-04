'use strict';

let map;
let geocoder;
const latInput = document.getElementById('lat');
const lngInput = document.getElementById('lng');
const locationInput = document.getElementById('location');

async function initMap() {

    const response = await fetch('/api/maps-key');
    const key = await response.json();

    (g=>{var h,a,k,p='The Google Maps JavaScript API',c='google',l='importLibrary',q='__ib__',m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement('script'));e.set('libraries',[...r]+'');for(k in g)e.set(k.replace(/[A-Z]/g,t=>'_'+t[0].toLowerCase()),g[k]);e.set('callback',c+'.maps.'+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+' could not load.'));a.nonce=m.querySelector('script[nonce]')?.nonce||'';m.head.append(a)}));d[l]?console.warn(p+' only loads once. Ignoring:',g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({key: key, v: 'weekly'});

    const { Map } = await google.maps.importLibrary('maps');
    const { Geocoder } = await google.maps.importLibrary('geocoding');

    map = new Map(document.getElementById('map'), {
        center: { lat: -30.060, lng: -51.175 },
        zoom: 7,
    });

    geocoder = new Geocoder();

}

initMap().then(() => {
    map.addListener('click', (e) => {
        const latLng = e.latLng;

        latInput.value = latLng.lat();
        lngInput.value = latLng.lng();

        geocoder.geocode({'location': latLng}, (results, status) => {
            if (status === 'OK') {
                if (results[0]) {
                    locationInput.value = results[0].address_components[1].long_name;
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
            }
        });

    });
});