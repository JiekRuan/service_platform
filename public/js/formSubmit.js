const form = document.querySelector("#formwithfileinput");

form.addEventListener("change", function(e){
    if(e.files[0].size > 4194304) {
        alert("File is too big try something smaller than 4MB.");
        e.value ="";
    }
})