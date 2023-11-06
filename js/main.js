var btnUpdate = document.querySelectorAll("#btnUpdate");
var btnSubmit = document.querySelectorAll(".btnSubmit");
var inputUpdate = document.querySelectorAll(".inputUpdate")
var rowActive = "";
var cont = 0;
var parent ="";
var expan_btn ="";
btnUpdate.forEach(element => {
    element.addEventListener("click", () => {
        element.parentNode.parentNode.classList.add("expan_row");
        element.classList.add("expan_btn");
        // element.add("expan_btn");
        var x = (element.className.split(" ")[1]);
        if(x != parent.id && cont==1){
            parent.classList.remove("expan_row");
            expan_btn.classList.remove("expan_btn");
            cont=0;
        }
        if(cont==0){
            Parent(element)
        }
    });
});
function Parent(element){
    parent = element.parentNode.parentNode;
    expan_btn = element;
    cont=1;
}
var con = 0;
var inputConValue=0;
var inputCount=0;
var  noValido = '/\s/';
inputUpdate.forEach(input => {
    input.addEventListener("change", ()=>{
        var inputId = input.id;
        btnSubmit.forEach(btnElement => {
            if(inputId == btnElement.id && con==0){
                var btnElementRow ='.inputSubmit_'+btnElement.id
                var labelElementRow ='.labelSubmit_'+btnElement.id
                // console.log(document.querySelector(btnElementRow));
                var inputValueRow = ".inputUpdate_"+inputId;
                var inputEmpy = document.querySelectorAll(inputValueRow);
                console.log(inputId);
                activeBtnSubmit(inputEmpy, btnElementRow, inputId, labelElementRow);
                // document.querySelector(btnElementRow).style;
            }
        });
    });
});

function activeBtnSubmit(arrayInput, btnElementRow, inputId, labelElementRow){
    inputCount = arrayInput.length;
    arrayInput.forEach(inputEmpyChange => {
        if(!(/\s/.test(inputEmpyChange.value)) && inputEmpyChange.value != ""){
            console.log(inputConValue);
            inputConValue++;
            console.log(inputConValue);
        }
        if((/\s/.test(inputEmpyChange.value))){
            inputEmpyChange.value="";
        }
    }); 
    console.log(inputId);
    var inputIdCantainer = ".table__rows-btn_"+inputId; 
    if(inputConValue > 0){
        document.querySelector(btnElementRow).classList.add("inputUpdateView");
        document.querySelector(labelElementRow).classList.add("inputUpdateView");
        document.querySelector(inputIdCantainer).classList.add("table__rows-btn_color");
        inputConValue = 0;
    }
    else if(inputConValue == 0){
        document.querySelector(inputIdCantainer).classList.remove("table__rows-btn_color");
        document.querySelector(btnElementRow).classList.remove("inputUpdateView");
        document.querySelector(labelElementRow).classList.remove("inputUpdateView");
    }
}

var list = document.querySelectorAll("div#btnDelete");
list.forEach(element => {
    element.addEventListener("click", function (ev){
        console.log(ev.target.parentNode.parentNode.parentNode);
        var parentRow = ev.target.parentNode.parentNode.parentNode.id; //classList.toggle("expan_delete")
        var childId =  ".screenDelete_"+parentRow;
        console.log(childId);
        document.querySelector(childId).classList.toggle("expan_delete");
    });
}); 

// var list = document.querySelector("ul.x");
// list.addEventListener(
//   "click",
//   function (ev) {
//     if (ev.target.tagName === "P") {
//       ev.target.classList.toggle("done");
//     }
//   },
//   false,
// );

