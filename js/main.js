var btnUpdate = document.querySelectorAll("#btnUpdate");
var btnSubmit = document.querySelectorAll(".btnSubmit");
var inputUpdate = document.querySelectorAll(".inputUpdate");
var btnAgregar = document.querySelector('.btnSubmit_img');

var CancelarDelete = document.querySelectorAll(".btnExit_img");
// var tabIndexDesable = 
// document.querySelectorAll("select,input")
inputUpdate.forEach(element => {
    element.onblur = function (){
        if(document.querySelector("form#"+element.id).classList.contains("expan_row")){
            console.log(element.id);
            document.querySelector("form#"+element.id).classList.remove("expan_row");
            document.querySelector('.table__rows-btn-edit_'+element.id).classList.remove("expan_btn");
            document.querySelector("form#"+element.id).scroll(1,0);
        }else{
            document.querySelector("form#"+element.id).scroll(1,0);
        }
    };
    element.onfocus = function (){
        if(!document.querySelector("form#"+element.id).classList.contains("expan_row")){
            document.querySelector("form#"+element.id).classList.add("expan_row");
            document.querySelector('.table__rows-btn-edit_'+element.id).classList.add("expan_btn");
        }
    };
});
var rowActive = "";
var cont = 0;
var parent ="";
var elementbtn;
var expan_btn ="";

btnUpdate.forEach(element => {
    element.addEventListener("click", () => {
        element.classList.add("expan_btn");
        var x = (element.className.split(" ")[1]);
        document.querySelector("form#"+x).classList.add('expan_row')
        console.log(element);
        if(cont==1){
            if(x != parent.id){
                parent.classList.remove("expan_row");
                elementbtn.classList.remove("expan_btn");
                cont=0;
            }
        }
        if(cont==0){
            Parent(element, x)
        }
    });
});
function Parent(element, x){
    parent = document.querySelector("form#"+x);
    elementbtn = element
    console.log(parent);
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
        // if((/\s/.test(inputEmpyChange.value))){
        //     inputEmpyChange.value="";
        // }
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
function validarVacuna(inputValue){
    if(/^[a-z]/.test(inputValue) || /^[A-Z]/.test(inputValue) || /^[0-9]/.test(inputValue)){console.log('True');return true;}else{ console.log('false'); return false;}
}

var list = document.querySelectorAll("div#btnDelete");
list.forEach(element => {
    element.addEventListener("click", function (ev){
        console.log(document.querySelector(".screenDelete_"+ev.target.id));
        var screen = ".screenDelete_"+(ev.target.id);
        document.querySelector(screen).classList.toggle("expan_delete");
    });
});
CancelarDelete.forEach(element => {
    element.addEventListener("click", ()=>{
        var Class = ".screenDelete_"+element.id;
        console.log(Class);
        document.querySelector(Class).classList.remove("expan_delete");
    })
}); 
var box__container = document.querySelector('.box__container');
// box__container.addEventListener(
//   "click",
//   function (ev) {
//     if (ev.target.className === "box__pet") {
//         var element =ev.target;
//        console.log(element)
//     //   ev.target.classList.toggle("done");
//     }
//   },
//   false,
// );

// Expan Table Header for create 
// inputAgregar.forEach(btnAgregarS => {
//     btnAgregarS.addEventListener("change", ()=>{
//         inputAgregar.forEach(inputEmpyChange => {
//             // if((/\s/.test(inputEmpyChange.value))){
//             //     inputEmpyChange.value="";
//             // }
//             if(!(/\s/.test(inputEmpyChange.value)) && validarVacuna(inputEmpyChange.value)){
//                 console.log(inputConValue);
//                 inputConValue++;
//                 console.log(inputConValue);
//             }
//         });
//         if(inputConValue > 0){
//             document.querySelector("#table__header-input").classList.add("inputUpdateView");
//             document.querySelector("#btnAgregarSubmit").classList.add("inputUpdateView");
//             inputConValue = 0;
//             console.log(inputConValue);
//         }
//         else if(inputConValue == 0){
//             document.querySelector("#table__header-input").classList.remove("inputUpdateView");
//             document.querySelector("#btnAgregarSubmit").classList.remove("inputUpdateView");
//         }
//     });
// });

var inputSearch = document.querySelectorAll('.inputSearch');
console.log(inputSearch);
var itemsNombre = document.querySelectorAll('div#nombre');
var itemsAplicacion = document.querySelectorAll('div#aplicacion');
var itemsTipoMascota = document.querySelectorAll('div#tipomascota');

var itemsCountRaza = document.querySelectorAll('div#countRaza');
var itemsNombreRaza = document.querySelectorAll('div#nombreRaza');
var itemsTamaño = document.querySelectorAll('div#tamaño');
console.log(itemsCountRaza);
console.log(itemsTipoMascota);
console.log(itemsNombreRaza);
console.log(itemsTamaño);
console.log(inputSearch);
var parenElement = document.querySelectorAll('.table__rows-container');
var counInputV = 0;
inputSearch.forEach(element => {
    element.addEventListener('keyup', ()=>{
        invertFilterContent();        
        if(element.id == 'nombre'){elementsN(element.value);}
        if(element.id == 'aplicacion'){elementsA(element.value);}
        if(element.id == 'tipomascota'){elementsT(element.value);}
        if(element.id == 'countRaza'){elementsCR(element.value);}
        if(element.id == 'nombreRaza'){elementsNR(element.value);}
        if(element.id == 'tamaño'){elementsTN(element.value);}
        if(counInputValue() >= 1){
            inputSearch.forEach(element => {
                if(element.value != "" && validarVacuna(element.value)){
                    if(element.id == 'nombre'){elementsN(element.value);}
                    if(element.id == 'aplicacion'){elementsA(element.value);}
                    if(element.id == 'tipomascota'){elementsT(element.value);}
                    if(element.id == 'countRaza'){elementsCR(element.value);}
                    if(element.id == 'nombreRaza'){elementsNR(element.value);}
                    if(element.id == 'tamaño'){elementsTN(element.value);}
                }
            })
            counInputV = 0;
        }


    })
});
function elementsN(value) {itemsNombre.forEach(elementN => {if(!(elementN.firstElementChild.textContent.toLowerCase().includes(value.toLowerCase())) &&  validarVacuna(value)){ var parenHiden = elementN.parentNode.parentNode.parentNode; filtercontent(parenHiden)} });}
function elementsA(value) {itemsAplicacion.forEach(elementN => {if(!(elementN.firstElementChild.textContent.toLowerCase().includes(value.toLowerCase())) &&  validarVacuna(value)){ var parenHiden = elementN.parentNode.parentNode.parentNode; filtercontent(parenHiden)}});}
function elementsT(value) {itemsTipoMascota.forEach(elementN => {if(!(elementN.firstElementChild.textContent.toLowerCase().includes(value.toLowerCase())) &&  validarVacuna(value)){ var parenHiden = elementN.parentNode.parentNode.parentNode; filtercontent(parenHiden)}});}
function elementsCR(value) {itemsCountRaza.forEach(elementN => {if(!(elementN.firstElementChild.textContent.toLowerCase().includes(value.toLowerCase())) &&  validarVacuna(value)){ var parenHiden = elementN.parentNode.parentNode.parentNode; filtercontent(parenHiden)} });}
function elementsNR(value) {itemsNombreRaza.forEach(elementN => {if(!(elementN.firstElementChild.textContent.toLowerCase().includes(value.toLowerCase())) &&  validarVacuna(value)){ var parenHiden = elementN.parentNode.parentNode.parentNode; filtercontent(parenHiden)} });}
function elementsTN(value) {
    itemsTamaño.forEach(elementN => { 
        console.log(elementN.firstElementChild);
        if(!(elementN.firstElementChild.textContent.toLowerCase().includes(value.toLowerCase())) &&  validarVacuna(value))
        { var parenHiden = elementN.parentNode.parentNode.parentNode; filtercontent(parenHiden)}
     });
}

function counInputValue(){
    inputSearch.forEach(element => {
        if(element.value != "" && validarVacuna(element.value)){
            counInputV++;
        }
    })
    return counInputV;
}
function filtercontent(parenHiden){
    parenHiden.style.display="none";
}
function invertFilterContent(){
    parenElement.forEach(element =>{
        if(element.getAttribute("style")){
            element.removeAttribute("style");
        }
    })
}

// Expan Inputs Filter
var filterContent = document.querySelector('#filterContent');
var btnFilter = document.querySelector('#btnFilter_row');
btnFilter.addEventListener('click', ()=>{
    if(document.querySelector('.table__header-head').getAttribute("style")){
        document.querySelector('.table__header-head').removeAttribute("style");
        btnFilter.classList.remove('filterActive');
    }else{
        document.querySelector('.table__header-head').style.height = "8em";
        btnFilter.classList.add('filterActive');
    }
    
})
// btnFilter.addEventListener('click', ()=>{
//     if(filterContent.classList.contains('showfilter')){
//         if(filterContent.classList.contains('showfilter')){
//             filterContent.classList.remove('showfilter');
//         }
//         filterContent.classList.add('hidenfilter');
//     }
//     else{
//         if(filterContent.classList.contains('hidenfilter')){
//             filterContent.classList.remove('hidenfilter');
//         }
//         filterContent.classList.add('showfilter');
//     }
    
// })

// btnAgregar.addEventListener("click", ()=>{
//     var parenbtn = btnAgregar.parentNode;
//     parenbtn.tabIndex=0;
//     parenbtn.focus();
// })
////////////////////// MODAL CONTRROL VACUNA
// var btnAddPet = document.querySelector('.box__icon-btn-add');
// document.querySelector('.box__icon-btn-add').addEventListener('click', ()=>{
//     document.querySelector('.modal__container').style.display="flex";
//     document.querySelector('.screen__gestion').style.filter = "blur(1vh)";
// })
////////////////////// CLOSE MODAL
// var btnModalClose = document.querySelector('.modal__close');
// document.querySelector('.modal__close').addEventListener('click', ()=>{
//     document.querySelector('.modal__container').removeAttribute('style');
//     document.querySelector('.screen__gestion').removeAttribute('style');
// })
//////////////////////ACTIVAR MODAL_BTN_SUBMIT
const modalInput = document.querySelectorAll('.modalInput');
var lenModalInput = modalInput.length;
var contInput = 0;
modalInput.forEach(element => {
    element.addEventListener('change', ()=>{
        if(lenModalInput == contValueInput()){
            console.log(contInput);
            document.querySelector('.modalSubmit').removeAttribute('disabled');
            document.querySelector('.modalSubmit').style.color = "white";
            document.querySelector('.modalSubmit').style.opacity = "1";
            document.querySelector('.modalSubmit').style.transformScale = "1.1";
            contInput = 0;
        }
        else{
            document.querySelector('.modalSubmit').setAttribute('disabled', true);
            document.querySelector('.modalSubmit').style.color = "#4f4f4f";
            document.querySelector('.modalSubmit').style.opacity = ".8";
            document.querySelector('.modalSubmit').style.transformScale = "1";
        }
    })  
});
function contValueInput(){
    modalInput.forEach(element => {
        if(element.value != ''){
            contInput++;
        }
    });
}
////////////////////// JS ASIGNAR VACUNAS //////////////////////
// GESTION-MIS-MASCOTAS RANDOM COLOR
console.log('Aqui esta remdon color');
var box__incon = document.querySelectorAll("div#ramdonColor");
function box__icon__color() {
    const getRandomNumber = (maxNum) => {
        return Math.floor((Math.random() *  (maxNum - 20)) + 20);
    };
    const getRandomColor = () => {
        const h = getRandomNumber(360);
        const s = getRandomNumber(100);
        const l = getRandomNumber(100);
        return `hsl(${h}deg, ${s}%, 20%)`;
    };
    var setBackgroundColor = (element) => {
        const randomColor = getRandomColor();
        var elementId = element.id;
        document.getElementById(elementId).style.backgroundColor = randomColor;
        //background.style.color = randomColor;
    };
    box__incon.forEach(element => {
        console.log(element);
        setBackgroundColor(element);
    });
}
//  ClONAR ELEMENT
var asignarVacuna = document.querySelectorAll('input.asignarVacuna');
var table__content__mascota = document.querySelector('.table__content__mascota');
var table__rows = document.querySelector('.table__rows');
var icon_calendar = document.querySelectorAll('#btn__calendar');
var countVacunas = document.querySelector('span.countVacunas');
var countInput = 0;

console.log(asignarVacuna)
asignarVacuna.forEach(element => {
    element.addEventListener('change', ()=>{
        if(element.checked && countInputCheck(asignarVacuna, element)){
            console.log(document.querySelector('#form_'+element.id));
            var parent =document.querySelector('#form_'+element.id);
            table__content__mascota.appendChild(parent);
        }
        else if (!element.checked && contInput < 1) {
            window.alert("Esta Seguro de retirar la vacuna?")
            var parent =document.querySelector('#form_'+element.id);
            table__rows.appendChild(parent);
        }
        contInput=0;
    })  
});
function countInputCheck(arrayElement, elementV) {
    arrayElement.forEach(element =>{
        if(element.checked){
            contInput++;
        }
    })
    if(contInput > 1){
        elementV.checked = false;
        return false;
    }else{
        return true;
    }
}
///////////////////// REMOVE ATRIBUTE NAME fechaDefault
var fechaInput = document.querySelectorAll('.fechaInput');
var btn_add_vacuna = document.querySelector('#btn_add_vacuna')
btn_add_vacuna.addEventListener('click', ()=>{
    fechaInput.forEach(element => {
        if(element.value != ""){
            document.querySelector('.fechaDefault_'+element.id).removeAttribute('name');
        } else{
            document.querySelector('.fechaInput_'+element.id).removeAttribute('name');
        }

        // 
    });
})
// ACTIVAR INPUT DATA
// var table__calendar__img = document.querySelector('.table__calendar__img');

// array.forEach(element => {
//     element.addEventListener('change', ()=>{
//         if(!element.value == ""){
//             table__calendar__img.style
//         }
//     })
// });


////////////////////// JS ASIGNAR VACUNAS //////////////////////
