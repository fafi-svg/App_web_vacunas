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
                    console.log(element.getAttribute("style"));
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