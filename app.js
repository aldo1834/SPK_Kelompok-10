document.getElementById("formData").addEventListener("submit", function(e){
    e.preventDefault();

    let formData = new FormData(this);
    let data = {};

    ["D","E","F","G","H","I"].forEach(k => {
        data[k] = formData.get(k) ? true : false;
    });

    fetch("api/process.php", {
        method: "POST",
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(res => {

        let output = "<h3>Hasil:</h3>";

        if(res.status === "LAYAK"){
            output += "<p>Kandidat LAYAK</p><ul>";

            res.fakta.forEach(f => {
                output += "<li>"+f+"</li>";
            });

            output += "</ul>";
        } else {
            output += "<p>TIDAK LAYAK</p>";
            output += "<p>Penyebab: "+res.penyebab+"</p>";
        }

        document.getElementById("hasil").innerHTML = output;
    });

});