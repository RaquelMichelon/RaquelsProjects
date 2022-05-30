
var initialCoordinates = [-27.5941911, -48.5432205]; // IFSC
var initialZoomLevel = 13;

// create a map in the "map" div, set the view to a given place and zoom
var map = L.map('map').setView(initialCoordinates, initialZoomLevel);

// add an OpenStreetMap tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

//create icon
const icon = L.icon({
    iconUrl: 'http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/Images/favicon.png',
    iconSize: [48, 58],
    iconAnchor: [29, 68],
    popupAnchor: [0, -50]
});

let marker;
//create and add marker
map.on('click', (event) => {

    // console.log(event);

    const lat = event.latlng.lat;
    const lng = event.latlng.lng;

    document.querySelector('[name=latitude]').value = lat;
    document.querySelector('[name=longitude]').value = lng;

    // remove icon 
    marker && map.removeLayer(marker)

    // add icon layer
    marker = L.marker([lat, lng], { icon })
        .addTo(map);
})

// .bindPopup().openPopup()
//.bindPopup(e.geocode.name)

//barra de pesquisa
var geocoder = L.Control.geocoder({
    defaultMarkGeocode: false
})
    .on('markgeocode', function (e) {
        var cidade = e.geocode.properties.address["city"];
        // var pais = e.geocode.properties.address["country"];
        var numero = e.geocode.properties.address["house_number"];
        var cep = e.geocode.properties.address["postcode"];
        var rua = e.geocode.properties.address["road"];
        var estado = e.geocode.properties.address["state"];
        var bairro = e.geocode.properties.address["suburb"];
        document.querySelector('[name=cidade]').value = cidade;
        //document.querySelector('[name=pais]').value = pais;
        document.querySelector('[name=numero]').value = numero;
        document.querySelector('[name=logradouro]').value = rua;
        document.querySelector('[name=cep]').value = cep;
        document.querySelector('[name=estado]').value = estado;
        document.querySelector('[name=bairro]').value = bairro;


        //PARA OBTER LAT E LONG
        var lat = e.geocode.center.lat
        var lng = e.geocode.center.lng

        document.querySelector('[name=latitude]').value = lat;
        document.querySelector('[name=longitude]').value = lng;

        var latlng = e.geocode.center;

        // remove icon 
        marker && map.removeLayer(marker)
        // map.clearLayers(marker); //no deu certo
        marker = L.marker(latlng, { icon }).addTo(map).bindPopup(e.geocode.html).openPopup();
        map.fitBounds(e.geocode.bbox);
    })
    .addTo(map);


function validate(event) {

    //validar se lat e lng estão preenchidos -> VERIFICAR SE O VALUE ESTÁ VAZIO COM IF; E SE ESTIVER VAZIO, FAZeR UM event.preventDefault()
    const needsLatAndLng = false; //true???

    if (needsLatAndLng) {
        event.preventDefault()
        alert('Selecione um ponto no mapa!')
    }
}

