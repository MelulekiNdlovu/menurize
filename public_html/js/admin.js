//TODO add code to check if a person is logged in, if not,
//redirect to login page

//code for initial dish picker and username on initial load

window.addEventListener("load", (event) => {

    let data = {
        adminInitialContent: 'adminInitialContent'
    };

    let URL = "details.php";
    fetch(URL, {
        method: 'post',
        body: JSON.stringify(data)
    }).then(response => response.text()).then(data => {

        document.getElementById("userName").innerHTML = data;

    });

    let data2 = {
        dishPicker: "dishPicker"
    };

    fetch(URL, {
        method: 'post',
        body: JSON.stringify(data2)
    }).then(response => response.text()).then(data => {

        document.getElementById("dish").innerHTML = data;
        document.getElementById("delDish").innerHTML = data;

    });
});


//function to update restaurant details
function restaurantDetails() {
    let restName = document.getElementById('restName').value;
    let address = document.getElementById('address').value;
    let city = document.getElementById('city').value;
    let curr = document.getElementById('curr').value;
    let updateDetails = document.getElementById('updateDetails').value;
    //let logo = document.getElementById('logo').value;

    //show spinner while waiting for response from backend
    let spinner = "<div class=\"spinner-border text-warning\" role=\"status\"><span class=\"visually-hidden\">Loading...</span></div>";
    document.getElementById("detailsMsg").innerHTML = spinner;

    //remeber to add logo property when logo code is now being implemented
    //TODO...add submit button's name property to data
    let data = {
        restName: restName,
        address: address,
        city: city,
        curr: curr,
        updateDetails: updateDetails
    };

    let URL = "details.php";

    fetch(URL, {
        method: 'post',
        body: JSON.stringify(data)
    }).then(response => response.text()).then(RestData => {

        if (data == "") {
            let alert = "<div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i><div>There was a problem Updating details. Please try again!</div></div>";
            document.getElementById("detailsMsg").innerHTML = alert;
        } else { 
            //TODO...add code to update the name on admin page if the name is changed
            //TODO...add code to update currency on admin page if currency is changed
            let alert = "<div class=\"alert alert-info d-flex align-items-center\" role=\"alert\"><i class=\"bi bi-check-circle\"></i><div>Your details have been updated</div></div>";
            document.getElementById("detailsMsg").innerHTML = alert;
        }

    });
}


//function to add menu items
function menuAdd() {
    let itemName = document.getElementById('itemName').value;
    let itemPrice = document.getElementById('itemPrice').value;
    let descr = document.getElementById('descr').value;
    let addItem = document.getElementById('addItem').value;
    //TODO...let foodpic = document.getElementById('foodpic').value;

    let spinner = "<div class=\"spinner-border text-warning\" role=\"status\"><span class=\"visually-hidden\">Loading...</span></div>";
    document.getElementById("addItemMsg").innerHTML = spinner;

    //TODO...add foodpic to data when its now ready
    let data = {
        itemName: itemName,
        itemPrice: itemPrice,
        descr: descr,
        addItem: addItem
    };

    let URL = "details.php";

    fetch(URL, {
        method: 'post',
        body: JSON.stringify(data)
    }).then(response => response.text()).then(data => {

        if (data == "") {
            let alert = "<div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i><div>There was a problem adding to your menu. Please try again!</div></div>";
            document.getElementById("addItemMsg").innerHTML = alert;
        } else {
            let alert = "<div class=\"alert alert-info d-flex align-items-center\" role=\"alert\"><i class=\"bi bi-check-circle\"></i><div>"+itemName+" Added</div></div>";
            document.getElementById("addItemMsg").innerHTML = alert;
            
            //code for updating editing menu on admin page after an item has been added
            document.getElementById("dish").innerHTML = data;
        }
        

    });
}


//TODO...function to edit menu items
function editItem() {
    let dish = document.getElementById('dish').value;
    let updateName = document.getElementById('updateName').value;
    let updatePrice = document.getElementById('updatePrice').value;
    let updateDescr = document.getElementById('updateDescr').value;
    let editItem = document.getElementById('editItem').value;

    let spinner = "<div class=\"spinner-border text-warning\" role=\"status\"><span class=\"visually-hidden\">Loading...</span></div>";
    document.getElementById("editItemMsg").innerHTML = spinner;

    //TODO...add foodpic to data when its now ready
    let data = {
        dish: dish,
        updateName: updateName,
        updatePrice: updatePrice,
        updateDescr: updateDescr,
        editItem: editItem
    };

    let URL = "details.php";

    fetch(URL, {
        method: 'post',
        body: JSON.stringify(data)
    }).then(response => response.text()).then(data => {

        if (data == "") {
            let alert = "<div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><i class=\"bi bi-check-circle\"></i><div>There was a problem editing "+dish+" . Please try again!</div></div>";
            document.getElementById("editItemMsg").innerHTML = alert;
        } else {
            let alert = "<div class=\"alert alert-info d-flex align-items-center\" role=\"alert\"><i class=\"bi bi-check-circle\"></i><div>"+updateName+" has updated!</div></div>";
            document.getElementById("editItemMsg").innerHTML = alert;
            
            //TODO...add code for updating editing menu on admin page after an item has been edited
            //code to update dish picker
            let data = {
                dishPicker: "dishPicker"
            };

            let URL = "details.php";
            fetch(URL, {
                method: 'post',
                body: JSON.stringify(data)
            }).then(response => response.text()).then(data => {
        
                document.getElementById("dish").innerHTML = data;
                document.getElementById("delDish").innerHTML = data;
        
            });

        }

    });
}


//TODO... function to delete menu items
function menudelete() {
    let delDish = document.getElementById('delDish').value;

    let spinner = "<div class=\"spinner-border text-warning\" role=\"status\"><span class=\"visually-hidden\">Loading...</span></div>";
    document.getElementById("delMsg").innerHTML = spinner;

    //TODO...add foodpic to data when its now ready
    let data = {
        delDish: delDish
    };

    let URL = "details.php";

    fetch(URL, {
        method: 'post',
        body: JSON.stringify(data)
    }).then(response => response.text()).then(data => {

        
        document.getElementById("delMsg").innerHTML = data;
            
        //code to update dish picker
        let data2 = {
            dishPicker: "dishPicker"
        };

        let URL = "details.php";
        fetch(URL, {
            method: 'post',
            body: JSON.stringify(data2)
        }).then(response => response.text()).then(data => {
        
            document.getElementById("dish").innerHTML = data;
            document.getElementById("delDish").innerHTML = data;
        
        });

    });
}