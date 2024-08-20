$(document).ready(function () {
    generateProvince();
    $("#select_service").val();
});
function generateProvince() {
    $.ajax({
        type: "GET",
        url: APP_URL + 'province/list',
        data: { select: 'province' },
        success: function (response) {
            data = JSON.parse(response);
            for (let i = 0; i < data.length; i++) {
                $('#input_provinsi_penerima').append('<option value="' + data[i].province_id + '">'
                    + data[i].province_name + '</option>')
            }
        }
    });
    $("#select_service").val();
}
function generateCities() {
    let province_id = $('#input_provinsi_penerima').val();
    $('.cities_option').remove();

    $.get(APP_URL + 'city/list?select=city&param=' + province_id).done(function (data) {
        data = JSON.parse(data);
        for (let i = 0; i < data.length; i++) {
            //alert(data[i]['province_name']);
            $('#input_kota_penerima').append('<option class="cities_option" value="' + data[i].city_id + '">'
                + data[i].city_name + '</option>')
        }
    });
    $("#select_service").val();
}
function generateSubdisctrict() {
    let city_id = $('#input_kota_penerima').val();
    $('.subdistrict_option').remove();
    $.get(APP_URL + 'subdistrict/list?select=subdistrict&param=' + city_id).done(function (data) {
        data = JSON.parse(data);
        for (let i = 0; i < data.length; i++) {
            //alert(data[i]['province_name']);
            $('#input_kecamatan_penerima').append('<option class="subdistrict_option" value="'
                + data[i].subdistrict_id + '">'
                + data[i].subdistrict_name + '</option>')
        }
    });
    $("#select_service").val();
}
function getOngkir() {
    let subdistrict_id = $('#input_kecamatan_penerima').val();
    let berat = $('#berat').val();
    let courier = $('#select_ekspedisi').val();
    $('.courier_option').remove();
    $.get(APP_URL + 'order/ongkir?select=cost&param=' + subdistrict_id + '&berat=' + berat + '&courier=' + courier).done(function (data) {
        // console.log(data);
        data = JSON.parse(data);
        data = data.rajaongkir.results;
        let courier;
        let costs;
        for (let i = 0; i < data.length; i++) {
            courier = data[i];
            for (let x = 0; x < courier.costs.length; x++) {
                costs = courier.costs[x];
                $('#select_service').append('<option class="courier_option" value="' + costs.service + '_' + costs.cost[0].value + '">'
                    + costs.service + ' ' + thousand(costs.cost[0].value) + '</option>')
            }
        }
    });
}
$('#select_service').on('change', function () {
    let val = this.value,
        harga = val.split("_");
    let grand_total = parseInt($('#subtotal_input').val()) + parseInt(harga[1]);
    $("#harga_ongkir").text('Rp. ' + thousand(harga[1]));
    $("#grandtotal").text('Rp. ' + thousand(grand_total));
});