// Generate kode status
function generateRandomCodeTipe() {
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    var result = "STS-";
    for (var i = 0; i < 3; i++) {
        result += characters.charAt(
            Math.floor(Math.random() * characters.length)
        );
    }
    return result;
}

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("statusTipe");
    const submitButton = document.getElementById("submitButton");
    const kodeInput = document.getElementById("kode_tipe");

    // Generate kode saat halaman dimuat
    kodeInput.value = generateRandomCodeStatus();

    // Event listener saat form akan disubmit
    form.addEventListener("submit", function (e) {
        // Buat input hidden untuk mengirim kode
        const hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "kode_tipe";
        hiddenInput.value = kodeInput.value;
        form.appendChild(hiddenInput);
    });
});
