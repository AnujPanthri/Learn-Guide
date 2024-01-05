function showCreateTask(task_type) {
    var task_type_elem = createtask_modal.querySelector("#task_type");
    task_type_elem.value = task_type;
    createtask_modal.showModal();
}
function closeCreateTask() {
    createtask_modal.close();
}
function showTask(task_id) {
    fetch(`${taskdetail_url}/${task_id}`, {
        method: "GET",
    }).then(res => res.json()).then((res) => {
        // console.log(res);
        title_elem = task_modal.querySelector(".title");
        task_id_elem = task_modal.querySelector('#task_id');
        // count_elem = task_modal.querySelector(".count");

        title_elem.innerText = res['title'];
        // count_elem.innerText = res['practice_count'];
        var total_count = res['practice_count']; // goal count
        if(total_count==0)  total_count=4;  // learn + 3 practice
        else    total_count = Math.floor((total_count-1)/3)*3+4;    // formula to give 3 new practice everytime we reach the goal
        createMilestones(document.querySelector('#task_modal .progress_bar'),res['practice_count'],total_count);



        task_id_elem.value = res['id'];


        task_modal.showModal();


        // scroll to the end
        var progressbar_container = document.querySelector("#task_modal .progress_bar_container");
        var scrollWidth = progressbar_container.scrollWidth;
        scrollWidth/=total_count;
        scrollWidth*=res['practice_count']-1;   // -1 to scroll it a little less than the last completed one
        // scrollWidth=0;
        // scrollWidth
        console.log(scrollWidth);
        progressbar_container.scrollTo(scrollWidth, 0);   // x,y


    })

}
function closeTask() {
    task_modal.close();
}


function addError(msg) {
    // <div class="error">
    //     <i class="fa-solid fa-xmark"></i>
    //     <span>error see</span>
    // </div>

    var error_elem = document.createElement('div');
    error_elem.className = 'error';
    error_elem.innerHTML += `<i class="fa-solid fa-xmark"></i>`;
    error_elem.innerHTML += `<span>${msg}</span>`;

    error_container.append(error_elem);

    setTimeout(function () {
        error_elem.remove();    // remove after 7 seconds
    }, 1000 * 7);
}



function createMilestones(progress_bar,practice_count,total_count) {

    // <div class="milestone">
    //     <div class="circle learn"></div>
    //     <span class='text'>Learn</span>
    // </div>
    // <div class="line"></div>
    // <div class="milestone">
    //     <div class="circle practice"></div>
    //     <span class='text'>Practice 1</span>
    // </div>
    // total_count+=1;
    progress_bar.innerHTML = " ";

    for (var i = 1; i <= total_count; i++) {


        var milestone = document.createElement("div");
        milestone.className = "milestone";

        circle = document.createElement('div');
        circle.className = "circle";

        var text = document.createElement("span");
        text.className = "text";

        if(i<= practice_count){
            if(i == 1)  circle.classList.add("learn");
            else    circle.classList.add("practice");
        }

        if(i == 1)  text.innerText = "learn";
        else    text.innerText = `practice ${i-1}`;



        milestone.appendChild(circle);
        milestone.appendChild(text);

        var line = document.createElement('div');
        line.className = "line";

        progress_bar.appendChild(milestone);
        if(i<total_count)   progress_bar.appendChild(line);
    }


}

// createMilestones(document.querySelector('#task_modal .progress_bar'), ['learn', null, null])
createMilestones(document.querySelector('#task_modal .progress_bar'),2,4);
// createMilestones(document.querySelector('#task_modal .progress_bar'),4,15);
