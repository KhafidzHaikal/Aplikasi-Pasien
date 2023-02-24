$(document).ready(function () {
    $('#myTable').DataTable();
});

$(document).ready(function () {
    $('#tablePasiens').DataTable();
});

$(document).ready(function () {
    $('#tableBpUmum').DataTable();
});

$(document).ready(function () {
    $('#roleSelect2').select2();
});

$(document).ready(function () {
    $('#tipeObat').select2();
});

$(document).ready(function () {
    $('#obatsatu').select2();
});
$(document).ready(function () {
    $('#obatdua').select2();
});

$(document).ready(function () {
    $('#noPasienSelect').select2({
        placeholder: '---Pilih No.Register Pasien---',
    });
});

$(document).ready(function () {
    $('#noPerawatSelect').select2();
});

$(document).ready(function () {
    $('#noKajianPasienSelect').select2({
        placeholder: '---Pilih No.Register Pasien---',
    });
});

$(document).ready(function () {
    $('#icd').select2({
        placeholder: '--- Pilih ICD ---',
    });
});


$(function keluhan() {
    $("#keluhan").change(function () {
        if ($(this).val() == "ya") {
            $("#amount_keluhan").removeAttr("disabled");
            $("#amount_keluhan").focus();
            $("#amount_keluhan").show();
        } else {
            $('#amount_keluhan').hide();
            $("#amount_keluhan").attr("disabled", "disabled");
        }
    });
});

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
});


$(document).ready(function () {
    $('.ckeditor').ckeditor();
});



