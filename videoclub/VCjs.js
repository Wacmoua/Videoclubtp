function toggleTable() {
    var table = document.getElementById("reservation-table");
    if (table.style.display === "none") {
        table.style.display = "table";
    } else {
        table.style.display = "none";
    }
}