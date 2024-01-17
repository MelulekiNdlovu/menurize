
window.addEventListener('load', (event) => {
    var out = "";
    
    fetch('featured.php').then(response => response.json()).then(data => {
        
        const len = Object.keys(data).length;
        for(i = 0; i < len; i++) {
            
            //out += "<div class=\"bg-light mb-2\"><a href=\"demo.php?name="+data[i].name+"\" class=\"text-decoration-none\"><h3>"+data[i].name+"</h3><p>ADDRESS</p></a></div>";
            out += "<div class=\"col-md-4 shadow-sm m-1 rounded card\"><div><i class=\""+data[i].featured+"\"></i></div><div><a href=\"demo.php?name="+data[i].name+"\">"+data[i].name+"</a></div><p class=\"form-text\"><em>"+data[i].address+"</em><br>"+data[i].city+"</p></div>";
        }
        //console.log(data);
        document.getElementById('nameList').innerHTML = out;

    })


});

