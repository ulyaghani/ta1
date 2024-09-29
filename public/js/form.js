$(document).on('click', '.send', function () {
    /* Inputan Formulir */
    var input_name = $("#name").val(),
        input_email = $("#email").val(),
        input_product = $("#product").val(),
        input_message = $("#message").val();

    /* Pengaturan Whatsapp */
    var walink = 'https://web.whatsapp.com/send',
        phone = '6287731360366',
        text = 'Halo saya ingin konsultasi ',
        text_yes = 'Pesan Anda berhasil terkirim.',
        text_no = 'Isilah formulir terlebih dahulu.';

    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        var walink = 'whatsapp://send';
    }

    if (input_name != "" && input_email != "" && input_product != "") {
        /* Whatsapp URL */
        var checkout_whatsapp = walink + '?phone=' + phone + '&text=' + text + '%0A%0A' +
            '*Nama* : ' + input_name + '%0A' +
            '*Alamat Email* : ' + input_email + '%0A' +
            '*Kebutuhan* : ' + input_product + '%0A' +
            '*Pertanyaan* : ' + input_message + '%0A';

        /* Whatsapp Window Open */
        window.open(checkout_whatsapp, '_blank');
        document.getElementById("text-info").innerHTML = '<div class="alert alert-success">' + text_yes + '</div>';
    } else {
        document.getElementById("text-info").innerHTML = '<div class="alert alert-danger">' + text_no + '</div>';
    }
});