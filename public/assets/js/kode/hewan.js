// Generate kode status
function generateRandomCodeHewan() {
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    var result = "HWN-";
    for (var i = 0; i < 3; i++) {
        result += characters.charAt(
            Math.floor(Math.random() * characters.length)
        );
    }
    return result;
}

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("hewanForm");
    const submitButton = document.getElementById("submitButton");
    const kodeInput = document.getElementById("ternak_tag");

    // Generate kode saat halaman dimuat
    kodeInput.value = generateRandomCodeHewan();

    // Event listener saat form akan disubmit
    form.addEventListener("submit", function (e) {
        // Buat input hidden untuk mengirim kode
        const hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "ternak_tag";
        hiddenInput.value = kodeInput.value;
        form.appendChild(hiddenInput);
    });
});
