console.log("main js loaded");

let form = document.querySelector(".comment-form");
let comment = document.querySelector(".comment-form textarea");
let hiddenInput = document.querySelector(".comment-form input");
let commentDiv = document.querySelector("div.comments");
form.addEventListener("submit", function (e) {
  e.preventDefault();
  commentAjax(comment.value, hiddenInput.value);
})

function commentAjax(comment, postID) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "func/commentmanager.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (this.status == 200) {
      let output = this.responseText;
      outputNewComment(JSON.parse(output));
    }
  };
  xhr.send("comment=" + comment + "&" + postID);
}

function outputNewComment(output) {
  let newDiv = document.createElement("div");
  newDiv.classList = "col-md-8 mt-3";
  commentDiv.prepend(newDiv);
  let theOutput =
  `<div class="card">
    <div class="card-header">${output.user_name} | ${output.date_created}</div>
    <div class="card-body">
      <p class="card-text">${output.comment_text}</p>
    </div>
  </div>`;
  newDiv.innerHTML = theOutput;
  document.documentElement.scrollTop = 0;
  comment.value = '';
}
