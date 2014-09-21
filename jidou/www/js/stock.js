IOV.stock = {};

IOV.loadStock = function (data) {
  IOV.stock = data.stock;
  IOV.timestamp = data.timestamp;
  IOV.max = parseInt(data.max);
  if (typeof data['stock'] != 'undefined') {
    $('.' + IOV.clazz.gridProduct, IOV.obj.grid).remove();
    var totalProducts = 0;
    for (var stockId in data.stock) {
      var gridProduct = IOV.obj.gridProduct.clone();
      var stock = data.stock[stockId];
      if (parseInt(stock.image_orientation) == 0) {
        $('.' + IOV.clazz.gridProductImage, gridProduct)
          .attr('src', stock.images.landscape)
          .css('padding-top','100px');
      } else {
        $('.' + IOV.clazz.gridProductImage, gridProduct).attr('src', stock.images.portrait);
      }
      $('.' + IOV.clazz.gridProductPrice, gridProduct).text(stock.price);
      $('.' + IOV.clazz.gridProductTitle, gridProduct).text(stock.title);
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
    totalGridBlocks = 2;
    gridBlockTemp = 0;
    IOV.obj.grid.addClass(IOV.clazz.grid2);
    $('.grid-product', IOV.obj.grid).each(function(){
      $(this).addClass(IOV.clazz.gridBlocks[gridBlockTemp]);
      gridBlockTemp++;
      if (gridBlockTemp >= totalGridBlocks) {
        gridBlockTemp = 0;
      }
    });
    if (totalProducts == 2) {
      IOV.obj.grid.css('margin-top', '5%');
    }

    $('#btnCancel').click(IOV.cancelCart);
    $('#btnBuy').click(IOV.checkout);
  }
};

IOV.viewProductTouch = function () {
  if (!IOV.dispensing) {
    var stock = $(this).data('iov');
    IOV.viewProduct(stock);
  }
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
  IOV.hasAd = false;
  var stock = IOV.current.product;
  if (typeof IOV.current.cart == 'undefined') {
    IOV.current.cart = [];
    IOV.openCart();
  }
  IOV.current.total += parseFloat(stock.price);
  IOV.updateCart();
  var cartItem = $('.cartItem', '#tpl').clone();
  $('.grid-product-title', cartItem).text(stock.title);
  $('#cartList').append(cartItem);
  IOV.current.cart.push(stock);
};

IOV.cancelCart = function() {
  IOV.current.cart = undefined;
  IOV.closeCart();
  IOV.current.total = 0;
  IOV.current.credit = 0;
  $('.cartItem','#cartList').remove();
  IOV.updateCart();
}

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
  if (IOV.current.credit >= IOV.current.total) {
    $('#btnBuy', cartPanel).removeAttr('disabled').removeClass('ui-disabled');
  } else {
    $('#btnBuy', cartPanel).attr('disabled','disabled').addClass('ui-disabled');
  }
};

IOV.checkout = function() {
  if (IOV.current.cart.length > 0) {
    $('#btnBuy').attr('disabled','disabled');
    IOV.dispensing = true;
    $('#robo-vendi').show();
    setTimeout(IOV.showAd, 1000);
    var toDispense = IOV.current.cart.pop();
    $.ajax({
      url: IOV.urls.hwDispense + '?p=' + toDispense.hw_id
    });
  } else {
    IOV.cancelCart();
    $('#robo-vendi').hide();
    IOV.dispensing = false;
    $.mobile.changePage('thanks.html',{
      role: 'dialog',
      transition: 'flip'
    });
  }
}

IOV.onCheckout = function(productId) {
  IOV.checkout();
}

IOV.showAd = function() {
  if (!IOV.hasAd) {
    $.mobile.changePage('ad.html',{
      role: 'dialog',
      transition: 'slideup'
    });
  }
}
