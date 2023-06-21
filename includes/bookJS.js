function getBookId(){
    var aKeyValue = window.location.search.substring(1).split("&");
    var bookId = aKeyValue[0].split("=")[1];
    return bookId;
}

function showCategory(data) {
    var selectedBookId = getBookId();
    var bookCategory = "";
  
    for (var i = 0; i < data.category.length; i++) {
      var bookObj = data.category[i];
  
      if (bookObj.id == selectedBookId) {
        bookCategory = bookObj.category;
        break;
      }
    }
    document.querySelector("#bookCategory").innerHTML = bookCategory;
  }


fetch("data/books.json")
    .then(response => response.json())
    .then(data => showCategory(data));