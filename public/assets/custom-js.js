document.addEventListener('DOMContentLoaded', function() {
    const loanAmountInput = document.getElementById('loan_amount');
    const loanAmountValue = document.getElementById('loan_amount_value');
    const loanTermInput = document.getElementById('loan_term');
    const loanTermValue = document.getElementById('loan_term_value');

    // Update the displayed value for loan amount
    loanAmountInput.addEventListener('input', function() {
        loanAmountValue.textContent = parseInt(this.value).toLocaleString('id-ID');
    });

    // Update the displayed value for loan term
    loanTermInput.addEventListener('input', function() {
        loanTermValue.textContent = this.value;
    });

    // Initialize displayed values
    loanAmountValue.textContent = parseInt(loanAmountInput.value).toLocaleString('id-ID');
    loanTermValue.textContent = loanTermInput.value;
});

document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('date_birthday');
    const errorDiv = document.getElementById('date_birthday_error');
    const today = new Date();
    const minDate = new Date(today.getFullYear() - 55, today.getMonth(), today.getDate());
    const maxDate = new Date(today.getFullYear() - 21, today.getMonth(), today.getDate());

    dateInput.min = minDate.toISOString().split('T')[0];
    dateInput.max = maxDate.toISOString().split('T')[0];

    dateInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        if (selectedDate < minDate || selectedDate > maxDate) {
            errorDiv.style.display = 'block';
        } else {
            errorDiv.style.display = 'none';
        }
    });
});

$(document).ready(function() {
    $('#city_district').select2();
});

function handle_save(tombol, form, url, method, title) {
    $(document).one('submit', form, function (e) {
        e.preventDefault(); // Menghentikan pengiriman formulir secara default
        let data = new FormData($(form)[0]); // Menggunakan FormData untuk mengambil data formulir termasuk file
        data.append('_method', method);
        $(tombol).prop("disabled", true);
        $(tombol).attr("data-kt-indicator", "on");
        loading();
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (response) {
                loaded();
                if (response.alert == "success") {
                    success_toastr(response.message);
                    $(form)[0].reset();
                    setTimeout(function () {
                        window.location.href = response.data;
                    }, 2000);
                } else {
                    error_toastr(response.message);
                    grecaptcha.reset();
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).removeAttr("data-kt-indicator");
                    }, 2000);
                }
            },
        });
        return false;
    });
}  


// Mendapatkan elemen HTML
const startCameraBtn = document.getElementById('start-camera-btn');
const videoContainer = document.querySelector('.video-container');
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
const captureBtn = document.getElementById('capture-btn');
const retakeBtn = document.getElementById('retake-btn');
const usePhotoBtn = document.getElementById('use-photo-btn');
const photoInput = document.getElementById('photo-input');
const selfiePreview = document.getElementById('selfie_preview');
let stream;

// Menambahkan event listener untuk menampilkan KTP yang diunggah
document.getElementById('id_photo_path').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const imageURL = URL.createObjectURL(file);
        document.getElementById('ktp_preview').src = imageURL;
        document.getElementById('ktp_preview').style.display = 'block';
    }
});

// Fungsi untuk memulai kamera
startCameraBtn.addEventListener('click', () => {
    videoContainer.style.display = 'block';
    startCameraBtn.style.display = 'none';
    captureBtn.style.display = 'inline-block'; 
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(s => {
            stream = s;
            video.srcObject = stream;
            video.play();
        })
        .catch(err => {
            console.error(`Error: ${err}`);
        });
});

// Fungsi untuk menangkap foto
captureBtn.addEventListener('click', () => {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);

    // Menampilkan hasil foto di elemen img di posisi yang sama dengan video
    const dataURL = canvas.toDataURL('image/png');
    selfiePreview.src = dataURL;
    selfiePreview.style.display = 'block';
    video.style.display = 'none'; // Menyembunyikan video
    captureBtn.style.display = 'none';
    retakeBtn.style.display = 'inline-block'; // Menampilkan tombol "Ambil Ulang"
    usePhotoBtn.style.display = 'inline-block'; // Menampilkan tombol "Gunakan Ini"

    // Stop the camera stream
    stream.getTracks().forEach(track => track.stop());
});

// Fungsi untuk mengambil ulang foto
retakeBtn.addEventListener('click', () => {
    selfiePreview.style.display = 'none';
    video.style.display = 'block'; // Menampilkan kembali video
    captureBtn.style.display = 'inline-block';
    retakeBtn.style.display = 'none'; // Menyembunyikan tombol "Ambil Ulang"
    usePhotoBtn.style.display = 'none'; // Menyembunyikan tombol "Gunakan Ini"

    // Restart the camera stream
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(s => {
            stream = s;
            video.srcObject = stream;
            video.play();
        })
        .catch(err => {
            console.error(`Error: ${err}`);
        });
});

// Fungsi untuk menggunakan foto dan mengisi input file
usePhotoBtn.addEventListener('click', () => {
    selfiePreview.style.display = 'block';
    const dataURL = canvas.toDataURL('image/png');
    const blob = dataURItoBlob(dataURL);
    const file = new File([blob], "Selfie.png", { type: "image/png" });

    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    photoInput.files = dataTransfer.files;

    // Menyembunyikan kamera dan menampilkan kembali tombol Buka Kamera
    videoContainer.style.display = 'none';
    startCameraBtn.style.display = 'inline-block';
     // Menampilkan gambar

    // Stop the camera stream
    stream.getTracks().forEach(track => track.stop());
});

// Fungsi untuk mengubah data URL ke Blob
function dataURItoBlob(dataURI) {
    const byteString = atob(dataURI.split(',')[1]);
    const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    const ab = new ArrayBuffer(byteString.length);
    const ia = new Uint8Array(ab);
    for (let i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    return new Blob([ab], { type: mimeString });
} 

var onloadCallback = function() {
    alert("grecaptcha is ready!");
}; 
