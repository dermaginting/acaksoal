// script.js

document.addEventListener("DOMContentLoaded", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_soal.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            tampilkanSoal(data);
        }
    };
    xhr.send();
});

function tampilkanSoal(data) {
    var soalContainer = document.getElementById('soal-container');
    var html = '';
    data.forEach(function(soal) {
        html += '<tr>';
        html += '<td>' + soal.nomor + '</td>';
        html += '<td>' + soal.pertanyaan + '</td>';
        html += '</tr>';
    });
    soalContainer.innerHTML = html;
}
