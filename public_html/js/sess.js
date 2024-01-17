window.addEventListener('load', (event) => {
    
    fetch('sess.php').then(response => response.text()).then(data => {
        
        //console.log(data);
        document.getElementById('myMenu').innerHTML = data;

    })


});