let form = document.querySelector(".comment-form");
let comment = document.querySelector(".comment-form textarea");
let hiddenInput = document.querySelector(".comment-form input");
let commentDiv = document.querySelector("div.comments");
let addToCartBtn = document.querySelector(".add-cart");
let totalPrice = document.querySelector(".total-price");
let decreaseBtns;
let increaseBtns;
let removeBtns;
let removeAllBtn = document.querySelector(".remove-all-btn");


$(document).ready(() => {
  if (addToCartBtn != null) {
    addToCartBtn.addEventListener("click", function (e){
        e.preventDefault();
        addProductToCart(addToCartBtn.id);
      });
  }

  if (form != null) {
    form.addEventListener("submit", function (e){
      e.preventDefault();
      commentAjax(comment.value, hiddenInput.value);
    });
  }

  removeBtns = document.querySelectorAll(".remove-btn");
    removeBtns.forEach(removeBtn => {
      removeBtn.addEventListener("click", (e) => {
        e.preventDefault();
        removeProduct(removeBtn);
      });
    });

    increaseBtns = document.querySelectorAll(".quantity-btn-plus");
    increaseBtns.forEach(increaseBtn => {
      increaseBtn.addEventListener("click", (e) => {
        e.preventDefault();
        increaseQuantity(increaseBtn);
      });
    });

    decreaseBtns = document.querySelectorAll(".quantity-btn-minus");
    decreaseBtns.forEach(decreaseBtn => {
      decreaseBtn.addEventListener("click", (e) => {
        e.preventDefault();
        decreaseQuantity(decreaseBtn);
      });
    });

    if (removeAllBtn != null)
      removeAllBtn.addEventListener("click", removeAll)
  }
);

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

  function addProductToCart(productID) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func/ajaxCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      if (this.status == 200) {
        console.log("number of all item in cart = " + this.responseText);
      }
    }
    xhr.send("id=" + productID + "&add");
  }

  function decreaseQuantity(decreaseBtn) {
    let productID = decreaseBtn.getAttribute("data-id");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func/ajaxCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
          if(this.responseText != "error") {
            data = this.responseText.split(" ");
            updateTotalPrice(data[0]);
            let inp = decreaseBtn.nextElementSibling ;
            inp.value = data[2];
          }
        }
    }
    xhr.send("id=" + productID + "&decrease");
  }

  function increaseQuantity(increaseBtn) {
    let productID = increaseBtn.getAttribute("data-id");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func/ajaxCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
          if(this.responseText != "error") {
            data = this.responseText.split(" ");
            updateTotalPrice(data[0]);
            let inp = increaseBtn.previousElementSibling;
            inp.value = data[2];
          }
        }
    }
    xhr.send("id=" + productID + "&increase");
  }

  function removeProduct(removeBtn) {
    let productID = removeBtn.getAttribute("data-id");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func/ajaxCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
          if(this.responseText != "error") {
            data = this.responseText.split(" ");
            removeProductUI(removeBtn);
            updateTotalPrice(data[0]);
            isEmptyCart(data[1]);
          }
        }
    }
    xhr.send("id=" + productID + "&remove");
  }

  function removeAll() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func/ajaxCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200)
          window.location.reload();
    }
    xhr.send("remove_all");
  }

  function removeProductUI(removeBtn) {
    fadeOutRemoveItem(removeBtn.parentElement.parentElement);
  }

  function fadeOutRemoveItem(el) {
    el.style = "opacity: 0;";
    setTimeout(function () {
      el.remove();
    }, 300);
  }

  function updateTotalPrice(newTotalPrice) {
    totalPrice.innerText = newTotalPrice;
  }

  function isEmptyCart(noItem) {
    if(noItem == 0) {
      let cartDiv = document.querySelector('.cart-container')
      cartDiv.innerHTML = `
      <div class="cart-empty">
      <div class="empty-img-wrapper text-center">
        <img src="images/m.watches.jpg" alt="">
      </div>
      <div class="btn-continue-wrapper text-center">
        <a href="index.php"><button type="button" class="btn" style="font-size: 0.9rem;">Continue shopping</button></a>
      </div>
    </div>`;
    }
  }
