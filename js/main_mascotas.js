// ACTIVE BTN UPDATE MASCOTA
var inputConValue=0;
var box__info__input = document.querySelectorAll('.box__text-input');
box__info__input.forEach(element => {
    element.addEventListener('change', ()=>{
        
        document.querySelectorAll('#'+element.id).forEach(inputEmpyChange => {
            // if((/\s/.test(inputEmpyChange.value))){
            //     inputEmpyChange.value="";
            // }
            if((/\s/.test(inputEmpyChange.value)) || inputEmpyChange.value != ""){
                if(validarNamePet(inputEmpyChange.value)){
                    inputConValue++;
                    console.log("validarNamePet-TRUE");
                    element.style.backgroundColor="rgb(209 253 209)";
                    element.style.border=".1em solid";
                    element.style.borderColor="green";
                    // element.style.outline = ".5em solid green";
                }
                else if(!validarNamePet(inputEmpyChange.value)){
                    console.log("validarNamePet-false");
                    element.style.backgroundColor="rgb(227 169 169)";
                    element.style.border=".1em solid";
                    element.style.borderColor="red";
                }
            }

        });
        console.log(document.querySelectorAll('#'+element.id));
        console.log(inputConValue);
        if(inputConValue > 0){
            document.querySelector("#box__info-"+element.id).style.display="flex";
            inputConValue = 0;
        }
        else if(inputConValue == 0){
            document.querySelector("#box__info-"+element.id).style.display="none";
        }
    })
});
function validarNamePet(inputValue){
    if(/^[a-z]/.test(inputValue) || /^[A-Z]/.test(inputValue) || /^[0-9]/.test(inputValue)){console.log('True');return true;}else{ console.log('false'); return false;
}

}
// UPDATE NAME MASCOTA
var btn_name = document.querySelectorAll('.box__icon-btn');
btn_name.forEach(element => {
    element.addEventListener('click', ()=>{
        var img = element.childNodes[1];
        console.log(img);
        if(element.childNodes[1].classList.contains('cruz')){
            img.src="img/icon-lapiz-white.png";
            img.classList.remove('cruz');
            document.querySelectorAll('#input_'+element.id).forEach(input =>{
                input.removeAttribute("style");
                input.value="";
            })
            document.querySelector('form#'+element.parentNode.parentNode.id).classList.add('UpdatePetInfo_Out');
            document.querySelector('form#'+element.parentNode.parentNode.id).classList.remove('UpdatePetInfo');
            
        }else{
            img.src="img/icon-cruz.png";
            img.classList.add('cruz');
            document.querySelector('form#'+element.parentNode.parentNode.id).classList.remove('UpdatePetInfo_Out');
            document.querySelector('form#'+element.parentNode.parentNode.id).classList.add('UpdatePetInfo');
        }
        
    })
});
// GESTION-MIS-MASCOTAS
document.querySelectorAll(".box__pet-container").forEach(element => {
    element.onblur = function (){
        element.childNodes[3].scroll(1,0);
        element.classList.remove('box__pet-focus');
        element.childNodes[5].firstChild.classList.remove("btn__expan-btn-rotate");
    };
});
var btn__pet = document.querySelectorAll('.btn__expan');
    btn__pet.forEach(element => {
        element.addEventListener('click', ()=>{
            element.parentNode.classList.add("box__pet-focus");
            console.log(element.firstChild);
            element.firstChild.classList.add("btn__expan-btn-rotate");
        })
    });
function focusElement(element) {
    element.parentNode.click();
}

// GESTION-MIS-MASCOTAS RANDOM COLOR
const box__incon = document.querySelectorAll(".box__icon-pet");
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
        setBackgroundColor(element);
    });
}

// MODAL CONTRROL VACUNA
// var btnAddPet = document.querySelector('.box__icon-btn-add');
document.querySelector('.box__icon-btn-add').addEventListener('click', ()=>{
    document.querySelector('.modal__container').style.display="flex";
    document.querySelector('.screen__gestion__mascota').style.filter = "blur(1vh)";
})
// CLOSE MODAL
// var btnModalClose = document.querySelector('.modal__close');
document.querySelector('.modal__close').addEventListener('click', ()=>{
    document.querySelector('.modal__container').removeAttribute('style');
    document.querySelector('.screen__gestion__mascota').removeAttribute('style');
})
// ACTIVAR MODAL INPUT
const modalInput = document.querySelectorAll('.modalInput');
console.log(modalInput);
var lenModalInput = modalInput.length;
console.log(lenModalInput);
var contInput = 0;
modalInput.forEach(element => {
    element.addEventListener('change', ()=>{
        if(lenModalInput === contValueInput()){
            document.querySelector('.modalSubmit').removeAttribute('disabled');
            document.querySelector('.modalSubmit').style.color = "white";
            document.querySelector('.modalSubmit').style.opacity = "1";
            document.querySelector('.modalSubmit').style.transformScale = "1.1";
        }
        else{
            document.querySelector('.modalSubmit').setAttribute('disabled', true);
            document.querySelector('.modalSubmit').style.color = "#4f4f4f";
            document.querySelector('.modalSubmit').style.opacity = ".8";
            document.querySelector('.modalSubmit').style.transformScale = "1";
        }
        contInput = 0;
    })  
});
function contValueInput(){
    modalInput.forEach(element => {
        if(element.value != ''){
            contInput++;
        }
    });
    return contInput;
}
// SELECT TYPE PETS
var optionRaza = document.querySelectorAll('option#optionRaza');
var selectPets = document.querySelector('select#tipoMascota');
selectPets.addEventListener('change', ()=>{
    if(selectPets.value != ""){
        document.querySelector('select#raza').disabled = false;
        document.querySelector('select#raza').value = '';
        filterRaza(selectPets.value);
    }
    else{
        document.querySelector('select#raza').disabled = true;
    }
})
function filterRaza(raza){
    invertFilter()
    optionRaza.forEach(element =>{
        if(!(element.textContent == raza)){
            element.style.display="none";
        }
    })
}
function invertFilter(){
    optionRaza.forEach(element =>{
        if(element.getAttribute("style")){
            element.removeAttribute("style");
        }
    })
}