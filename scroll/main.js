let block = false;
let page = 0;
window.onload =  async function(){
        //cargar los items iniciales
        loadItems();

}

window.addEventListener("scroll", async function(e){
        const scrollHeight = this.scrollY,
        viewportHeight = document.documentElement.clientHeight,
        morescroll = document.getElementById("more-tuits").offsetTop,
        currentscroll = scrollHeight + viewportHeight;
     //   console.log(currentscroll);
      //  console.log(morescroll);

      if((currentscroll >= morescroll) && block === false ){ //cargar mas contenido
        block = true;

        this.setTimeout(()=> {
            loadItems();
            block = false;
        }, 1000);

      }
});

async function loadItems(){
        const data = await requestData(page);
        const response = data[0];

        if(response.response === "200"){
            const item = data[1];
            page = data[2].page;

            renderItems(item)
        }else if(response.response === "400"){
            console.error("no hay mas twits");
        }
}

function requestData(n){
    const url = "http://localhost/curso/scroll/api.php?action=more&page="+n;
    const response = this.fetch(url)
    .then(res => res.json())
    .then(data => data)

    return response;
}

function renderItems(data){
let tuits = document.querySelector("#tuits");
data.forEach(element => {
        tuits.innerHTML += `
    <div class="tuit">
        <div class="profile">
            <img src="img/${element.username_photo}" alt="">
        </div>
        <div class="content">
            <div class="author">
                <span class="name">${element.name}</span>
                <span class="username">@${element.username}</span>
            </div>
            <div class="text">
            ${element.text}
            </div>
            <div class="image">
                <img src="img/${element.image}"  alt="">
            </div>
        </div>
    </div>
        `
});
}