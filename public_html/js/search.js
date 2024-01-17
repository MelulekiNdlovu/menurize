function search() {
    let searchBar = document.getElementById('searchBar').value;
    let cty = document.getElementById('city').value;
    let q = document.querySelector('input[name="rest"]:checked').value;

    let spinner = "<div class=\"spinner-border text-warning\" role=\"status\"><span class=\"visually-hidden\">Loading...</span></div>";

    if (searchBar == "") {
        document.getElementById("msg").innerHTML = "Seach box cannot be empty!";
    } else {

        document.getElementById("output").innerHTML = spinner;

        let data = {
            query: searchBar,
            filter: q,
            city: cty
        };

        let URL = "search.php";

        fetch(URL, {
            method: 'post',
            body: JSON.stringify(data)
        }).then(response => response.text()).then(data => {
            
            if (data == "") {
                document.getElementById("output").innerHTML = "No matching result!";
            }else{document.getElementById("output").innerHTML = data;}
            
        });

    }
    
}


window.addEventListener('load', function (event) {
    let URL = "citylist.php";

        fetch(URL, {
            method: 'post'
        }).then(response => response.text()).then(data => {
            document.getElementById("city").innerHTML = data;
        });
});