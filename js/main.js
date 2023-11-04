var btnUpdate = document.querySelectorAll("#btnUpdate");
var btnSubmit = document.querySelectorAll(".inputSubmit");
var inputUpdate = document.querySelectorAll(".inputUpdate")
var rowActive = "";
var cont = 0;
var parent =""
btnUpdate.forEach(element => {
    element.addEventListener("click", () => {
        element.parentNode.classList.add("expan_row");
        var x = (element.className.split(" ")[1]);
        if(x != parent.id && cont==1){
            console.log("entro");
            parent.classList.remove("expan_row");
            cont=0;
        }
        if(cont==0){
            Parent(element)
        }
    });
});
function Parent(element){
    parent = element.parentNode;
    cont=1;
}
var con = 0;
inputUpdate.forEach(input => {
    input.addEventListener("change", ()=>{
        var inputId = input.id;
        console.log(inputId);
        btnSubmit.forEach(btnElement => {
            if(inputId == btnElement.id && con==0){
                var btnElementRow ='.inputSubmit_'+btnElement.id
                console.log(document.querySelector(btnElementRow));
                document.querySelector(btnElementRow).classList.add("inputUpdateView")
                // document.querySelector(btnElementRow).style;
            }
        });
    });
});
