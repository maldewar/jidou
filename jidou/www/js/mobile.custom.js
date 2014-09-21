$(document).bind("pageinit", function() {
  if (typeof IOV.current.product != 'undefined') {
    IOV.populateDialogProduct();
  }
  if (typeof IOV.current.cart != 'undefined') {
    IOV.openCart();
  }

});

$(document).bind("pagechange", function() {
  if (typeof IOV.current.cart != 'undefined') {
    IOV.openCart();
  }

});
