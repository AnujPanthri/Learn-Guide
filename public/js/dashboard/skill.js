function showTask(task_id){
    fetch(`${taskdetail_url}/${task_id}`,{
        method:"GET",
    }).then(res=>res.json()).then((res)=>{
        // console.log(res);
        title_elem = task_modal.querySelector(".title");
        count_elem = task_modal.querySelector(".count");
        task_id_elem = task_modal.querySelector('#task_id');

        title_elem.innerText = res['title'];
        count_elem.innerText = res['practice_count'];

        // task_id_elem.value = "bye";
        task_id_elem.value = res['id'];
        // console.log(res['id']);

        task_modal.showModal();

    })

}
function closeTask(){
    task_modal.close();
}


function addError(msg){
    // <div class="error">
    //     <i class="fa-solid fa-xmark"></i>
    //     <span>error see</span>
    // </div>

    var error_elem = document.createElement('div');
    error_elem.className = 'error';
    error_elem.innerHTML += `<i class="fa-solid fa-xmark"></i>`;
    error_elem.innerHTML += `<span>${msg}</span>`;

    error_container.append(error_elem);

    setTimeout(function(){
        error_elem.remove();    // remove after 7 seconds
    },1000*7);
}


