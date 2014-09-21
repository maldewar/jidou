IOV.stock = {};

IOV.loadStock = function (data) {
  IOV.stock = data.stock;
  IOV.timestamp = data.timestamp;
  IOV.max = parseInt(data.max);
  if (typeof data['stock'] != 'undefined') {
    $('.' + IOV.clazz.gridProduct, IOV.obj.grid).remove();
    var totalProducts;
    for (var stockId in data.stock) {
      var gridProduct = IOV.obj.gridProduct.clone();
      var stock = data.stock[stockId];
      if (parseInt(stock.image_orientation) == 0) {
        $('.' + IOV.clazz.gridProductImage, gridProduct).attr('src', stock.images.landscape);
      } else {
        $('.' + IOV.clazz.gridProductImage, gridProduct).attr('src', stock.images.portrait);
      }
      $('.' + IOV.clazz.gridProductPrice, gridProduct).text(stock.price);
      gridProduct.data('iov', stock)
                 .click(IOV.viewProductTouch);
      IOV.obj.grid.append(gridProduct);
      totalProducts++;
      //$('#grid').append(gridProduct);
      //$('body').append(gridProduct);
      //alert(data.stock[stockId].id);
    }
    setInterval(IOV.getMessages,1000);
    //Set grid size
    //$('.' + IOV.clazz.gridProduct, IOV.obj.grid).addClass(IOV.clazz.grid2);
    IOV.obj.grid.addClass(IOV.clazz.grid2);
  }
};

IOV.viewProductTouch = function () {
  var stock = $(this).data('iov');
  IOV.viewProduct(stock);
};

IOV.viewProduct = function (stock) {
  IOV.current.product = stock;
  $.mobile.changePage(IOV.urls.viewProduct,{
    role: 'dialog',
    transition: 'flip'
  });
};

IOV.populateDialogProduct = function() {
  var stock = IOV.current.product;
  $('.grid-product-title','#dialogContainer').text(stock.title);
  $('.grid-product-desc','#dialogContainer').text(stock.desc);
  if (parseInt(stock.image_orientation) == 0) {
    $('.grid-product-image','#dialogContainer')
      .attr('src', stock.images.landscape)
      .css('width','95%');
    $('.ui-dialog-contain', '#dialogContainer').css('max-width', '800px');
  } else {
    $('.grid-product-image','#dialogContainer')
      .attr('src', stock.images.portrait);
  }
  $('.grid-product-price','#dialogContainer').text(stock.price);

  // Populate buttons
  $('#btnToCart','#dialogContainer').unbind('click').click(IOV.addToCart);

};

IOV.addToCart = function() {
  $.mobile.back();
  var stock = IOV.current.product;
  if (typeof IOV.current.cart == 'undefined') {
    IOV.current.cart = [];
    IOV.openCart();
  }
  IOV.current.total += parseFloat(stock.price);
  IOV.updateCart();
  $.ajax({
    url: IOV.urls.hwDispense
  });
};

IOV.addCredit = function(credit) {
  credit = parseFloat(credit);
  IOV.current.credit += credit;
  IOV.updateCart();
}

IOV.updateCart = function() {
  var cartPanel = $('#cartPanel');
  if (IOV.current.total > 0 || IOV.current.credit) {
    IOV.openCart();
  }
  $('.creditValue', cartPanel).text(IOV.current.credit);
  $('.totalValue', cartPanel).text(IOV.current.total);
  if (IOV.current.credit > IOV.current.total) {
    $('#btnBuy', cartPanel).removeClass('ui-disabled');
  } else {
    $('#btnBuy', cartPanel).addClass('ui-disabled');
  }
};







