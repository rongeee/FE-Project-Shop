// Production steps of ECMA-262, Edition 6, 22.1.2.1
if (!Array.from) {
  Array.from = (function () {
    var toStr = Object.prototype.toString;
    var isCallable = function (fn) {
      return typeof fn === "function" || toStr.call(fn) === "[object Function]";
    };
    var toInteger = function (value) {
      var number = Number(value);
      if (isNaN(number)) {
        return 0;
      }
      if (number === 0 || !isFinite(number)) {
        return number;
      }
      return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number));
    };
    var maxSafeInteger = Math.pow(2, 53) - 1;
    var toLength = function (value) {
      var len = toInteger(value);
      return Math.min(Math.max(len, 0), maxSafeInteger);
    };

    // The length property of the from method is 1.
    return function from(arrayLike /*, mapFn, thisArg */ ) {
      // 1. Let C be the this value.
      var C = this;

      // 2. Let items be ToObject(arrayLike).
      var items = Object(arrayLike);

      // 3. ReturnIfAbrupt(items).
      if (arrayLike == null) {
        throw new TypeError(
          "Array.from requires an array-like object - not null or undefined"
        );
      }

      // 4. If mapfn is undefined, then let mapping be false.
      var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
      var T;
      if (typeof mapFn !== "undefined") {
        // 5. else
        // 5. a If IsCallable(mapfn) is false, throw a TypeError exception.
        if (!isCallable(mapFn)) {
          throw new TypeError(
            "Array.from: when provided, the second argument must be a function"
          );
        }

        // 5. b. If thisArg was supplied, let T be thisArg; else let T be undefined.
        if (arguments.length > 2) {
          T = arguments[2];
        }
      }

      // 10. Let lenValue be Get(items, "length").
      // 11. Let len be ToLength(lenValue).
      var len = toLength(items.length);

      // 13. If IsConstructor(C) is true, then
      // 13. a. Let A be the result of calling the [[Construct]] internal method
      // of C with an argument list containing the single item len.
      // 14. a. Else, Let A be ArrayCreate(len).
      var A = isCallable(C) ? Object(new C(len)) : new Array(len);

      // 16. Let k be 0.
      var k = 0;
      // 17. Repeat, while k < len… (also steps a - h)
      var kValue;
      while (k < len) {
        kValue = items[k];
        if (mapFn) {
          A[k] =
            typeof T === "undefined" ?
            mapFn(kValue, k) :
            mapFn.call(T, kValue, k);
        } else {
          A[k] = kValue;
        }
        k += 1;
      }
      // 18. Let putStatus be Put(A, "length", len, true).
      A.length = len;
      // 20. Return A.
      return A;
    };
  })();
}

//Deletes element in DOM and database
function deleteView(id) {
  const element = document.querySelector("#product_" + id);
  event.preventDefault();
  let req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      setTimeout(function () {
        element.remove();
      }, 250);
    }
  };
  if (confirm("Säker på att du vill ta bort?")) {
    req.open("POST", "../product/productDelete.php?ID=" + id, true);
    req.send();
  }
}

function getPictures(id) {
  //const element = document.querySelector("#product_" + id);
  event.preventDefault();
  let req = new XMLHttpRequest();
  const gallery = document.querySelector(".product-form-main__left__gallery");
  const galleryPreview = document.querySelector(".product-form-main__left-img img");
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let deserial_data = JSON.parse(this.responseText);
      gallery.innerHTML = "";
      deserial_data.forEach(function(image) {
         gallery.innerHTML += "<div class='product-form-main__left__gallery-img'><img src='../images/" + image["image"] + "' alt=''></div>";      
         galleryPreview.setAttribute("src", "../images/" + image["image"]);
        });
    }
  };
    req.open("GET", "../includes/getImages.php?ID=" + id, true);
    req.send();
  }

//Sets form mode (update,create)
function prepareForm(inEdit, id = "") {
  if (inEdit) {
    productForm.setAttribute("action", "productUpdate.php");
    productForm.querySelector("button").setAttribute("name", "updateProduct");
    productForm.querySelector("h2").textContent = "Update product";
    document.querySelector("#upID").setAttribute("value", id);
    productForm.style.display = "flex";
    toggle.style.display = "block";
  } else {
    productForm.setAttribute("action", "productCreate.php");
    productForm.querySelector("button").setAttribute("name", "addProduct");
    productForm.querySelector("h2").textContent = "Create product";
    productForm.parentElement.style.display = "flex";
    productForm.reset();
    if (id) {
      document.querySelector("main").appendChild(productForm);
      productForm.style.display = "none";
      Array.from(document.querySelectorAll(".product")).forEach(function (p) {
          p.style.opacity = 1;
      });
      document.querySelector("#product_" + id).classList.add("product-state--inactive");
    }
  }
}

//Inserts finalized form into selected productelement
const toggle = document.querySelector("#form-toggle");
const productForm = document.querySelector(".product-form-main");

function initEdit(id) {
  const product = document.querySelector("#product_" + id);
  const children = product.children[1].children;
  //Goes throuh DOM products, (validation needed here?)
  Array.from(productForm.elements).forEach(function (input) {
    Array.from(children).forEach(function (row) {
      if (input.name === row.className) {
        if (input.name === "featured") {
          input.options.selectedIndex = parseInt(row.textContent);
        } else {
          input.value = row.textContent;
        }
      }
    });
    //Sets preview image
    if (input.name === "image") {
      document.querySelector(".product-form-main__left-img img").
      setAttribute("src", product.firstElementChild.children[0].firstElementChild.getAttribute("src"));
    }
  });
  //Hides all products and reset width except current one
  const allProducts = document.querySelectorAll(".product");
  allProducts.forEach(function (p) {
    let isCurrent = p.id == "product_" + id;
    if (!isCurrent) {
      p.classList.add("product-state--inactive");
      p.classList.remove("product-state--active");
    } else {
      p.classList.remove("product-state--inactive");
      p.classList.add("product-state--active");
    }
  });
  //Overlay elements
  product.style.zIndex = "998";
  //Sets correct form src > backend
  prepareForm(true, id);
  //Inserts form to current product element
  getPictures(id)
  product.prepend(productForm);
}
let resetPos = false;
//Resets form back to create mode and closes form
toggle.addEventListener("click", function (e) {
  const id = e.target.previousElementSibling.previousElementSibling.value;
  prepareForm(false, id);

});

//Opens create form
const add = document.querySelector(".section-add-imgwrap");
add.addEventListener("click", function (e) {
    prepareForm(false);
});
