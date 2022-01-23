// function menu_burger() {
//     var x = document.getElementById("menu");
//     if (x.style.display === "block") {
//         x.style.display = "none";
//     } else {
//         x.style.display = "block";
//     }
// }
// * Menu bar * //
var menuBar = document.getElementById("menu");

// Get the button that opens the modal
var btnBurger = document.getElementById("burgerBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btnBurger.onclick = function () {
    menuBar.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    menuBar.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == menuBar) {
        menuBar.style.display = "none";
    }
}
// * End Menu bar * //


function set2last() {

    document.getElementById("lotnum1").disabled = true;
    document.getElementById("lotnum2").disabled = true;
    document.getElementById("lotnum3").disabled = true;
    document.getElementById("lotnum4").disabled = true;
    document.getElementById("lotnum5").disabled = false;
    document.getElementById("lotnum6").disabled = false;

}

function set3last() {
    var btnSet2 = [
        document.getElementById("lotnum1").disabled = true,
        document.getElementById("lotnum2").disabled = true,
        document.getElementById("lotnum3").disabled = true,
        document.getElementById("lotnum4").disabled = false,
        document.getElementById("lotnum5").disabled = false,
        document.getElementById("lotnum6").disabled = false,

    ]
}

function set3first() {
    var btnSet3 = [
        document.getElementById("lotnum1").disabled = false,
        document.getElementById("lotnum2").disabled = false,
        document.getElementById("lotnum3").disabled = false,
        document.getElementById("lotnum4").disabled = true,
        document.getElementById("lotnum5").disabled = true,
        document.getElementById("lotnum6").disabled = true,

    ]
}

function clearSearch() {

    document.getElementById('lotnum1').value = '';
    document.getElementById('lotnum2').value = '';
    document.getElementById('lotnum3').value = '';
    document.getElementById('lotnum4').value = '';
    document.getElementById('lotnum5').value = '';
    document.getElementById('lotnum6').value = '';
    document.getElementById("lotnum1").disabled = false;
    document.getElementById("lotnum2").disabled = false;
    document.getElementById("lotnum3").disabled = false;
    document.getElementById("lotnum4").disabled = false;
    document.getElementById("lotnum5").disabled = false;
    document.getElementById("lotnum6").disabled = false;
}

function moveOnMax(field, nextFieldID) {
    if (field.value.length >= field.maxLength) {
        document.getElementById(nextFieldID).focus();
    }
}

function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}


function moveOnMax2(field, nextFieldID) {
    if (field.value.length >= field.maxLength) {
        document.getElementById(nextFieldID).focus();
    }
}

function onlyNumberKey2(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

// function delItemCart(){
//     var delItem = document.getElementById("orderItem");
//     var ms = document.getElementById("nonOrder");
//     delItem.style.display = "none";
//     ms.style.display = "block";

// }
function btnPay() {
    var pay = document.getElementById("showPrompay");
    var afterbtnpay = document.getElementById("btnAfterPay");
    var firstBtnPay = document.getElementById("btnPayOrder");
    var bgBtn = document.getElementById("box-btn-pay");
    firstBtnPay.style.display = "none";
    pay.style.display = "block";
    afterbtnpay.style.display = "block";
    bgBtn.style.background = "#e0b600";
}


function btnPromptPay() {
    var pay = document.getElementById("showPrompay");
    if (pay.style.display = "none") {
        pay.style.display = "block";
    }

}
function payOnDelivery() {
    var pay = document.getElementById("showPrompay");

    if (pay.style.display = "block") {
        pay.style.display = "none";
    }
}

$(window).load(function () {
    // Animate loader off screen
    $(".lds-ring").fadeOut("fast");
    // $(".se-pre-con").fadeOut("fast");
});


// /** Filter **/
// filterSelection("all")
// function filterSelection(c) {
//     var x, i;
//     x = document.getElementsByClassName("Card-Lottery");
//     if (c == "all") c = "";
//     // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
//     for (i = 0; i < x.length; i++) {
//         w3RemoveClass(x[i], "show");
//         if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
//     }
// }

// // Show filtered elements
// function w3AddClass(element, name) {
//     var i, arr1, arr2;
//     arr1 = element.className.split(" ");
//     arr2 = name.split(" ");
//     for (i = 0; i < arr2.length; i++) {
//         if (arr1.indexOf(arr2[i]) == -1) {
//             element.className += " " + arr2[i];
//         }
//     }
// }

// // Hide elements that are not selected
// function w3RemoveClass(element, name) {
//     var i, arr1, arr2;
//     arr1 = element.className.split(" ");
//     arr2 = name.split(" ");
//     for (i = 0; i < arr2.length; i++) {
//         while (arr1.indexOf(arr2[i]) > -1) {
//             arr1.splice(arr1.indexOf(arr2[i]), 1);
//         }
//     }
//     element.className = arr1.join(" ");
// }

// // Add active class to the current control button (highlight it)
// var btnContainer = document.getElementById("btnFilter");
// var btns = btnContainer.getElementsByClassName("selectType");
// for (var i = 0; i < btns.length; i++) {
//     btns[i].addEventListener("click", function () {
//         var current = document.getElementsByClassName("active");
//         current[0].className = current[0].className.replace(" active", "");
//         this.className += " active";
//     });
// }



// statusFunction();
// function statusFunction() {
//     var letter = document.getElementById("statusOrderValue").value;
//     var text;
//     document.getElementById("status").innerHTML = text;
//     // If the letter is "c"
//     if (letter === "pending") {
//         text = "รอดำเนินการ";

//         // If the letter is "b" or "d"
//     } else if (letter === "processing") {
//         text = "กำลังดำเนินการ";

//         // If the letter is anything else
//     } else if (letter === "completed") {
//         text = "ตรวจสอบสำเร็จ";

//         // If the letter is anything else
//     } else if (letter === "decline") {
//         text = "ไม่ผ่านการตรวจสอบ";

//         // If the letter is anything else
//     } else {
//         text = "none";
//     }
    
// }