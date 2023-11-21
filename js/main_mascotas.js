// ACTIVE BTN UPDATE MASCOTA
var inputConValue=0;
var box__info__input = document.querySelectorAll('.box__text-input');
box__info__input.forEach(element => {
    element.addEventListener('change', ()=>{
        console.log(element);
        document.querySelectorAll('#'+element.id).forEach(inputEmpyChange => {
            if((/\s/.test(inputEmpyChange.value))){
                inputEmpyChange.value="";
            }
            if(!(/\s/.test(inputEmpyChange.value)) && inputEmpyChange.value != ""){
                console.log(inputConValue);
                inputConValue++;
                console.log(inputConValue);
            }
        });
        if(inputConValue > 0){
            document.querySelector("#box__info-"+element.id).style.display="flex";
            inputConValue = 0;
            // console.log(inputConValue);
        }
        else if(inputConValue == 0){
            console.log("#box__info-input_"+element.id);
            console.log(document.querySelector("#box__info-"+element.id));
            document.querySelector("#box__info-"+element.id).style.display="none";
            // document.querySelector("#table__header-input").classList.remove("inputUpdateView");
            // document.querySelector("#btnAgregarSubmit").classList.remove("inputUpdateView");
        }
    })
});

// UPDATE NAME MASCOTA
var btn_name = document.querySelectorAll('.box__icon-btn');
btn_name.forEach(element => {
    element.addEventListener('click', ()=>{
        var img = element.childNodes[1];
        
        console.log(img);
        if(element.childNodes[1].classList.contains('cruz')){
            img.src="img/icon-lapiz-white.png";
            img.classList.remove('cruz');
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
        // console.log(element.childNodes[3]);
        element.childNodes[3].scroll(1,0);
        element.classList.remove('box__pet-focus');
        console.log(element.childNodes[5]);
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
        console.log('getRandomNumber')
        return Math.floor((Math.random() *  (maxNum - 20)) + 20);
    };
    const getRandomColor = () => {
        console.log('getRandomColor')
        const h = getRandomNumber(360);
        const s = getRandomNumber(100);
        const l = getRandomNumber(100);
        return `hsl(${h}deg, ${s}%, 20%)`;
    };
    var setBackgroundColor = (element) => {
        console.log('setBackgroundColor');
        const randomColor = getRandomColor();
        console.log(randomColor);
        console.log(element.id);
        var elementId = element.id;
        document.getElementById(elementId).style.backgroundColor = randomColor;
        //background.style.color = randomColor;
    };
    box__incon.forEach(element => {
        console.log(element.id);
        setBackgroundColor(element);
    });
}