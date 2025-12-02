//create a function for activity images changes
const getImg = document.querySelector(".activity-image");

function imageChange(event){
    //local variable
    const getUrl = event.getAttribute("data");
    getImg.src=getUrl;
}